<?php 
namespace model;
class Food
{
  	private $id;
  	private $name;
  	private $category_id;
  	private $price;
  	private $component;
  	private $image;
  	private $detail;

  	public function __construct($name, $category_id, $price)
    {
  		  $this->name = $name;
  		  $this->categoryI_id = $category_id;
  		  $this->price = $price;
  	}

  	public function __get($property)
    {
  		  if (property_exists($this, $property)) {
            return $this->$property;
        }    
  	}
  	
  	public function __set($property, $value)
    {
  		  if(property_exists($this, $property)) {
            $this->$property = $value;
        }      
  	}
}
 ?>