<?php
class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer";
 
    // object properties
    public $id;
    public $name;
    public $email;
    public $password;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT id, name FROM " . $this->table_name . " ORDER BY name";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
    // used to read category name by its ID
    function readName(){
         
        $query = "SELECT id FROM " . $this->table_name . " WHERE id = ? limit 0,1";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
        $this->name = $row['name'];
}
    public function create(){

            
            $sql="SELECT * FROM users WHERE  email='$email'";

            //checking if the username or email is available in db
            $check =  $this->conn->query($sql) ;
            $count_row = $check->num_rows;

            //if the username is not in db then insert to the table
            if ($count_row == 0){
                $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    name=:name, password=:password, email=:email";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));

        // bind values 
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":email", $this->email);
        
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
            }
            else { return false;}
    }

        /*** for login process ***/

    function login(){
 
    $query = "SELECT id, email, password FROM  " . $this->table_name . " WHERE email = :email AND password = :password";
 
    $stmt = $this->conn->prepare( $query );
        
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        
        $stmt->execute();
        $cust=$stmt->fetch(PDO::FETCH_ASSOC);
        $row_n=$stmt->rowCount(); 
        $this->id=$cust['id'];

        if( $row_n == 0 ){
       // error   
            return false;
      } else { 
       //login
        
                return true;
    }
 
            
    }
 
    function readOne(){
 
    $query = "SELECT id, email FROM  " . $this->table_name . " WHERE id=?";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->name = $row['name'];
    $this->email = $row['email'];
    $this->password = $row['password'];
            
    }

        /*** for showing the username or fullname ***/
        public function get_fullname($uid){
            $sql3="SELECT fullname FROM users WHERE uid = $uid";
            $result = mysqli_query($this->db,$sql3);
            $user_data = mysqli_fetch_array($result);
            echo $user_data['fullname'];
        }

        /*** starting the session ***/
        public function get_session(){
            return $_SESSION['login'];
        }

        public function user_logout() {
            $_SESSION['login'] = FALSE;
            session_destroy();
        }
 
}
?>