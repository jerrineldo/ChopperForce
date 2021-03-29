<?php 
class Account {
    //Might want to change this to set the username as the primary key
    private $id;
    private $user_id;
    private $username;
    private $password;
    private $role; // Might be good idea to make this into a separate table after

    public function __construct($id = null, $user_id, $username, $password, $role) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }
    // Getter functions
    public function getId() {
        return $this->id;
    }
    public function getUserId() {
        return $this->user_id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getRole() {
        return $this->role;
    }
    // Setter Functions
    public function setId($id) {
        $this->id = $id;
    }
    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    public function setUsername($username) {
        $this->username = $username;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setRole($role) {
        $this->role = $role;
    }
    //Data controller functions
    public function getAccountById($id, $db) {
        $sql = "SELECT * FROM login where id = :id"; //Might want to change the table name in the future to fit naming conventions
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getAccountByUsername($username, $db) {
        $sql = "SELECT * FROM login WHERE username = :username";
        $pst = $db->prepare($sql);
        $pst->bindParam(':username', $username);
        $pst->execute();
        return $pst->fetch(\PDO::FETCH_OBJ);
    }
    public function getAllAccounts($db) {
        $sql = "SELECT * FROM login";
        $pst = $db->prepare($sql);
        $pst->execute();
        $personnels = $pst->fetchAll(\PDO::FETCH_OBJ);
        return $accounts; //Returns array of accounts
    }
    public function addAccount(Account $account, $db) {
        $sql = "INSERT INTO login (user_id, username, password, role) 
              VALUES (:user_id, :username, :password, :role)";
        $pst = $db->prepare($sql);

        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':password', $password);
        $pst->bindParam(':role', $role);

        $count = $pst->execute();
        return $count; //Returns boolean true if success, false if error
    }
    public function deleteAccount($id, $db){
        $sql = "DELETE FROM login WHERE id = :id";
        $pst = $db->prepare($sql);
        $pst->bindParam(':id', $id);
        $count = $pst->execute();
        return $count;
    }
    public static function updateAccount(Account $account,$db) {
        $id = $account->getId();
        $user_id = $account->getUserId();
        $username = $account->getUsername();
        $password = $account->getPassword();
        $role = $account->getRole();

        $sql = "UPDATE account
                SET 
                user_id = :user_id,
                username = :username,
                password = :password,
                role = :role
                WHERE id = :id";
        $pst =  $db->prepare($sql);

        $pst->bindParam(':user_id', $user_id);
        $pst->bindParam(':username', $username);
        $pst->bindParam(':password', $password);
        $pst->bindParam(':role', $role);

        $count = $pst->execute();
        return $count; //Return status
    }
}
?>