<?php
session_start();
// include database and object files
include_once 'config/database.php';
include_once 'objects/licence.php';
include_once 'objects/customer.php';
include_once 'objects/website.php';
include_once 'objects/records.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$customer = new Customer($db);
$licence = new Licence($db);
$website = new Website($db);
$records = new Records($db);

// set page headers
$page_title = "Create Website";
include_once "layout_header.php";
 

 ?>
<!-- 'create Webiste' html form will be here -->
<?php

// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
    $website2 = new Website($db);
 
    // set product property values
    $website2->url = $_POST['url'];
    $website2->owner = $_SESSION['uid'];
    $website2->licence = $_POST['licence_id'];

    echo "Url  {$website->owner} {$website->url} {$website->licence}";
 
    // create the product
    if($website2->create()){
        echo "<div class='alert alert-success'>Website was added successfuly.</div>";
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to add website.</div>";
    }
}
?>
 
<!-- HTML form for Adding a Website -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>URL</td>
            <td><input type='text' name='url' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Licence Type</td>
            <td>

            	<?php
					// read the purchase records from the database
                    $userid=$_SESSION['uid'];
                    $records->customer=$userid;
					$stmt = $records->readByUserID();
                    
					 
					// put them in a select drop-down
					echo "<select class='form-control' name='licence_id'>";
					    echo "<option>Select licence...</option>";
					 
					    while ($row_records = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $licence->id = $row_records['licence_id'];
                            $licence-> readOne();
                            $website->owner=$userid;
                            $website->licence=$licence->id;
					        extract($row_records);
                            $usageleft= $licence->website_allowance - $website->countLicenceUsage();
                            if ($usageleft>0){
					        echo "<option value='{$id}'> Use your {$licence->name} Licence purchased on {$created} with  {$usageleft} of usage left</option>";
                            }
					    }
					 
					echo "</select>";
				?>
            </td>
        </tr>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>
<?php
include_once "layout_footer.php";
?>