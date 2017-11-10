<?php 
namespace admin\model;
use dao;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;
class UserModel
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
                return true;
            } else {
                return false;
            } 
        } else {
             return false;
        }
    }
}
?>