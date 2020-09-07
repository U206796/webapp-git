<?php
// include config file
if (isset($_POST['submit'])) {

    require "../config.php";


    try { 
    $connection = new PDO($dsn, $username, $password, $options);
    
    $new_review = array(
    "venuename">$_POST['venuename'],
    "location">$_POST['location'],
    "dateattended">$_POST['dateattended'],
    "atmosphere">$_POST['atmosphere'],
    "menu">$_POST['menu'],
    );
    
$sql = "INSERT INTO reviews (venuename, location, dateattended, atmosphere, menu) VALUES (:venuename, :location, :dateattended, :atmosphere, :menu)";

$statement = $connection->prepare($sql);
$statement->execute($new_review);

    } catch (PDOException $error){
        echo $sql . "<br>" . $error->getMessage();
    
        }
}
?>

<?php include "templates/header.php"; ?>

<h2>Add a Review</h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Review successfully added.</p>
<?php } ?>

<form method="post">
    <label for="venuename">Venue Name</label>
    <input type="text" name="venuename" id="venuename">

    <label for="location">Suburb</label>
    <input type="text" name="location" id="location">

    <label for="dateattended">Date Attended</label>
    <input type="text" name="dateattended" id="dateattended">

    <label for="atmosphere">Atmosphere</label>
    <input type="text" name="atmosphere" id="atmosphere">

    <label for="menu">Menu Options</label>
    <input type="text" name="menu" id="menu">

    <input type="submit" name="submut" value="submit">
</form>

<?php include "templates/footer.php"; ?>
