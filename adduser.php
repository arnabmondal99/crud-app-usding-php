<?php
include "db.php";
$email=$_POST['email'];
$password=$_POST['pwd'];
$sql = "INSERT INTO profile SET email='$email',password='$password'";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
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