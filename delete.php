<?php include 'conn.php';
$id=$_GET['id']??'';

$sql = "DELETE FROM vivek WHERE id=$id";

if (mysqli_query($conn, $sql)) {
	echo "Record deleted successfully";
	header("Location:index.php");
} else {
	echo "Error deleting record: " . mysqli_error($conn);
}

?>