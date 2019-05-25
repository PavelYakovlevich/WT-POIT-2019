<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <title>WT_lab5</title>
</head>
<body> 
<form action="index.php" method="post">
    <h2>Write a number</h2>
    <input type="text" name="value"><br><br>
    <input type="submit" value="Show">
</form>
</body>
</html>

<?php  
$isWriten = false;
	if (isset($_POST['value']))
	{
	    $value = $_POST['value'];
	    $isWriten = true;
	}

if($isWriten)
{
	try
	{
	    $db = new PDO('mysql:dbname=lab5;host=127.0.0.1', 'root', 'admin');
	}
	catch(PDOException $e)
	{
	   die($e->getMessage());
	}    
	 
	$sql = "SELECT DISTINCT Id, Name, Country FROM some_table ORDER BY RAND() Limit ".$value;  
	foreach($db->query($sql) as $row)
	{
		print $row['Id']."\t";
		print $row['Name']."\t: ";
		print $row['Country']."<br>";
	} 
	 
	$db = null;
} 
?>


 
