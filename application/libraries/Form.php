<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Form
{
    public $unique_control_name = null;

    protected $fields = array();
    protected $row = array();
    protected $submit_label = 'Submit';
    protected $subject = 'Please complete form below';

    public function __construct()
    {
        $this->unique_control_name = 'F'.substr(md5(now()),-8);
    }

    public function set_subject($subject)
    {
        $subject = $subject;
    }

    public function set_submit_label($label)
    {
        $this->submit_label = $label;
    }

    /**
     * Method to add input details into arrays ready for use in control teplates
     *
     * @param string $name
     * @param string $label - display_as
     * @param multi $value
     */
    public function add_input($name, $label, $value = '', $type = 'input')
    {
        $this->fields[$name] = array(
            'name'          => $name,
            'display_as'    => $label,
            'type'          => $type
        );
        $this->row[$name] = $value;
    }

    public function add_password($name, $label, $value = '')
    {
        $this->add_input($name, $label, $value, 'password');
    }

    public function add_textarea($name, $label, $value = '')
    {
        $this->add_input($name, $label, $value, 'textarea');
    }

    public function add_hidden($name, $label, $value = '')
    {
        $this->add_input($name, $label, $value, 'hidden');
    }

    public function add_texteditor($name, $label, $value = '')
    {
        $this->add_input($name, $label, $value, 'texteditor');
    }

    /**
     * Method to add Select details into arrays ready for use in control teplates
     *
     * @param string $name
     * @param string $label - display as
     * @param multi $value
     * @param array $oprions - format
     * <pre>
     * value = 103,
     * label = 'South Africa
     * </pre>
     */
    public function add_select($name, $label, $value = '', $options = array())
    {
        $this->add_input($name, $label, $value, 'select');
        $this->fields[$name]['options'] = $options;
    }

    public function add_multi_select($name, $label, $value = '', $options = array())
    {
        $this->add_select($name, $label, $value, $options = array());
        $this->fields[$name]['type'] ='multi_select';
    }

    public function render()
    {
        $ci =& get_instance();
        $data['fields'] = $this->fields;
        $data['row'] = $this->row;
        $data['unique_control_name'] = $this->unique_control_name;
        $data['subject'] = $this->subject;
        $data['submit_label'] = $this->submit_label;
        $ci->smarty->assign($data);
        return $ci->smarty->fetch('form_builder.tpl');
    }

}