<?php 
    class databaseContext {
        // Enter own information for database
        private static $user = "";
        private static $password = 'root';
        private static $dsn = 'mysql:host=localhost;dbname=ChopperForceFiveDB';
        private static $dbcon;

        private function __construct() {
        }
        public static function dbConnect() {
            if(!isset(self::$dbcon)){
                try {
                    self::$dbcon = new PDO(self::$dsn,self::$user,self::$password);
                    self::$dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    self::$dbcon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ); 
                } catch (PDOException $error) {
                    $errorMsg = $error->getMessage();
                    include "../Pages/ErrorPage.php";
                    exit();
                }
    
            }
            return self::$dbcon;
        }
    }
?>