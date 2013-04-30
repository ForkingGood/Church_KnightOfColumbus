<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member {

	public $id;
	public $name;

    function __construct($params)
    {
        $this->id = @$params['id'];
        $this->name = @$params['name'];
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}

/* End of file Someclass.php */