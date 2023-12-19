<?php
session_start();
if (isset($_SESSION["user_name"])) {
   header("Location: consumer_list.php");
}
?>
    <?php
    if(isset($_POST["submit"])){
          // $billing_number = $_POST["billing_number"];
           $account_number = $_POST["account_number"];
           $billing_month = $_POST["billing_month"];
           $reading_date = date("Y-m-d");
           $due_date = $_POST["due_date"];
           $previous_reading = $_POST["previous_reading"];
           $present_reading = $_POST["present_reading"];
           $kwh_used = $_POST["kwh_used"];
           $consumer_type = $_POST["consumer_type"];
           $bill_amount = $_POST["bill_amount"];
           // $penalty = $_POST["penalty"];
           $total_amount_due = $_POST["bill_amount"];
           $ongoing_billingMonth = "SELECT * FROM billing_rates WHERE rates_status = 'ONGOING' AND billing_month = '202307'";
           // $ongoing_billingMonth = 202307;
           
          $errors = array();
          
           require_once "include.php";
           $sql = "SELECT * FROM billing WHERE account_number = '$account_number'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           
           if ($rowCount>0) {
            array_push($errors);
            echo '<script> alert("Cannot be registered this month.");
            window.location="consumer_list.php";
            </script>';
            die ();
        }
        if(count($errors)>0){
          foreach ($errors as $error){ 
              echo "<div class='alert alert-danger'>$error</div>";
          }
                }else {
            $sql = "INSERT INTO billing (billing_number, account_number, billing_month, reading_date, 
            due_date, previous_reading, present_reading, kwh_used, consumer_type, bill_amount, total_amount_due) 
           VALUES ('$account_number$billing_month', '$account_number',  
           '$billing_month', current_date(), '$due_date', '$previous_reading', 
           '$present_reading', '$kwh_used', '$consumer_type', 
           '$bill_amount', '$bill_amount')";

   if (mysqli_query($conn, $sql)) {
    echo '<script> alert("Billing information registered successfully!");
     window.location="consumer_list.php";
     </script>';
   } else {
       echo "Error: " . mysqli_error($conn);
   }
    }
    
        }
        ?>