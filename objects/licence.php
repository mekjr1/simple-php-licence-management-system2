<?php
class Licence{
 
    // database connection and table name
    private $conn;
    private $table_name = "licence";
 
    // object properties
    public $id;
    public $name;
    public $price;
    public $website_allowance;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = "SELECT id, name, price, website_allowance FROM " . $this->table_name . " ORDER BY name";  
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }

     function readOne(){
 
    $query = "SELECT website_allowance, name FROM  " . $this->table_name . " WHERE id=?";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $this->name = $row['name'];
    $this->website_allowance = $row['website_allowance'];
     return $this;
            
    }
 
}
?>