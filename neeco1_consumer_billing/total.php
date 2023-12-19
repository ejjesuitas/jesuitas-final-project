<?php
session_start();
include "include.php";
?>

<?php
  $id = $_GET['id'];
  $sql = mysqli_query($conn, "SELECT bill_amount, penalty, total_amount_due FROM billing WHERE id = '$id'");
  $row = mysqli_fetch_assoc($sql);
  $billing_table = "SELECT * FROM billing_table WHERE due_date < current_date()";

    $bill_amount = $row['bill_amount'];
    $penalty = $bill_amount * 12;
    $total_amount_due = $row['total_amount_due'];
    $updated_total_amount_due = $bill_amount+$penalty;

    $updateamount = mysqli_query($conn, "UPDATE billing SET penalty = '$penalty' WHERE id = '$id'");
    if (!$updateamount) {
      echo "Error updating amount: " . mysqli_error($conn);
  }
    
    $updatetotal = mysqli_query($conn, "UPDATE billing SET total_amount_due='$updated_total_amount_due' WHERE id='$id'");
    if (!$updatetotal) {
      echo "Error updating total: " . mysqli_error($conn);
  }
   if ($updatetotal && $updateamount) {
    echo '<script>
      alert("Data updated successfully!");
      window.location="billing_table.php";
       </script>';
    } else {
       echo '<script>
         alert("Failed to update data. Try again.");
         window.location="billing_table.php";
       </script>' . mysqli_error($conn);
     }
    
?>

billing_datable = select * from billing where duedate < today

loop sa billing_datable
for i = 1 to billing_Databale count(1000)

get 

accountNumber = billing_datable['accountNumber']
billAmount = billing_datable['bill amount']

computation
penalty = billAmount * 12

db update
update billing set penalty = penalty, totalAmountDue = billAmount + penalty

next
