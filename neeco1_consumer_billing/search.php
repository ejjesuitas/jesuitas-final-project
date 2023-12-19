<?php
include "include.php";
$search = $_POST['search'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <title>CONSUMER LIST</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<style>
	 /*nav bar*/
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
    /*search bar*/
    .container-input{
	position: relative;
    display: flex;
    justify-content: center;
}
.input{
	width: 150px;
	padding: 10px 0px 10px 20px;
	border-radius: 9999px;
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
.buttonv2 {
    display: inline-block;
    border-radius: 7px;
    border: none;
    background: #1875FF;
    color: white;
    font-family: inherit;
    text-align: center;
    font-size: 13px;
    box-shadow: 0px 14px 56px -11px #1875FF;
    width: 10em;
    padding: 1em;
    transition: all 0.4s;
    cursor: pointer;
   }
   
   .buttonv2 span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.4s;
   }
   
   .buttonv2 span:after {
    content: 'billing';
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.7s;
   }
   
   .buttonv2:hover span {
    padding-right: 3.55em;
   }
   
   .buttonv2:hover span:after {
    opacity: 4;
    right: 0;
   }
	</style>
	</head>
<body>
<ul>
  <li><a class="active" href="consumer_list.php">CONSUMER LIST</a></li>
  <li><a href="" data-bs-toggle="modal" data-bs-target="#addinvModal">Add Consumer</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div class="modal fade" id="addinvModal" tabindex="-1" aria-labelledby="addinvModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addinvModalLabel">Input Consumer Information Here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="add_consumer.php" method="POST">
        <input class="form-control" type="number" name = "account_number" placeholder="Account Number" required><br>
        <input class="form-control" type="text" name = "first_name" placeholder="First Name" required><br>
        <input class="form-control" type="text" name = "last_name" placeholder="Last Name" required><br>
        <input class="form-control" type="text" name = "middle_name" placeholder="Middle Name" required><br>
        <input class="form-control" type="text" name = "con_address" placeholder="Address" required><br>
        <div class="form-group">

            <label>District:</label>

                    <select name="district">
                    <option value="01">GAPAN A</option>
                    <option value="02">GAPAN B</option>
                    <option value="03">CABIAO</option>
                    <option value="04">SAN ISIDRO</option>
                    <option value="05">JAEN</option>
                    <option value="06">SAN ANTONIO</option>
                    </select>

            </div>
        <br>
        <input class="form-control" type="number" name = "contact_number" placeholder="Contact Number" required><br>
        <div class="form-group">

            <label>Consumer type:</label>

            <select name="consumer_type">
            <option value="R">RESIDENTIAL</option>
            <option value="C">COMMERCIAL</option>
            <option value="LV">LOW VOLTAGE</option>
            <option value="HV">HIGH VOLTAGE</option>
            </select>

           </div>
        <br>
        <input class="form-control" type="number" name = "meter_number" placeholder="Meter Number" required><br>
        <input class="form-control" type="number" name = "previous_reading" placeholder="Previous Reading" required><br>
        <div class="form-group">

            <label>Consumer type:</label>

            <select name="con_status">
            <option value="A">ACTIVE</option>
            <option value="INA">INACTIVE</option>
            <option value="TER">TERMINATED</option>
            </select>

           </div>
        </select>
        <br>
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button>
        <input type="submit" class="btn btn-success" value="ADD CONSUMER">
      </div>
      </form>
    </div>
  </div>
</div>

<div style="margin-left:9%;padding:1px 16px;height:1000px;">
    <div class="container">
        <h1 class="text-white" position="center">Consumer Lists</h1>
        <br>
        <div class="container-input">
		<form action="search.php" method="POST" class="container">
			<input type="text" name="search" placeholder="Search Database..." class="input">
		</form>
	</div>
<table class = "styled-table">
<tr class = "active-row">
				<th>Name</th> 
                <th>Address</th> 
                <th>Consumer Type</th> 
                <th>Status</th> 
                <th>Account number</th> 
                <th>District</th> 
                <th>Contact Number</th> 
                <th>Previous Reading</th>
                <th>Meter Number</th> 
                <th>Registered Date</th> 
            </tr>
<?php

$sql = mysqli_query($conn, "SELECT * FROM consumer WHERE account_number LIKE '%$search%' 
	OR first_name LIKE '%$search%' 
	OR last_name LIKE '%$search%'
 	OR middle_name LIKE '%$search%'");

$count = mysqli_num_rows($sql);
    if($count > 0)
    {
    while($row = mysqli_fetch_assoc($sql))
        {

            ?>
			<tr>
                    <td><?php echo $row['last_name'], ", ", $row['first_name'], " ", $row['middle_name']  ?></td>
                    <td><?php echo $row['con_address'] ?></td>
                    <td><?php echo $row['consumer_type'] ?></td>
                    <td><?php echo $row['con_status'] ?></td>
                    <td><?php echo $row['account_number'] ?></td>
                    <td><?php echo $row['district'] ?></td>
                    <td><?php echo $row['contact_number'] ?></td>
                    <td><?php echo $row['previous_reading'] ?></td>
                    <td><?php echo $row['meter_number'] ?></td>
                    <td><?php echo $row['register_date'] ?></td>
                    <td>
        
                    <a href = "id.php?id=<?php echo $row['id']?>">
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
			<a href ="delete.php?id=<?php echo $row['id']?>">
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

            <td>
                <a href="#account_number=<?php echo $row['account_number']?>"  data-bs-toggle="modal">
                <button class="buttonv2" style="vertical-align:middle">
                <span>Add</span>
            </button>
            </a>
            <?php include('billing_modal.php');
            ?>
            </td>

            <?php
        }  
    }
    else
    {
        ?>

        <div class="middle-del-con">
        <h3><strong>Consumer not found!</strong></h3>
        </div>

        <?php
    }

?>

</table>

</body>