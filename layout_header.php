<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $page_title; ?></title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
    <!-- our custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />
    <script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<=0) {
        location.href = 'login.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
  
</head>
<body>
 
    <!-- container -->
    <div class="container">
 
        <?php
        // show page header
        echo "<div class='page-header'>
                <h1>{$page_title}</h1>
            </div>";
        echo "<div class='right-button-margin'>";
        if(isset($_SESSION['uid'])){

            //echo "<a href='logout.php' class='glyphicon glyphicon-log-outt'>Add new Website</a>";
            echo "<a href='logout.php.php' class='btn btn-info btn-lg pull-right'> <span class='glyphicon glyphicon-log-out pull-right'>Logout</span></a>";
            echo "<a href='create_website.php' class='btn btn-default pull-right'>Add Website</a>";
            echo "<a href='create_licence.php' class='btn btn-default pull-right'>Buy Licence</a>";

        }
        if(isset($_SESSION['shoping_cart'])){
            echo "<a href='create_licence.php' class='btn btn-info btn-lg pull-right'> <span class='glyphicon glyphicon-log-out pull-right'>Logout</span></a>";

        }
        echo "</div>";
        ?>

