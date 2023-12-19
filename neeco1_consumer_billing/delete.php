<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("Location: admin.php");
 }
?>

<style>
	body{
		display: flex;
		justify-content: center;
		align-items: center;
	}
  .card {
  overflow: hidden;
  position: flex;
  background-color: #ffffff;
  text-align: left;
  border-radius: 0.5rem;
  max-width: 290px;
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.header {
  padding: 1.25rem 1rem 1rem 1rem;
  background-color: #ffffff;
}

.image {
  display: flex;
  margin-left: auto;
  margin-right: auto;
  background-color: #FEE2E2;
  flex-shrink: 0;
  justify-content: center;
  align-items: center;
  width: 3rem;
  height: 3rem;
  border-radius: 9999px;
}

.image svg {
  color: #DC2626;
  width: 1.5rem;
  height: 1.5rem;
}

.content {
  margin-top: 0.75rem;
  text-align: center;
}

.title {
  color: #111827;
  font-size: 1rem;
  font-weight: 600;
  line-height: 1.5rem;
}

.message {
  margin-top: 0.5rem;
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
}

.actions {
  margin: 0.75rem 1rem;
  background-color: #F9FAFB;
}

.desactivate {
  display: inline-flex;
  padding: 0.5rem 1rem;
  background-color: #DC2626;
  color: #ffffff;
  font-size: 1rem;
  line-height: 1.5rem;
  font-weight: 500;
  justify-content: center;
  width: 100%;
  border-radius: 0.375rem;
  border-width: 1px;
  border-color: transparent;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  cursor: pointer;
}

.cancel {
  display: inline-flex;
  margin-top: 0.75rem;
  padding: 0.5rem 1rem;
  background-color: #ffffff;
  color: #374151;
  font-size: 1rem;
  line-height: 1.5rem;
  font-weight: 500;
  justify-content: center;
  width: 100%;
  border-radius: 0.375rem;
  border: 1px solid #D1D5DB;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
  cursor: pointer;
}
	</style>
<?php
include "include.php";


$id = $_GET['id'];

$select = mysqli_query($conn, "SELECT * FROM consumer WHERE id = '$id'");
		while ($row = mysqli_fetch_array($select))
		{
			$id = $row['id'];
			$account_number = $row['account_number'];
        	$first_name = $row['first_name']; 
        	$last_name = $row['last_name']; 
        	$middle_name = $row['middle_name']; 
        	$con_address = $row['con_address']; 
        	$district = $row['district']; 
        	$contact_number = $row['contact_number']; 
        	$consumer_type = $row['consumer_type']; 
        	$meter_number = $row['meter_number']; 
       		$previous_reading = $row['previous_reading']; 
        	$con_status = $row['con_status'];  
			$registered_by = $row['registered_by'];
		}
?>

<div class="card">
  <div class="header">
    <div class="image"><svg aria-hidden="true" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none">
                <path d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" stroke-linejoin="round" stroke-linecap="round"></path>
              </svg></div>
    <div class="content">
       <span class="title">Delete consumer</span>
       
    </div>
	<form action="deleted.php" method="POST">
     <div class="actions">
	 <input type = "hidden" name = "id" value ="<?php echo $id;?>" />
	 <p class="message">
	<br>
  <tr>
  <th>Account Number: <?php echo $account_number?></th>
  <br>
  <th>Name: <?php echo $first_name, " ", $last_name, " ", $middle_name?></th>
  </br>
  </tr>
	</p>
       <input type="submit" value="Delete" class="desactivate" type="button">
	</div>
	</form>
	<form action="consumer_list.php" method="POST">
		<div class="actions">
       <input type="submit" value="Cancel" class="cancel" type="button">
    </div>
	</form>
  </div>
  </div>