<?php require_once('../../../../private/initialize.php'); 
$id =  $_POST['id'] ?? 1;
$agent = Agent::find_by_id($id);

?>
	<input type="hidden" name="id" id="user_id" value="<?php echo $agent->id; ?>">
	<div class="row">
		
        <div class="mb-3 col-6">
            <label for="firstname" class="form-label">Firstname</label>
            <input class="form-control" type="text" id="firstname" required="" readonly value="<?php echo $agent->full_name() ?>" placeholder="Michael">
        </div>
        

         <div class="mb-3 col-lg-6 col-md-6">
            <label for="account_number" class="form-label">Amount</label>
            <input class="form-control" name="discount" type="text" required="" value="<?php //echo $agent-> ?>" id="discount" placeholder="Enter amount to pay">
        </div>

       
	</div>

<?php ?>
	