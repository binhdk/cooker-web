<?php 
namespace entity;
class Customer
{
  	private $id;
  	private $name;
  	private $email;
  	private $password;
  	private $address;
  	private $tel;
  	private $created;
  	private $modified;

  	public function __construct()
    {

  	}

  	public function __get($property){
  		  if(property_exists($this, $property)) {
            return $this->$property;
        } 
  	}
  	
  	public function __set($property, $value){
  		  if(property_exists($this, $property)) {
            $this->$property = $value;
        }
  	        
  	}
}
?>