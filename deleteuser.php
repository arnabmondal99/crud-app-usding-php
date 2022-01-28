<?php
include "db.php";

$id=$_POST['id'];
$sql = "DELETE FROM profile WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "record Deleted successfully";
//   header("Location: ../index.php");
?>
<script>
window.location.href = "../index.php";
    </script>
<?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>