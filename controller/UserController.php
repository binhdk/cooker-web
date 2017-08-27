<?php 
namespace controller;
use dao;
use model;
use utils\enum as enum;
class UserController
{
    public function login($email, $password)
    {

        $factory = dao\AbstractDaoFactory::getDaoFactory(enum\FactoryEnum::MYSQL);
        $userDaoImpl = $factory->getDao(enum\DaoEnum::USER);
        $user = new model\User;
        $user = $userDaoImpl->getUserWithEmail($email)[0];
        if ($user != null) {
            $password_hash = $user->__get('password');
            $check=password_verify($password,$password_hash);
            if ($check == 1) {
                $user_session = array(
                'id'=>$user->id,
                'email'=>$user->email,
                'name'=>$user->name,
                'tel'=>$user->tel,
                'address'=>$user->diachi
                );
                $_SESSION['user'] =$user_session;
                header('location:.');
            } else {
                  echo '<script>alert(Wrong email or password!);</script>';
            }
        } else {
              echo '<script>alert(User not exist);</script>';
        }
    }
    
    public function logout($user)
    {
        unset($_SESSION['user']);
    }
}
?>