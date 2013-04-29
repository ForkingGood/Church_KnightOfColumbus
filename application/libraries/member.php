<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member {

	public $id;
	public $name;

    function __construct($params)
    {
        $this->id = @$params['id'];
        $this->name = @$params['name'];
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function get_id()
    {
        return $this->id;
    }
}

/* End of file Someclass.php */