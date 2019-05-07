<?php session_start();
include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Chit Chat</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="style.css" media="all" />
</head>

<body>

<div id="container">
	<br><br>
	<h3 align="center">Login </h3>
	<br><br>
    
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="Enter username"/>
            <br><br>
            <input type="password" name="password" placeholder="Enter password"/>
            <br><br>
            <input type="submit" name="submit" value="LOGIN"/>
            
        </form>
</div>
</body>
</html>

<?php //login script

if (isset($_POST['submit'])){
    
     // include 'db.php';
        $username = $_POST["username"];
        $password = md5($_POST["password"]);

        $result ="";
        $query = "SELECT * FROM users WHERE username='$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        // $rows=mysqli_fetch_array($result);
        // $role=$rows['role'];

      
        
        if(!$result){
            die( "\n\ncould'nt send the query because".mysqli_error($con));
            exit;
        }

        $row = mysqli_num_rows($result);
        if($row==1){
          $_SESSION['username'] = $username; ?> 
            <script>alert("Login successful");location="index.php";</script>
            <?php exit;
        }  

        else{ ?>
            <script> 
                alert('Wrong Username or Password ,Please Try Again');
            </script>
        <?php }
}
?>

