<?php 
namespace dao;
use utils\enum\FactoryEnum as FactoryEnum;
use utils\enum\DaoEnum as DaoEnum;

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
        	case DaoEnum::CATEGORY:
        		$baseDao = new CategoryDaoImpl($this->conn);
        		break;
        	case DaoEnum::CUSTOMER:
                $baseDao = new CustomerDaoImpl($this->conn);
        		break;
        	case DaoEnum::GROUP:
                $baseDao = new GroupDaoImpl($this->conn);
        		break;
        	case DaoEnum::ORDER:
                $baseDao = new OrderDaoImpl($this->conn);
        		break;
        	case DaoEnum::ORDER_DETAIL:
                $baseDao = new OerderDetailImpl($this->conn);
        		break;
        	case DaoEnum::USER:
                $baseDao = new UserDaoImpl($this->conn);
                break;
            case DaoEnum::FOOD:
                $baseDao = new FoodDaoImpl($this->conn);
        		break;
        }
        return $baseDao;
	}

	public static function getDaoFactory($factoryType)
	{
        $factory = null;
        switch ($factoryType) {
            case FactoryEnum::MSSQL:
                # code...
                break;
            case FactoryEnum::MYSQL:
                $factory = MySQLDaoFactory::getInstance();
                break;
            case FactoryEnum::SQLITE:
                
                break;
            case FactoryEnum::ORACLE:
                
                break;
            default:
               $factory = MySQLDaoFactory::getInstance();
                break;
        }
        return $factory;
	}
    // public static function connectSQLite($databaseFile)
    // {
    //     $connString="sqlite:" . __DIR__ . DIRECTORY_SEPARATOR . $databaseFile;
    //     try
    //     {
    //         $con = new PDO ($connString);
    //         $con->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $con;
    //     } catch (PDOException $e) {
    //         die ("Cannot connect to server\n");
    //     }
    // }

}
?>