<?php

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
$page_title = "Register an Account";
include_once "layout_header.php";
 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-default pull-right'>Read Products</a>";
echo "</div>";
 ?>
<!-- 'create Webiste' html form will be here -->
<?php

// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set product property values
    $customer->name = $_POST['name'];
    $customer->email = $_POST['email'];
    $customer->password = $_POST['password'];
 
    // create the product
    if($customer->create()){
        echo "<div class='alert alert-success'>Licence purchased sucessfully. <p>You will be redirected in <span id='counter'>5</span> second(s).</p></div>";


    
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>Unable to create account.</div>";
    }
}
?>
 
<!-- HTML form for Adding a Website -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Name: </td>
            <td><input type='text' name='name' class='form-control' /></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><input type='text' name='email' class='form-control' /></td>
        </tr>
        <tr>
            <td>Password: </td>
            <td><input type='text' name='password' class='form-control' /></td>
        </tr>
        <tr>
            <td><button type="reset" class="btn btn-primary">Clear</button></td>
            <td>
                <button type="submit" class="btn btn-primary">Login</button>
            </td>
        </tr>
 
        
 
    </table>
</form>
<?php
include_once "layout_footer.php";
?>