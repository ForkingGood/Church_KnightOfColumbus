<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member {

	public $id;
	public $first_name;
    public $last_name;
    public $date_joined;
    public $rank;
    public $description;
    public $date_of_birth;
    public $priority;

    function __construct($params)
    {
        $this->id = @$params['id'];
        $this->first_name = @$params['first_name'];
        $this->last_name = @$params['last_name'];
        $this->date_joined = @$params['date_joined'];
        $this->rank = @$params['rank'];
        $this->description = @$params['description'];
        $this->date_of_birth = @$params['date_of_birth'];
        $this->priority = @$params['priority'];
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