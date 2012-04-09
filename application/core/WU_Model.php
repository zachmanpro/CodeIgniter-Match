<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Super WU_Model Class
 *
 * @package	Core
 * @subpackage	Model
 * @category	Models
 * @author	Zachie du Bruyn
 */
class WU_Model extends CI_Model
{
    public $table_name = '';
    public $primary_key = '';
    public $primary_filter = 'intval';
    public $order_by = '';
    public $has_items = FALSE;
    public $item_table = '_items';
    public $item_key = 'items';
    public $item_id_key = '_id';

    const ALL = FALSE;

    /**
    * Constructor for class
    *
    * @access	public
    * @param	none
    */
    public function __construct()
    {
        parent::__construct();
    }


    /**
    * Get Data from Table
    *
    * @access	public
    * @param	array
    */
    public function get ($ids = FALSE)
    {
        // Set flag - if we passed a single ID we should return a single record
        $single = $ids == FALSE || is_array($ids) ? FALSE : TRUE;

        // Limit results to one or more ids
        if ($ids !== FALSE) {

            // $ids should always be an array
            is_array($ids) || $ids = array($ids);

            // Sanitize ids
            $filter = $this->primary_filter;
            $ids = array_map($filter, $ids);

            $this->db->where_in($this->primary_key, $ids);
        }

        // Set order by if it was not already set
        count($this->db->ar_orderby) || $this->db->order_by($this->order_by);

        $single == FALSE || $this->db->limit(1);

        $data = $this->db->get($this->table_name)->result_array();

        $return_data = array();

        if ($this->has_items == TRUE)
        {
            foreach ($data as $row)
            {
                $row[$this->item_key] = $this->get_items($row[$this->primary_key]);
                $return_data[] = $row;
            }
        }
        else
        {
            $return_data = $data;
        }

        if ($single)
            $return_data = array_shift($return_data);

        return $return_data;
    }

    /**
    * Get Data from Table using filters
    *
    * @access	public
    * @param	multi
    * @param    multi
    * @param    bool
    * @param    bool
    * @param    bool
    * @return   array
    */
    public function get_by ($key, $val = FALSE, $orwhere = FALSE, $single = FALSE, $like = false)
    {
        // Limit results
        if (! is_array($key)) {
            $this->db->where(htmlentities($key), htmlentities($val));
        }
        else {
            $key = array_map('htmlentities', $key);

            if ($like)
                $where_method = $orwhere == TRUE ? 'or_like' : 'like';
            else
                $where_method = $orwhere == TRUE ? 'or_where' : 'where';

            $this->db->$where_method($key);
        }

        $single == FALSE || $this->db->limit(1);

        $return_data = $this->get();

        if ($single)
            $return_data = array_shift($return_data);

        return $return_data;
    }


    /**
    * Get Data from Table using filters
    *
    * @access	public
    * @param	multi
    * @param    multi
    * @param    bool
    * @param    bool
    * @param    bool
    * @return   int
    */
    public function get_count($key = FALSE, $val = FALSE, $orwhere = FALSE, $like = false)
    {
        // Temporary disable items
        $old_has_items = $this->has_items;
        $this->has_items = false;

        $this->db->select("count({$this->primary_key}) as TotalRows");

        if ($key)
        {

            $row = $this->get_by($key, $val, $orwhere, TRUE, $like);
            $rows_count = $row['TotalRows'];
        }
        else
        {
            $records = $this->get();
            $rows_count = $records[0]['TotalRows'];
        }

        // Restore items value
        $this->has_items = $old_has_items;
        return (int)$rows_count;
    }

    /**
    * Get Data from Items Table
    *
    * @access	public
    * @param	none
    * @return   array
    */
    public function get_items($id)
    {
        $this->db->from($this->get_item_table())->where($this->primary_key,$id);
        $data = $this->db->get()->result_array();
        return $data;
    }

    /**
    * Get Items Table name
    *
    * @access	public
    * @param	none
    * @return   string
    */
    public function get_item_table()
    {
        #-> prefix
        if (substr($this->item_table,-1,1) == '_')
        {
            return $this->item_table.$this->table_name;
        }
        #-> postfix
        if (substr($this->item_table,1,1) == '_')
        {
            return $this->table_name.$this->item_table;
        }
        #-> as is
        return $this->item_table;
    }

    /**
    * Get Items Table ID key
    *
    * @access	public
    * @param	none
    * @return   string
    */
    public function get_item_id_key()
    {
        $table = $this->get_item_table();
        #-> prefix
        if (substr($this->item_id_key,-1,1) == '_')
        {
            return $this->item_id_key.$table;
        }
        #-> postfix
        if (substr($this->item_id_key,1,1) == '_')
        {
            return $table.$this->item_table;
        }
        #-> as is
        return $this->item_id_key;
    }

    /**
    * Get Root Parent records
    *
    * @access	public
    * @param	none
    * @return   string
    */
    public function get_parents()
    {
        $data = $this->get_by("parent_id",0);
        return $data;
    }

    public function get_children($parent_id = 0)
    {
        $data = $this->get_by("parent_id",$parent_id);
        return $data;
    }

    public function get_tree($parent_id = 0)
    {
        $return = array();
        $rows = $this->get_children($parent_id);
        if (!is_array($rows))
            return false;
        foreach ($rows as $row)
        {
            $row['children'] = $this->get_tree($row[$this->primary_key]);
            $return[] = $row;
        }
        return $return;
    }


    /**
    * Save Data to Table - single record
    *
    * @access	public
    * @param	array
    */
    public function save($data)
    {
        $items = array();
        if ($this->has_items && isset($data[$this->item_key]))
        {
            $items = $data[$this->item_key];
            unset($data[$this->item_key]);
        }

        $id = (!is_array($this->primary_key) && isset($data[$this->primary_key])) ? $data[$this->primary_key] : false;

        if ($id == FALSE)
        {
            // This is an insert
            $this->db->set($data)->insert($this->table_name);
        }
        else
        {
            // This is an update
            $filter = $this->primary_filter;
            $this->db->set($data)->where($this->primary_key, $filter($id))->update($this->table_name);
        }

        $id = $id == FALSE ? $this->db->insert_id() : $id;


        $item_table_key = $this->get_item_id_key();
        foreach ($items as $item)
        {
            if (!isset($item[$item_table_key]) || $item[$item_table_key] == 0)
            {
                // This is an item insert
                $item[$this->item_key] = $id;
                echo($this->db->set($item)->insert($this->get_item_table()));
            }
            else
            {
                // This is an item update
                $filter = $this->primary_filter;
                $this->db->set($item)->where($this->item_key, $filter($item[$item_table_key]))->update($this->get_item_table());
            }
        }

        // Return the ID
        return $id;
    }

    /**
    * Set paging variables
    *
    * @access	public
    * @param	int
    * @param    int
    */
    public function set_paging($offset = 0, $limit = 20)
    {
        $this->db->limit($limit);
        $this->db->offset($offset);
    }

    /**
    * Delete Record
    *
    * @access	public
    * @param	int
    */
    public function delete($id)
    {
        $this->db->delete($this->table_name, array($this->primary_key => $id));
        return true;
    }

    /**
    * Optimize Table - reset Auto Key
    *
    * @access	public
    * @param	none
    * @return   true
    */
    public function optimize()
    {
        $sql = "OPTIMIZE TABLE  `{$this->table_name}`";
        $this->db->query($sql);
        return true;
    }

}

/* End of file WU_Model.php */
/* Location: ./application/core/WU_Model.php */
