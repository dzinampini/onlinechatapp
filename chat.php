<?php 

include 'db.php';

        $query = "SELECT * FROM chats ORDER BY id DESC";
        $run = $con->query($query);

        while($row = $run->fetch_array()) :
        	//get name of sender
        	$sender = $row['sender']; 
        	$query2 = "SELECT * FROM users WHERE id ='$sender'";
        	$run2 = $con->query($query2);
        	while($row2 = $run2->fetch_array()){
        		$sendername = $row2['fullname'];
        	}
    ?>
           
    <div id="chat_data">
        <span style="color:red;"> <?php echo $sendername; ?></span> 
        <span style="color:black;"> <?php echo $row['message']; ?></span>
        <span style="float:right;"> <?php echo formatDate($row['dt']); ?></span>
    </div>
<?php endwhile; ?>