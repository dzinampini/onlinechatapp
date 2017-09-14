<?php 

include 'db.php';

        $query = "SELECT * FROM chit ORDER BY id DESC";
        $run = $con->query($query);

        while($row = $run->fetch_array()) :
    ?>
           
    <div id="chat_data">
        <span style="color:red;"> <?php echo $row['name']; ?></span> 
        <span style="color:black;"> <?php echo $row['message']; ?></span>
        <span style="float:right;"> <?php echo formatDate($row['date']); ?></span>
    </div>
<?php endwhile; ?>