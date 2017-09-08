<?php 
namespace controller;
use dao;
use model;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
class UserController
{
    private $userDao;

    public function __construct()
    {
        $this->userDao = $GLOBALS['factory']->getDao(DaoEnum::USER);
    }
    
    public function login($email, $password)
    {
        $options = array('where' => "email='$email'");
        $user = $this->userDao->getUser($options);
        if ($user != null) {
            $password_hash = $user->password;
            $check = password_verify($password,$password_hash);
            if ($check == 1) {
                $userSession = array(
                    'id'=> $user->id,
                    'email'=> $user->email,
                    'name'=> $user->name
                );
                $_SESSION['user'] = $userSession;
                header('location:.');
            } else {
                  echo '<script>alert("Wrong email or password!");</script>';
            }
        } else {
              echo '<script>alert("User not exist");</script>';
        }
    }
    
    public function logout()
    {
        unset($_SESSION['user']);
        header('location:admin.php');
    }
}
?>