<?php 
if (isset($_POST['submit'])) {
	
    require "../config.php"; 
    
	try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM reviews";

        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();

	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}	
}
?>

<?php include "templates/header.php"; ?>


<?php  
    if (isset($_POST['submit'])) {
        if ($result && $statement->rowCount() > 0) { ?>
<h2>Results</h2>

<?php 
                foreach($result as $row) { 
            ?>

<p>
    ID:
    <?php echo $row["id"]; ?><br> Venue Name:
    <?php echo $row['venuename']; ?><br> Suburb:
    <?php echo $row['location']; ?><br> Date Attended:
    <?php echo $row['dateattended']; ?><br> Atmosphere:
    <?php echo $row['atmosphere']; ?><br> Menu Options:
    <?php echo $row['menu']; ?><br>
</p>
<?php 
        
        ?>

<hr>
<?php };
        }; 
    }; 
?>


<form method="post">

    <input type="submit" name="submit" value="View all">

</form>


<?php include "templates/footer.php"; ?>
