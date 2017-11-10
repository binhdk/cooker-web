<?php 
namespace dao;
use \PDO;
class MySQLDaoFactory extends AbstractDaoFactory
{
    private static $instance = null;

	private function __construct()
	{
		$this->createConnection();
	}

    public static function getInstance()
    {
        if (static::$instance == null) {
            static::$instance = new MySQLDaoFactory;
        }
        return static::$instance;
    }
	
    protected function createConnection()
    {
        if($this->conn == null) {
            try{
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
                $this->conn = new PDO ($dsn,DB_USERNAME,DB_PASSWORD);
                $this->conn->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e){
                die ("Cannot connect to server\n");
            }
        }
    }

}
?>