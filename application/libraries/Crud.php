<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crud_tree
{
    protected $default_model_class = 'crud_model';
    protected $model_class = 'crud_model';
    protected $model = null;
    protected $subject = null;
    protected $unique_control_name = null;

    protected $action = 'list';
    protected $action_params = null;

    protected $add_uri = '';
    protected $edit_uri = '';
    protected $update_uri = '';
    protected $insert_uri = '';
    protected $delete_uri = '';
    protected $list_uri = '';
    protected $ajax_list_uri = '';

    protected $rows_per_page = 5;
    protected $offset_rows = 0;
    protected $order_by = null;
    protected $order_direction = 'ASC';

    protected $ci = null;

    /**
     * Class Constructor
     *
     */
    public function __construct($model_class = null)
    {
        $this->ci =& get_instance();
        $this->ci->load->helper('inflector');
        $this->ci->load->library('form_validation');

        if ($model_class != null)
        {
            // Use Custom model
            $this->set_model($model_class);
        }
        else
        {
            // USe Default model
            $this->_setup_model();
        }
    }

    /**
     * Method renders data array for use with Crud view
     *
     * @return array
     */
    public function render()
    {
        if ($this->is_ready())
        {
            $this->_get_action_data();

            switch ($this->action)
            {
                default:
                case "list":
                    $data = $this->render_list();
                    break;
                case "ajax_list":
                    $data = $this->render_ajax_list();
                    break;
                case "add":
                    $data = $this->render_add();
                    break;
                case "edit":
                    $data = $this->render_edit();
                    break;
                case "ajax_update":
                    $data = $this->render_update();
                    break;
                case "ajax_insert":
                    $data = $this->render_insert();
                    break;
            }

            return $data;

        }
        else
        {
            throw new Exception('Class not ready for render ... missing elements');
        }
    }

    protected function _render_common()
    {
        $data = array(
            'subject'               => $this->subject,
            'edit_url'              => $this->edit_uri,
            'add_url'               => $this->add_uri,
            'ajax_insert_uri'       => $this->insert_uri,
            'delete_url'            => $this->delete_uri,
            'list_url'              => $this->list_uri,
            'ajax_list_uri'         => $this->ajax_list_uri,
            'ajax_update_uri'       => $this->update_uri,
            'primary_key'           => $this->model->get_primary_key(),
            'rows_per_page'         => $this->rows_per_page,
            'offset_rows'           => $this->offset_rows,
            'unique_control_name'   => $this->unique_control_name,
            'order_by'              => $this->order_by == null ? $this->model->get_primary_key() : $this->order_by,
            'order_direction'       => $this->order_direction,
        );
        return $data;
    }

    /**
     * Method renders the list action's data packet
     *
     * @return array
     */
    public function render_list()
    {
        $this->model->limit($this->rows_per_page);
        $this->model->offset($this->offset_rows);

        if (!$this->order_by == null)
        {
            if (is_array($this->order_by))
                $order_by = implode($this->order_direction.', ', $this->order_by);
            else
                $order_by = $this->order_by;
            $this->model->order_by($order_by.' '.$this->order_direction);
        }

        $data = $this->_render_common();
        $data = array_merge(array(
                        'columns'       => $this->model->get_fields(),
                        'list'          => $this->model->get_list(),
                        'action'        => 'list',
                        'total_rows'    => $this->model->get_count(),
                    ), $data);
        return $data;
    }

    public function render_ajax_list()
    {
        $page = $this->ci->input->post('page');
        $per_page = $this->ci->input->post('per_page');
        $this->offset_rows = ($page - 1) * $per_page;
        $this->rows_per_page = $per_page;

        $this->order_by = $this->ci->input->post('order_by');
        $this->order_direction = $this->ci->input->post('order_direction');

        $data = $this->_render_common();
        $data = array_merge($this->render_list(), $data);
        $data['action'] = 'ajax_list';
        return $data;
    }

    /**
     * Method renders the add action's data packet
     *
     * @return array
     */
    public function render_add()
    {
        $data = $this->_render_common();
        $data = array_merge(array(
                        'fields'   => $this->model->get_fields(),
                        'action'    => 'add'
                    ), $data);
        return $data;
    }

    /**
     * Method renders the add action's data packet
     *
     * @return array
     */
    public function render_edit()
    {
        $data = $this->_render_common();

        $filter = array();

        $key_values = explode(":",$this->action_params[0]);
        $keys = $this->model->get_primary_key();
        $keys = (array)$keys;

        foreach ($keys as $key=>$name)
        {
            $filter[$name] = $key_values[$key];
        }

        $row = $this->model->get($filter);
        if (is_array($row))
        {
            $row = array_shift($row);
        }

        $data = array_merge(array(
                        'fields'    => $this->model->get_fields(),
                        'row'       => $row,
                        'action'    => 'edit'
                    ), $data);
        return $data;
    }

    public function render_insert()
    {
        if ($this->_run_validation())
        {
            $data = $this->_render_common();
            $data['action'] = 'ajax_insert';
            $post = $this->ci->input->post();
            $data['success'] = $this->model->insert($post);
        }
        else
        {
            $key = $this->model->get_primary_key();
            $key = is_array($key) ? implode(':',$key) : $key;
            $this->action_params[0] = $this->ci->input->post($key);

            $data = $this->render_add();
            $data['action'] = 'add_form';
        }
        return $data;
    }


    public function render_update()
    {
        if ($this->_run_validation())
        {
            $data = $this->_render_common();
            $data['action'] = 'ajax_update';
            $post = $this->ci->input->post();
            $data['success'] = $this->model->update($post);
        }
        else
        {
            $key = $this->model->get_primary_key();
            $key = is_array($key) ? implode(':',$key) : $key;
            $this->action_params[0] = $this->ci->input->post($key);

            $data = $this->render_edit();
            $data['action'] = 'edit_form';
        }
        return $data;
    }


    /**
     * Method set the model to use for data handling
     *
     * @param string $model_class
     */
    public function set_model($model_class)
    {
       $this->model_class = $model_class;
       $this->_setup_model();
    }

    /**
     * Method set the table to use in default model
     *
     * @param string $model_class
     */
    public function set_table($table_name = null)
    {
        $this->model->set_table($table_name);
        if ($this->subject == null)
        {
            $this->set_subject($table_name);
        }
    }

    public function set_subject($subject)
    {
        $this->subject = singular(humanize($subject));
    }

    /**
     * Method checks if class is ready to render
     *
     * @return  bool
     */
    public function is_ready()
    {
        $table = $this->model->get_table();
        return ($this->model !== null) && (!empty($table));
    }

    protected function _run_validation()
    {
        $fields = $this->model->get_fields();

        foreach($fields as $field)
        {
            $field = (object)$field;

            if (!$field->db_null  && !$field->db_extra == 'auto_increment' && empty($field->default))
            {
                if(!in_array($field->type, array('select', 'multi-select')))
                {
                    $this->ci->form_validation->set_rules($field->name, $field->display_as, 'trim|required');
                }
                else
                {
                    $this->ci->form_validation->set_rules($field->name, $field->display_as, 'required');
                }
            }
        }

        if ($this->ci->form_validation->run() == FALSE)
        {
            return FALSE;
        }

        return TRUE;
    }

    /**
     * Methos init correct model class as object into $this->model
     *
     */
    protected function _setup_model()
    {
        $this->ci->load->model($this->model_class);

        if (strstr($this->model_class,'/'))
        {
            $model_class_name = array_pop(explode('/',$this->model_class));
        }
        else
        {
            $model_class_name = $this->model_class;
        }
        $this->model = $this->ci->$model_class_name;
        $table = $this->model->get_table();

        if (empty($table))
        {
            $this->set_table($this->_get_default_table());
        }
    }

    /**
     * Mothod that sets the table name to the method name if such a table exists
     */
    protected function _get_default_table()
    {
        if ($this->model->table_exists($this->ci->router->method))
        {
            return $this->ci->router->method;
        }
        return null;
    }

    /**
     * Method determance the action data from the uri
     */
    protected function _get_action_data()
    {
        $segments = $this->ci->uri->segments;
        $method = $this->ci->router->method;
        $param_data = array();

     //   dump($segments);

        // find the method segment and keep rest
        $i = count($segments);
        while ($segments[$i] != $method && $i > 0)
        {
            array_unshift($param_data, $segments[$i]);
            array_pop($segments);
            $i--;
        }

      //  dump($param_data);

        // first segment is the action of list if empty
        if (!empty($param_data))
        {
            $this->action = array_shift($param_data);
            $this->action_params = $param_data;
        }

        $base_uri = base_url().implode('/',$segments).'/';
        $this->add_uri = $base_uri.'add';
        $this->edit_uri = $base_uri.'edit/';
        $this->update_uri = $base_uri.'ajax_update';
        $this->insert_uri = $base_uri.'ajax_insert';
        $this->delete_uri = $base_uri.'delete/';
        $this->list_uri = $base_uri;
        $this->ajax_list_uri = $base_uri.'ajax_list';
        $this->unique_control_name = 'C'.substr(md5($this->model->get_table()),0,8);
    }
}







/* End of file Crud.php */
/* Location: ./application/libraries/Crud.php */