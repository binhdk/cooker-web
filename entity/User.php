<?php 
namespace entity;
class User
{
  	private $id;
  	private $name;
  	private $nicename;
  	private $email;
  	private $password;
  	private $tel;
  	private $url;
  	private $group_id;
  	private $created;
  	private $modified;
  	private $status;

    public function __construct()
    {

    }

    public function __get($property)
    {
  		  if (property_exists($this, $property)) {
            return $this->$property;
        }
  	}

  	public function __set($property, $value)
    {
  		  if (property_exists($this, $property)) {
            $this->$property = $value;
        }    
  	}
}

?>