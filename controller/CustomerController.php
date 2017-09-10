<?php 
namespace controller;
use dao;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
class CustomerController
{
    private $customerDao;
    
    public function __construct()
    {
       $this->customerDao = $GLOBALS['factory']->getDao(DaoEnum::CUSTOMER);
    }
    public function register($customer = array())
    {
        return $this->customerDao->addCustomer($customer);
    }

    public function login($email, $password)
    {
        $customer = $this->customerDao->getCustomer(array('where' => "email='$email'"));
        if ($customer != null) {
            $password_hash = $customer->password;
            $check = password_verify($password,$password_hash);
            if ($check == 1) {
                $customer_session = array(
                    'id' => $customer->id,
                    'email' => $customer->email,
                    'name' => $customer->name,
                    'tel' => $customer->tel,
                    'address '=> $customer->address
                );
                $_SESSION['customer'] = $customer_session;
            } else {
                  echo '<script>window.alert("Wrong email or password!");</script>';
            }
        } else {
              echo '<script>alert("Customer not exist");</script>';
        }
        echo "<script>window.location.href='/cooker/';</script>";
    }
    
    public function logout()
    {
        unset($_SESSION['customer']);
        unset($_SESSION['cart']);
        header('location:/cooker/');
    }
}
?>