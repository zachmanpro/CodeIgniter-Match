<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * WU Model Class Extention to use for CRUD
 *
 * Data access layer for CRUD
 *
 * @package		CodeIgniter
 * @subpackage	Models
 * @author		Zachie du Bruyn
 * @category	Model
 */
class Crud_Model extends CI_Model
{
    protected $table_name = null;
    protected $table_unigue_name = null;
    protected $primary_key = null;
    protected $order_by = null;

	protected $relations = array();
    protected $display_as = array();
	protected $field_types = null;
    protected $db_type_input_mapping = array(
                'int'       => 'input',
                'decimal'   => 'input',
                'varchar'   => 'input',
                'text'      => 'texteditor',
                'timestamp' => 'datetime',
				'date'		=> 'date'
            );

    /**
     * Class Constructor
     */
    public function __construct($table_name = '')
    {
        parent::__construct();
        $this->table_name = $table_name;
		$this->table_unigue_name = $this->_unique_table_name($this->table_name);

        if ($table_name != '')
        {
            $this->primary_key = $this->_get_primary_key($table_name);
        }
        //dump($this->primary_key);
    }

	public function get($filter = null)
	{
		if ($filter != null)
		{
			if (is_array($filter))
			{
				$this->db->where($filter);
				return self::get_list();
			}
			else
			{
				// asume primary key
				$this->db->where($this->primary_key, $filter);
				return self::get_list();
			}
		}
		else
		{
			return self::get_list();
		}
	}

    public function get_list()
    {
       $this->db->from("{$this->table_name} as {$this->table_unigue_name}");
        //foreach ($this->relations as $relation)
        //{
        //    $related_table = $relation['related_table'];
        //    $unique_name = $this->_unique_table_name($related_table);
        //    $related_primary_key = $relation['related_primary_key'];
        //    $field_name = $relation['field_name'];
        //    $this->db->join($related_table.' as '.$unique_name,
        //                    "$unique_name.$related_primary_key = {$this->table_unigue_name}.$field_name",
        //                    'left');
        //    dump($relation);
        //}
		if ($this->order_by == null && !count($this->db->ar_orderby))
		{
			$this->db->order_by($this->primary_key);
		}
        return $this->db->get()->result_array();
    }

    public function get_count()
    {
        $this->db->select("count({$this->primary_key}) as TotalRows");
		$rows = $this->get_list();
	    return (int)$rows[0]['TotalRows'];
    }

	public function insert($data)
	{
		$table_fields = self::get_fields();
		$all_fields = $this::get_fields();

		$update_packet = array();
		$related_packet = array();

		// Update main table record
		foreach ($table_fields as $field_name => $table_field)
		{
			$field = (object)$all_fields[$field_name];
			if (in_array($field->type,array('date','datetime')))
			{
				if (!empty($data[$field_name]))
				{
					$data[$field_name] = date('Y-m-d H:i:s', human_to_unix($data[$field_name]));
				}
			}
			if (in_array($field->type, array('input', 'date', 'datetime',
											 'textarea', 'texteditor',
											 'hidden','password','select')))
			{
				if (!$field->primary_key)
				{
					if (!empty($data[$field_name]))
					{
						$update_packet[$field_name] = $data[$field_name];
					}
				}
			}
			else
			{
				$related_packet[$field_name] = $data[$field_name];
			}
		}

		$this->db->insert($this->table_name, $update_packet);
		if ($this->db->_error_message())
		{
			return FALSE;
		}
		return TRUE;
	}


	public function update($data)
	{
		$table_fields = self::get_fields();
		$all_fields = $this::get_fields();

		$update_packet = array();
		$update_filter = array();
		$related_packet = array();
		// Update main table record
		foreach ($table_fields as $field_name => $table_field)
		{
			$field = (object)$all_fields[$field_name];
			if (in_array($field->type,array('date','datetime')))
			{
				if (!empty($data[$field_name]))
				{
					$data[$field_name] = date('Y-m-d H:i:s', human_to_unix($data[$field_name]));
				}
			}
			if (in_array($field->type, array('input', 'date', 'datetime',
											 'textarea', 'texteditor',
											 'hidden','password','select')))
			{
				if ($field->primary_key)
				{
					$update_filter[$field_name] = $data[$field_name];
				}
				else
				{
					if (!empty($data[$field_name]))
					{
						$update_packet[$field_name] = $data[$field_name];
					}
				}
			}
			else
			{
				$related_packet[$field_name] = $data[$field_name];
			}
		}

		$this->db->update($this->table_name, $update_packet, $update_filter);
		if ($this->db->_error_message())
		{
			return FALSE;
		}
		return TRUE;
	}

    public function get_fields()
    {
        $db_fields = $this->_get_field_types_for_table();
        $fields_with_relation = array_keys($this->relations);
        $fields_with_display_as = array_keys($this->display_as);

        $fields = array();

        foreach ($db_fields as $db_field)
        {
            $field = (array)$db_field;
            $field['name'] = $db_field->name;
            $field['display_as'] = humanize($db_field->name);
            if (in_array($db_field->name, $fields_with_display_as))
            {
                $field['display_as'] = $this->display_as[$db_field->name];
            }
            $field['type'] = $this->db_type_input_mapping[$db_field->type]; // input type

			if ($field['db_extra'] == 'auto_increment')
			{
				$field['type'] = 'hidden';
			}

    //        if (in_array($db_field->name,$fields_with_relation))
    //        {
    //            $relation = $this->relations[$db_field->name];
    //			list($field_name, $related_table, $related_field_title, $related_filter, $related_type) = $relation;
    //            $options = $this->db->where()->get($related_table)->result_array();
    //        }
            $fields[$db_field->name] = $field;
        }

        return $fields;
    }


	public function limit($number)
	{
		$this->db->limit($number);
	}

	public function offset($number)
	{
		$this->db->offset($number);
	}

	public function order_by($order_by)
	{
		$fiels_with_relation = array_keys($this->relations);

		$field_name = array_shift(explode(' ',$order_by));
		$direction = array_pop(explode(' ',$order_by));

		if (in_array($field_name, $fiels_with_relation))
		{
			$table = $this->_unique_table_name($this->relations[$field_name]['related_table']);
			$order_by = $this->relations[$field_name]['related_field_title'].' '.$direction;
		}
		else
		{
			$table = $this->table_unigue_name;
		}

		$this->db->order_by($table.'.'.$order_by);
	}

	/**
	 * Method to set table_name
	 *
	 * @param	string $table_name
	 */
	public function set_table($table_name = null)
	{
		$this->table_name = $table_name;
		$this->table_unigue_name = $this->_unique_table_name($this->table_name);
	}

	/**
	 * Method to get table_name
	 *
	 * @return	string $table_name
	 */
	public function get_table($table_name = null)
	{
		return $this->table_name;
	}

	public function get_primary_key()
	{
		if ($this->primary_key == null)
		{
			$this->primary_key = $this->_get_primary_key($this->table_name);
		}
		return $this->primary_key;
	}


	/**
	 * Method to check if table exists on DB
	 *
	 * @return 	bool
	 */
	public function table_exists($table_name)
	{
		return $this->db->table_exists($table_name);
	}


    protected function _get_primary_key($table_name)
    {
        $fields = $this->_get_field_types_for_table($table_name);

        $key = array();

	    foreach($fields as $field)
	    {
	    	if($field->primary_key == 1)
	    	{
	    		$key[] = $field->name;
	    	}
	    }

        if (count($key) == 0)
        {
            return false;
        }
        else if (count($key) == 1)
        {
            return array_shift($key);
        }
        else
        {
            return $key;
        }
    }

    /**
     * Get the Basic information about the table's fields from DB
     *
     * @param   string $table_name
     * @return  array
     */
    protected function _get_field_types_for_table($table_name = null)
    {
		if (isset($this->field_types[$table_name]))
		{
			return $this->field_types[$table_name];
		}

    	$db_field_types = array();
        if ($table_name == null)
        {
            $table_name = $this->table_name;
        }

    	foreach($this->db->query("SHOW COLUMNS FROM `{$table_name}`")->result() as $db_field_type)
    	{
    		$type = explode("(",$db_field_type->Type);
    		$db_type = $type[0];

    		if(isset($type[1]))
    		{
    			$length = (int)substr($type[1],0,strpos($type[1],")"));
    		}
    		else
    		{
    			$length = '';
    		}
    		$db_field_types[$db_field_type->Field]['db_max_length'] = $length;
    		$db_field_types[$db_field_type->Field]['db_type'] = $db_type;
    		$db_field_types[$db_field_type->Field]['db_null'] = $db_field_type->Null == 'YES' ? true : false;
    		$db_field_types[$db_field_type->Field]['db_extra'] = $db_field_type->Extra;
    	}

    	$results = $this->db->field_data($this->table_name);
    	foreach($results as $num => $row)
    	{
    		$row = (array)$row;
    		$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']]));
    	}

		$this->field_types[$table_name] = $results;

    	return $results;
    }

    /**
     * Method to calulate a unique name for a table needed in joins
     *
     * @param   string $field_name
     * @return  string
     */
    protected function _unique_table_name($field_name)
    {
        // Add T to a md5 key - can't start with number
    	return 'T'.substr(md5($field_name),0,8);
    }

    /**
     * Method to calulate a unique name for a field needed in joins
     *
     * @param   string $field_name
     * @return  string
     */
    protected function _unique_field_name($field_name)
    {
    	return 'F'.substr(md5($field_name),0,8);
	}
}
