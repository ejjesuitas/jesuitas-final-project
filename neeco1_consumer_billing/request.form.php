<?php

include "include.php";



?>

<?php

$sql=mysqli_query($conn, "SELECT * FROM employees");
$row = mysqli_fetch_assoc($sql);






?>

<input readonly class="form-control" type="number" name = "account_number" value="<?php echo $con_row['account_number']?>"><br>
        <input readonly class="form-control" type="text" name = "billing_month" placeholder="Billing Month" value="<?php echo $billing_month?>"><br>
        <input readonly class="form-control" type="text" name = "due_date" placeholder="Due Date" value="<?php echo $NewDate ?>"><br>
        <input readonly id="previous_reading" class="form-control" type="number" name="previous_reading" 
        placeholder="Previous Reading" value="<?php echo $con_row['previous_reading']?>"><br>
        <input class="form-control" id="present_reading" type="number" name="present_reading" 
        placeholder="Present Reading" onchange="myFunction()"required><br>
        <input readonly class="form-control" type="text" name="kwh_used" 
        placeholder="KWH Used" id="kwh_used"><br>