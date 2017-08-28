<?php 
 namespace dao;
 use utils\enum as enum;
 abstract class AbstractDaoFactory
 {
    protected $conn;

    protected abstract function createConnection();

    public function closeConnection()
    {
        if($this->conn != null)
            $this->conn == null;
    }
	public function getDao($type)
	{
		$baseDao = null;
        switch ($type) {
        	case enum\DaoEnum::CATEGORY:
        		$baseDao = new CategoryDaoImpl($this->conn);
        		break;
        	case enum\DaoEnum::CUSTOMER:
                $baseDao = new CustomerDaoImpl($this->conn);
        		break;
        	case enum\DaoEnum::GROUP:
                $baseDao = new GroupDaoImpl($this->conn);
        		break;
        	case enum\DaoEnum::ORDER:
                $baseDao = new OrderDaoImpl($this->conn);
        		break;
        	case enum\DaoEnum::ORDER_DETAIL:
                $baseDao = new OerderDetailImpl($this->conn);
        		break;
        	case enum\DaoEnum::USER:
                $baseDao = new UserDaoImpl($this->conn);
                break;
            case enum\DaoEnum::FOOD:
                $baseDao = new FoodDaoImpl($this->conn);
        		break;
        }
        return $baseDao;
	}

	public static function getDaoFactory($factoryType)
	{
        $factory = null;
        switch ($factoryType) {
            case enum\FactoryEnum::MSSQL:
                # code...
                break;
            case enum\FactoryEnum::MYSQL:
                $factory = MySQLDaoFactory::getInstance();
                break;
            case enum\FactoryEnum::SQLITE:
                
                break;
            case enum\FactoryEnum::ORACLE:
                
                break;
            default:
               $factory = MySQLDaoFactory::getInstance();
                break;
        }
        return $factory;
	}

 }
?>