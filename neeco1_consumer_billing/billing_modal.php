<div class="modal fade" id="account_number=<?php echo $row['account_number']?>&id=<?php echo $row['id']?>"  role="dialog" data-keyboard="false">

  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addinvModalLabel">Input Billing Information Here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="add_billing.php" method="POST">
        <?php
        $account_number = $row['account_number'];
        $id = $row['id'];
        $sql1 = mysqli_query($conn, "SELECT account_number, consumer_type, 
        previous_reading, present_reading FROM consumer WHERE account_number = '$account_number' AND id = '$id'");
        $con_row = mysqli_fetch_assoc($sql1);
        $NewDate=Date('Y-m-d', strtotime('+10 days'));
        $billing_month = Date('mY');
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

      <?php
      $consumer_type = $con_row['consumer_type'];

      $sql = mysqli_query($conn, "SELECT con_distribution, supply, metering, transmission, billing_month
      FROM billing_rates WHERE rates_status = 'ONGOING' AND consumer_type = '$consumer_type'");
      $rate_row = mysqli_fetch_assoc($sql);
      ?>

        <input readonly class="form-control" type="text" name = "consumer_type" value="<?php echo $con_row['consumer_type']?>"><br>
        <input readonly class="form-control" type="text" name = "bill_amount" id="bill_amount" placeholder="Bill amount"><br>

        <div style="display:none;">
        <input  type="hidden" id="con_distribution" name = "con_distribution" value="<?php echo $rate_row['con_distribution'];?>"><br>
        <input  type="hidden" id="supply" name = "supply" value="<?php echo $rate_row['supply'];?>"><br>
        <input  type="hidden" id="metering" name = "metering" value="<?php echo $rate_row['metering'];?>"><br>
        <input  type="hidden" id="transmission" name = "transmission" value="<?php echo $rate_row['transmission'];?>"><br>
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Return</button>
        <input type="submit" name="submit" class="btn btn-success" value="ADD TO BILLING">
      </div>
      </form>
    </div>
  </div>
</div>

<script>

    function myFunction()
    {

      let prev_reading = document.getElementById("previous_reading").value;
      let pres_reading = document.getElementById("present_reading").value;
      document.getElementById("kwh_used").value = pres_reading-prev_reading;
      let kwh_used = document.getElementById("kwh_used").value;
   
        let distribution = document.getElementById("con_distribution").value;
        let supply = document.getElementById("supply").value;
        let metering = document.getElementById("metering").value;;
        let transmission = document.getElementById("transmission").value;

        let supplyTotal = kwh_used * supply;
        let distributionTotal = kwh_used * distribution;
        let meteringTotal = kwh_used * metering;
        let transmissionTotal = kwh_used * transmission;
        document.getElementById("bill_amount").value = supplyTotal + distributionTotal + meteringTotal + transmissionTotal;
    }
    
    </script>