<?php
session_start();
// page given in URL parameter, default page is one
$page = isset($_GET['page']) ? $_GET['page'] : 1;
 
// set number of records per page
$records_per_page = 5;
 
// calculate for the query LIMIT clause
$from_record_num = ($records_per_page * $page) - $records_per_page;
// include database and object files
include_once 'config/database.php';
include_once 'objects/records.php';
include_once 'objects/licence.php';
include_once 'objects/website.php';
 
// instantiate database and objects
$database = new Database();
$db = $database->getConnection();
 
$records = new Records($db);
$licence= new Licence($db);
$records->customer=$_SESSION['uid'];
$websites= new Website($db);
$websites->owner=$_SESSION['uid'];
 
// query products
$stmt = $records->readAll($from_record_num, $records_per_page);
$num = $stmt->rowCount();
// set page header
$page_title = "Read Products";
include_once "layout_header.php";

 

// display the products if there are any
if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Licence</th>";
            echo "<th>Created</th>";
            echo "<th>Websites Left</th>";
            echo "<th>Websites Used</th>";
        echo "</tr>"; 
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
            $licence->id = $licence_id;
            $licence->readOne();
            $websites->licence=$licence->id;
            $res=$licence->website_allowance-$websites->countLicenceUsage();
            echo "<tr>";
                echo "<td>{$licence->name}</td>";
                echo "<td>{$created}</td>";
                echo "<td>{$res}</td>";
                echo "<td>{$websites->countLicenceUsage()}</td>";
 
                echo "<td>";
                    // read, edit and delete buttons
				echo "<a href='read_one.php?id={$id}' class='btn btn-primary left-margin'>
				    <span class='glyphicon glyphicon-list'></span> Read
				</a>
				 
				<a href='update_record.php?id={$id}' class='btn btn-info left-margin'>
				    <span class='glyphicon glyphicon-edit'></span> Edit
				</a>
				 
				<a delete-id='{$id}' class='btn btn-danger delete-object'>
				    <span class='glyphicon glyphicon-remove'></span> Delete
				</a>";
				                echo "</td>";
				 
				            echo "</tr>";
				 
				        }
				 
				    echo "</table>";
 
    // the page where this paging is used
$page_url = "index.php?";
 
// count all products in the database to calculate total pages
$total_rows = $records->countAll();
 
// paging buttons here
include_once 'paging.php';
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>No products found. {$from_record_num} {$records_per_page}{$num}</div>";
}

 
// set page footer
include_once "layout_footer.php";


?>