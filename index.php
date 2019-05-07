<?php session_start();
include 'db.php';

if(empty($_SESSION['username'])) {
  $username = ""; 
  ?><script>alert("you need to be logged in to access the system");location="login.php";</script><?php
}

elseif(isset($_SESSION['username']) && !empty($_SESSION['username'])){
  $username=$_SESSION['username'];

  $rs = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'")or die(mysqli_error($con));

    while($row = mysqli_fetch_array($rs)){
       $sig = $row['id']; //sig for signature 
       $username = $row['username'];
       $password = $row['password'];
       $fullname = $row['fullname'];
    }
} ?>

<!DOCTYPE html>
<html>
<head>
    <title>Chit Chat</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="style.css" media="all" />
    <script>
        
        function ajax() {
            
            var req = new XMLHttpRequest();
            req.onreadystatechange = function (){
                if (req.readyState == 4 && req.status == 200) {
                    
            document.getElementById('chat').innerHTML = req.responseText;
                    
                }
            }
            
            req.open('GET', 'chat.php', true);
            req.send();
        }
        setInterval(function(){ajax()},1000);
    </script>
</head>

<body onload="ajax();">
   
    <div id="container">
        <form method="post" action="index.php">
            <textarea name="message" placeholder="enter message"></textarea>
            <input type="submit" name="submit" value="send it"/>
        </form>
        <br>
        <a href="logout.php">Log me out</a>
        <div id="chat_box"> 
        <div id="chat"></div>           
        </div>
        
         
         <?php
        if(isset($_POST['submit'])) {

        $message = $_POST['message'];
            
           $query = "INSERT INTO chats (sender, message) values('$sig','$message')";
            
            $run = $con->query($query);
            
            if($run) {
                echo "<embed loop='false' src='chat.mp3' hidden='true' autoplay='true' />";
            }   
        }
           
         ?>
        
    </div>
</body>
</html>