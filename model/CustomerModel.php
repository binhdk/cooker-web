<?php 
namespace model;
use dao;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
class CustomerModel
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
                return true;
            }
        }
        return false;  
    }
    
    public function logout()
    {
        unset($_SESSION['customer']);
        unset($_SESSION['cart']);
    }
}
?>