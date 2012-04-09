<?php

class Question extends Crud_Model
{
    public function __construct()
    {
        parent::__construct('question');
        $this->display_as['cost'] = 'Cost';
        $this->relations['Group'] = array(
            'field_name'            => 'Group',
            'related_table'         => 'group',
            'related_field_title'   => 'Name',
            'related_primary_key'   => 'GroupId'
        );
    }

    public function get_fields()
    {
        $fields = parent::get_fields();
        //dump($fields);
        $fields['Group']['type'] = 'select';

        // keep active record separate from main one
        $db = $this->load->database('default', TRUE);
        $options = $db->select('GroupId as value, Name as label')->from('Group')->get()->result_array();
        $fields['Group']['options'] = $options;
        $db->close();
        //dump($fields);
        return $fields;
    }

    public function get_list()
    {
        $this->db->select($this->table_unigue_name.'.*');

        $this->db->from($this->table_name.' as '.$this->table_unigue_name);

        $table_unigue_name = $this->_unique_table_name('group');
        $this->db->join('group as '.$table_unigue_name, $this->table_unigue_name.'.Group = '.$table_unigue_name.'.GroupId' ,'LEFT');
        $this->db->select($table_unigue_name.'.Name as `Group`');


        return $this->db->get()->result_array();
    }
}
