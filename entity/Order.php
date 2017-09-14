<?php 
namespace entity;
class Order
{
  	private $id;
  	private $customer_id;
  	private $created;
  	private $price;
  	private $status;

  	public function __construct()
    {
        
    }

    public function __get($property)
    {
  		  if (property_exists($this,$property)) {
            return $this->$property;
        }
  	}

  	public function __set($property, $value)
    {
  		  if(property_exists($this ,$property)) {
            $this->$property = $property;
        }
  	}
}

?>