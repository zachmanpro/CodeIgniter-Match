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
class WU_Model extends CI_Model
{
    protected $table_name = null;
    protected $table_unigue_name = null;
    protected $primary_key = null;
    protected $relations = array();
    protected $display_as = array();

    protected $db_type_input_mapping = array(
                'int'       => 'input',
                'decimal'   => 'input',
                'varchar'   => 'input',
                'text'      => 'texteditor',
                'timestamp' => 'date'
            );

    /**
     * Class Constructor
     */
    public function __construct($table_name = '')
    {
        parent::__construct();
        $this->table_name = $table_name;

        if ($table_name != '')
        {
            $this->primary_key = $this->_get_primary_key($table_name);
        }
        //dump($this->primary_key);
    }

    public function get_list()
    {
        $this->table_unigue_name = $this->_unique_table_name($this->table_name);
        $this->db->from("{$this->table_name} as {$this->table_unigue_name}");
        foreach ($this->relations as $relation)
        {
            $related_table = $relation['related_table'];
            $unique_name = $this->_unique_table_name($related_table);
            $related_primary_key = $relation['related_primary_key'];
            $field_name = $relation['field_name'];
            $this->db->join($related_table.' as '.$unique_name,
                            "$unique_name.$related_primary_key = {$this->table_unigue_name}.$field_name",
                            'left');
            dump($relation);
        }
        return $this->db->get()->result_array();
    }

    public function get_fields()
    {
        $db_fields = $this->_get_field_types_for_table();
        $fields_with_relation = array_keys($this->relations);
        $fields_with_display_as = array_keys($this->display_as);

        $fields = array();

        foreach ($db_fields as $db_field)
        {
            $field = array();
            $field['name'] = $db_field->name;
            $field['display_as'] = $db_field->name;
            if (in_array($db_field->name, $fields_with_display_as))
            {
                $field['display_as'] = $this->display_as[$db_field->name];
            }
            $field['db_type'] = $db_field->type;
            $field['type'] = $this->db_type_input_mapping[$db_field->type];

    //        if (in_array($db_field->name,$fields_with_relation))
    //        {
    //            $relation = $this->relations[$db_field->name];
    //			list($field_name, $related_table, $related_field_title, $related_filter, $related_type) = $relation;
    //            $options = $this->db->where()->get($related_table)->result_array();
    //        }
            $fields[] = $field;
        }

        return $fields;
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
			return $this->field_type[$table_name];
		}

    	$db_field_types = array();
        if ($table_name == null)
        {
            $table_name = $this->table_name;
        }
    	foreach($this->db->query("SHOW COLUMNS FROM {$table_name}")->result() as $db_field_type)
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
    		$results[$num] = (object)( array_merge($row, $db_field_types[$row['name']])  );
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
    	return 'F'.substr(md5($field_name),0,8); //This s is because is better for a string to begin with a letter and not with a number
    }
}
