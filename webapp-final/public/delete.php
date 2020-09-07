<?php 

    require "../config.php";
    require "common.php";

    if (isset($_GET["id"])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET["id"];
            
            $sql = "DELETE FROM reviews WHERE id = :id";

            $statement = $connection->prepare($sql);

            $statement->bindValue(':id', $id);
            
            $statement->execute();

            $success = "Review successfully deleted";

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    };

    try {
        $connection = new PDO($dsn, $username, $password, $options);
		
        $sql = "SELECT * FROM reviews";
    
        $statement = $connection->prepare($sql);
        $statement->execute();
        
        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>

<?php include "templates/header.php"; ?>


<h2>Delete a Review</h2>

<?php if ($success) echo $success; ?>

<?php foreach($result as $row) { ?>

<p>
    ID:
    <?php echo $row["id"]; ?><br> Venue Name:
    <?php echo $row['venuename']; ?><br> Suburb:
    <?php echo $row['location']; ?><br> Date Attended:
    <?php echo $row['dateattended']; ?><br> Atmosphere:
    <?php echo $row['atmosphere']; ?><br> Menu Options:
    <?php echo $row['menu']; ?><br>
    <a href='delete.php?id=<?php echo $row['id']; ?>'>Delete</a>
</p>

<hr>
<?php };
?>



<?php include "templates/footer.php"; ?>
