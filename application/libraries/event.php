<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event {

	public $id;
	public $date;
    public $title;
    public $description;
    public $address;
    public $imgPath;
    public $time;

    function __construct($params)
    {
        $this->id = @$params['id'];
        $this->date = @$params['date'];
        $this->title = @$params['title'];
        $this->description = @$params['description'];
        $this->address = @$params['address'];
        $this->imgPath = @$params['imgPath'];
        $this->time = @$params['time'];
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