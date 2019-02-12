<?php
class Records{
 
    // database connection and table name
    private $conn;
    private $table_name = "records";
 
    // object properties
    public $id;
    public $customer;
    public $created;
    public $licence;
 
    public function __construct($db){
        $this->conn = $db;
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $query = $query = "SELECT id, customer_id, created, licence_id FROM " . $this->table_name . " ORDER BY id";
 
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
 
        return $stmt;
    }
    function readByUserID(){
 
        $query = "SELECT id, customer_id, created, licence_id  FROM  " . $this->table_name . " WHERE customer_id=?";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->customer);
        $stmt->execute();
        return $stmt;
            
    }
     // create product
    function create(){
 
        //write query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    customer_id=:customer, licence_id=:licence, created=:created";
 
        $stmt = $this->conn->prepare($query);
 
        // posted values
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->licence=htmlspecialchars(strip_tags($this->licence));
        $this->created=htmlspecialchars(strip_tags($this->created));
        $this->customer=htmlspecialchars(strip_tags($this->customer));
 
        // to get time-stamp for 'created' field
        $this->timestamp = date('Y-m-d');
 
        // bind values 
        $stmt->bindParam(":customer", $this->customer);
        $stmt->bindParam(":licence", $this->licence);
        $stmt->bindParam(":created", $this->created);
 
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
 
    }
    function readAll($from_record_num, $records_per_page){
 
        $query = "SELECT
                    id, customer_id, created, licence_id
                FROM
                    " . $this->table_name . " WHERE customer_id=?
                ORDER BY
                    created ASC
                LIMIT
                    {$from_record_num}, {$records_per_page}";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->customer);
        $stmt->execute();
     
        return $stmt;
    }
    // used for paging products
    public function countAll(){
     
        $query = "SELECT id FROM " . $this->table_name . "";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
     
        $num = $stmt->rowCount();
     
        return $num;
    }
 
}
?>