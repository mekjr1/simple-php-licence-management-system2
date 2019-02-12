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
    $customer->name = $_POST['name'];

    $register = $customer->create();


    // create the product
    if($register){
        session_unset();
        header("location:login.php");


    }

    // if unable to create the product, tell the user
    else{

        echo "<div class='alert alert-danger'>Unable to register.</div>";

    }
}


?>



    <span style="font-family: 'Courier 10 Pitch', Courier, monospace; font-size: 13px; font-style: normal; line-height: 1.5;"><div id="container"></span>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="register" style="border:1px solid #ccc">

            <div class="container">
                <h1>Sign Up</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label for="email"><b>Full Name</b></label>
                <input type="text" placeholder="Enter Email" name="email" required>
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="name" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                <label>
                    <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                </label>

                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                <div class="clearfix">
                    <button type="button" class="cancelbtn">Cancel</button>
                    <button type="submit" class="signupbtn">Sign Up</button>
                </div>
            </div>

    </form>

<?php
// set page footer
include_once "layout_footer.php";


?>