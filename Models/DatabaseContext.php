<?php 
    class DatabaseContext {
        // Enter own information for database
        private static $user = "sql5399166";
        private static $password = 'zK7MWTPQvk';
        private static $dsn = 'mysql:host=sql5.freesqldatabase.com;dbname=sql5399166';
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