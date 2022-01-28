<?php
include "db.php";
$email=$_POST['email'];
$password=$_POST['pwd'];
$id=$_POST['id'];
$sql = "UPDATE profile SET email='$email',password='$password' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "record Updated successfully";
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