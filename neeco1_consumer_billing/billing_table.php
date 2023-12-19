<?php
include "include.php";
session_start();
if ($_SESSION["user_name"]==null) {
    header("Location: admin.php");
 }
 $admin_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <title>BILLING TABLE</title>
    <style>
        /* nav bar */ 
        
        body {
    margin: 0;
    
    }

    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 10%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
    }

    li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
    }

    li a.active {
    background-color: #04AA6D;
    color: white;
    }

    li a:hover:not(.active) {
    background-color: #555;
    color: white;
    }
    /*table css*/
        .styled-table {
    border-collapse: collapse;
    margin: 10px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 200px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
    }
    .styled-table th,
    .styled-table td {
    padding: 5px 7px;
    }
    .styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
    }
    .styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
    }

    /*button css */
    .button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 3px 3px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 10px;
    margin: 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    }

    .button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
    }

    .button1:hover {
    background-color: #4CAF50;
    color: white;
    }
    .button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
    }

    .button2:hover {
    background-color: red;
    color: white;
    }
    /*search bar*/
    .container-input{
	position: relative;
    display: flex;
    justify-content: center;
}
.input{
	width: 150px;
	padding: 10px 0px 10px 20px;
	border-radius: 9999px;/*dafuq*/ 
	border: solid 1px #333;
	transition: all .2s ease-in-out;
	outline: none;
	opacity: 0.8;
}
.input:focus{
	opacity: 1;
	width: 170px;
}    
h1{
    display: flex;
    justify-content: center;
}

    </style>
</head>
<body>
<ul>
  <li><a class="active" href="billing_table.php">BILLING TABLE</a></li>

  <li><a href="consumer_list.php">Consumer List</a></li>
  <p>---- ADMIN ---- <br> ---- <?php echo $admin_name?> ----</p>
  <li><a href="logout.php">Logout</a></li>
 
</ul>

<div style="margin-left:9%;padding:1px 16px;height:1000px;">
    <div class="container">
        <h1 class="text-white" position="center">Billing Table</h1>
        <br>
        <div class="container-input">
		<form action="bill_search.php" method="POST" class="container">
			<input type="text" name="search" placeholder="Search Database..." class="input">
		</form>
	</div>

        <table class = "styled-table">
            <tr class = "active-row">   
                <th>Billing Number</th> 
                <th>Account Number</th> 
                <th>Reading Date</th> 
                <th>Due Date</th> 
                <th>Previous Reading</th> 
                <th>Present Reading</th> 
                <th>Kwh Used</th> 
                <th>Bill Amount</th> 
                <th>Penalty</th>
                <th>Total Amount Due</th>  
                <th>Bill Status</th>
            </tr>

            <?php 
            $result = mysqli_query($conn, "SELECT * FROM billing");
            while ($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['billing_number']?></td>
                    <td><?php echo $row['account_number']?></td>
                    <td><?php echo $row['reading_date'] ?></td>
                    <td><?php echo $row['due_date'] ?></td>
                    <td><?php echo $row['previous_reading'] ?></td>
                    <td><?php echo $row['present_reading'] ?></td>
                    <td><?php echo $row['kwh_used'] ?></td>
                    <td><?php echo $row['bill_amount'] ?></td>
                    <td>
                    <?php
                        if($row['penalty']==0){ ?>
                            <a href="total.php?id=<?php echo $row['id']?>&bill_amount=<?php echo $row['bill_amount']?>" class="alert alert-success" button="disabled"/>Overdue</a>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                        
                      <?php }else{ ?>
                        <a  href="total.php?id=<?php echo $row['id']?>" class="alert alert-danger" button="disabled"/>Overdue</a>
                     <?php }
                        ?>
                        </td>
                    <td><?php echo $row['total_amount_due']?></td>
                    <td>
                        <?php
                        if($row['bill_status']==0){ ?>
                            <a href="status.php?id=<?php echo $row['id']?>" class="alert alert-danger"/>UNPAID</a>
                        <input type="hidden" name="id" value="<?php echo $row['id']?>">
                      <?php }else{
                        echo "PAID";

                      }
                        ?>
                        <div class="form-group">
                <input hidden type="text" value = "<?php echo $penalty ?>" class="form-control" name="penalty" placeholder="Penalty:" >
            </div>
            <div class="form-group">
                <input hidden type="text" value = "<?php echo $total_amoune_due ?>" class="form-control" name="total_amount_due" placeholder="Total amoun due:" >
            </div>
            <div class="form-group">
                <input hidden type="text" value = "<?php echo $bill_amount ?>" class="form-control" name="bill_amount" placeholder="Bill amount:" >
            </div>
                    
                       
            </td>
                    <td>
                    
                    <td>
                    <a href = "edit_billing.php?id=<?php echo $row['id']?>">
                    <button class="Btn1">Edit 
                    <svg class="svg" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 
                    89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 
                    37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 
                    6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 
                    231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 
                    3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 
                    325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 
                    14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 
                    144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 
                    16.4 0 22.6z"></path></svg>
                    </button>
			</a>
            </td>

			<td>
			<a href ="delete_billing.php?id=<?php echo $row['id']?>">
            <button class="noselect">
                <span class="text">Delete</span>
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 
                    8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 
                    3.666 8.237-8.318 8.285 8.203z">
                </path>
            </svg>
        </span>
    </button>
			</a>

                    </td>
                </tr>
<?php } ?>
        </table>
            </div>
</body>
</html>