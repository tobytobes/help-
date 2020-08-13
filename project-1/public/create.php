<!--this is the form to input assignments. It contains the assignment name, class name, due date and a short description on
the assignment type (essay, website, artwork etc). did i think my abbreviation of assignment was funny? yes. did i laugh too
frequently at it? i think you know the answer to that...-->
<?php

if (isset($_POST['submit'])) {
    require "../config.php";
		
		try {
		$connection = new PDO($dsn, $username, $password, $options);

		$new_assignment = array(
			"assname"		=> $_POST['assname'],
			"class"			=> $_POST['class'],
			"duedate"		=> $_POST['duedate'],
			"asstype"		=> $_POST['asstype'],
		);

		$sql = "INSERT INTO assignments (assname, class, duedate, asstype) VALUES (:assname, :class, :duedate, :asstype)";
		
		$statement = $connection->prepare($sql);
        $statement->execute($new_assignment);

        } catch(PDOException $error) {
        	echo $sql . "<br>" . $error->getMessage();
        }
}
?>

<?php include "templates/header.php"; ?>

<h5>Add a new assignment!</h5>

<?php if (isset($_POST['submit']) && $statement) { ?>
<p>Work successfully added.</p>
<?php } ?>

<form method="post">
	<label for="assname">Name of assignment</label> 
	<input type="text" name="assname" id="assname"> 
	<label for="class">Class</label> 
	<input type="text" name="class" id="class"> 
	<label for="duedate">Due date of assignment</label> 
	<input type="text" name="duedate" id="duedate"> 
	<label for="asstype">Assignment type</label> 
	<input type="text" name="asstype" id="asstype"> 
	<input type="submit" name="submit" value="Submit">
</form>

<?php include "templates/footer.php"; ?>
