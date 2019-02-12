<?php
class Website{
 
    // database connection and table name
    private $conn;
    private $table_name = "website";
 
    // object properties
    public $id;
    public $url;
    public $owner;
    public $licence;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT id, url FROM " . $this->table_name . " ORDER BY url";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
     // create product
    function create(){
 
        //write query
        $query = "INSERT INTO " . $this->table_name . " SET url=:url, customer_id=:owner, licence_id=:licence";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->url=htmlspecialchars(strip_tags($this->url));
        $this->owner=htmlspecialchars(strip_tags($this->owner));
        $this->licence=htmlspecialchars(strip_tags($this->licence));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d H:i:s');
 
        // bind values 
        $stmt->bindParam(":url", $this->url);
        $stmt->bindParam(":owner", $this->owner);
        $stmt->bindParam(":licence", $this->licence);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readByUserIDandLicence(){
 
        $query = "SELECT id, customer_id, licence_id  FROM  " . $this->table_name . " WHERE customer_id=? and licence_id=?";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->owner);
        $stmt->bindParam(2, $this->licence);
        $stmt->execute();
        return $stmt;
            
    }
    public function countLicenceUsage(){
     
        
     
        $stmt = $this->readByUserIDandLicence();
        
     
        $num = $stmt->rowCount();
     
        return $num;
    }

    function readAll($from_record_num, $records_per_page){
 
        $query = "SELECT
                    id, url, licence_id
                FROM
                    " . $this->table_name . " WHERE customer_id=? 
                ORDER BY
                    url ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->owner);
        $stmt->execute();
     
        return $stmt;
    }
 
}
?>