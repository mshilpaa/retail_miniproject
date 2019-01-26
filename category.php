<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Category</title>
    
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <style>
    
     #main{
               
               background-color: white; 
               margin-left: 400px;
               margin-right: 400px;
               margin-top: 150px;
               padding-top: 30px;
                 padding-left: 50px;
         padding-bottom: 50px;
               opacity: 0.9;
         font-weight: bold;
           }   
           
    </style>
    
</head>
<body>
   <div class="navbar">
        <a href="index.php">Home</a>
        <a href="addmore.php">Buy</a>
        <div class="dropdown">
          <button class="dropbtn">Add 
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="product.php">Add Product</a>
            <a class = "active" href="category.php">Add Category</a>
            <a href="supplier.php">Add Supplier</a>
             <a href="stock.php">Add Stock</a>
          </div>
        </div> 
        <div class="dropdown">
                <button class="dropbtn">Delete 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="pdelete.php">Delete Product</a>
                  <a href="cdelete.php">Delete Category</a>
                  
                </div>
              </div>  
        <div class="dropdown">
                <button class="dropbtn">View 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                  <a href="viewp.php">View Product</a>
                  <a href="viewc.php">View List</a>
                 
                </div>
              </div> <a href="restorep.php">Restore Product</a>
      </div>
       <div id="main">
        <h2>Add Category</h2>
        <br>
        <form method="post">
            Enter Category Name:
            <input type = "text" name = "categoryname">
            <br><br>
            <input type="submit" name = "submit">
        </form>
    </div>
</body>
</html>


<?php
//error_reporting(E_ALL ^ E_NOTICE);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "retail";

$conn = mysqli_connect($servername,$username,$password,$dbname);
/*if(!$conn){
    die("Connection Failed". mysqli_connect_error());
}
else{ echo "Connected to Database"; }*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
     
     addcat();
 }   

function addcat(){
    global $conn;
    $categoryname = $_POST["categoryname"];
    $categorysql = "INSERT INTO category (categoryname) VALUES ('$categoryname')";

    if(mysqli_query($conn,$categorysql)){
    echo "<h2>New Category Created</h2>";
    }
    else{ echo "<h2>Category not created</h2>"; }

}
mysqli_close($conn);
?>