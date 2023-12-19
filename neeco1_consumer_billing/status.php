<?php
session_start();
include "include.php";
?>
<?php
  $id = $_GET['id'];

  //$array = mysqli_query($conn, "SELECT * FROM billing");
  $updatestatus = mysqli_query($conn, "UPDATE billing SET bill_status = 1 WHERE id = '$id'");

  if ($updatestatus) {
   echo '<script>
     alert("Data updated successfully!");
      window.location="billing_table.php";
    </script>';
  } else {
    echo '<script>
      alert("Failed to update data. Try again.");
      window.location="billing_table.php";
    </script>';
  }
?>