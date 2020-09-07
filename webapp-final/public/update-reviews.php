<?php 

    require "../config.php";
    require "common.php";


    if (isset($_POST['submit'])) {
        try {
            $connection = new PDO($dsn, $username, $password, $options);  
            
            $work =[
              "id"         => $_POST['id'],
              "venuename" => $_POST['venuename'],
              "location"  => $_POST['location'],
              "dateattended"   => $_POST['dateattended'],
            "atmosphere"   => $_POST['atmosphere'],
              "menu"   => $_POST['menu'],
              "date"   => $_POST['date'],
            ];
            
            $sql = "UPDATE `reviews` 
                    SET id = :id, 
                        venuename = :venuename, 
                        location = :location,
                        dateattended = :dateattended, 
                        atmosphere = :atmosphere, 
                        menu = :menu, 
                        date = :date 
                    WHERE id = :id";

            $statement = $connection->prepare($sql);
            $statement->execute($work);

        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }

    if (isset($_GET['id'])) {
    
        
        try {
            $connection = new PDO($dsn, $username, $password, $options);
            
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM reviews WHERE id = :id";
            
            $statement = $connection->prepare($sql);
            
            $statement->bindValue(':id', $id);
            
            $statement->execute();
            
            $work = $statement->fetch(PDO::FETCH_ASSOC);
            
        } catch(PDOExcpetion $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {

        echo "No id - something went wrong";

    };

?>

<?php include "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
<p>Review successfully updated.</p>
<?php endif; ?>

<h2>Edit a work</h2>

<form method="post">

    <label for="id">ID</label>
    <input type="text" name="id" id="id" value="<?php echo escape($work['id']); ?>">

    <label for="venuename">Venue Name</label>
    <input type="text" name="venuename" id="venuename" value="<?php echo escape($work['venuename']); ?>">

    <label for="location">Suburb</label>
    <input type="text" name="location" id="location" value="<?php echo escape($work['location']); ?>">

    <label for="dateattended">Date Attended</label>
    <input type="text" name="dateattended" id="dateattended" value="<?php echo escape($work['dateattended']); ?>">

    <label for="atmosphere">Atmosphere</label>
    <input type="text" name="atmosphere" id="atmosphere" value="<?php echo escape($work['atmosphere']); ?>">

    <label for="menu">Menu Options</label>
    <input type="text" name="menu" id="menu" value="<?php echo escape($work['menu']); ?>">

    <input type="submit" name="submit" value="Save">

</form>


<?php include "templates/footer.php"; ?>
