<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
    include_once 'objects/customer.php';
    include_once 'config/database.php';

// get database connection
$database = new Database();
$db = $database->getConnection();
 
// pass connection to objects
$customer = new Customer($db);
// set page headers
$page_title = "Register an Account";
include_once "layout_header.php";
?>
<?php
// if the form was submitted - PHP OOP CRUD Tutorial
if($_POST){
 
    // set product property values
    $customer->email = $_POST['email'];
    $customer->password = $_POST['password'];
    
    $login = $customer->login();
    
    
    // create the product
    if($login){
       header("location:index.php");
       $_SESSION['login'] = true;
       $_SESSION['uid'] = $customer->id;
    }
 
    // if unable to create the product, tell the user
    else{
         
        echo "<div class='alert alert-danger'>Wrongass Username or Password.</div>";
        
    }
}


?>



<span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;"><div id="container"></span>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="login">
    <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter e-mail" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Register <a href="register.php">Account?</a></span>
    </div>
</form>

<?php
// set page footer
include_once "layout_footer.php";


?>