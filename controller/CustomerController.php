<?php 
namespace controller;
use dao;
use model;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
class CustomerController
{
    public function login($email, $password)
    {

        $factory = dao\AbstractDaoFactory::getDaoFactory(FactoryEnum::MYSQL);
        $customerDaoImpl = $factory->getDao(DaoEnum::CUSTOMER);
        $customer = new model\Customer;
        $customer = $customerDaoImpl->getcustomerWithEmail($email);
        
        if ($customer != null) {
            $password_hash = $customer->__get('password');
            $check=password_verify($password,$password_hash);
            if ($check == 1) {
                $customer_session = array(
                'id'=>$customer->id,
                'email'=>$customer->email,
                'name'=>$customer->name,
                'tel'=>$customer->tel,
                'address'=>$customer->diachi
                );
                $_SESSION['customer'] =$customer_session;
                header('location:.');
            } else {
                  echo '<script>alert("Wrong email or password!");</script>';
            }
        } else {
              echo '<script>alert("Customer not exist");</script>';
        }
    }
    
    public function logout($customer)
    {
        unset($_SESSION['customer']);
    }
}
?>