<?php require_once('../../../../private/initialize.php'); 
$id =  $_POST['id'] ?? 1;
$agent = Agent::find_by_id($id);
?>
	<input type="hidden" name="id" id="user_id" value="<?php echo $agent->id; ?>">
	<div class="row">
		
        <div class="mb-3 col-6">
            <label for="firstname" class="form-label">Firstname</label>
            <input class="form-control" name="first_name"  type="text" id="firstname" required="" value="<?php echo $agent->first_name ?>" placeholder="Michael">
        </div>
        <div class="mb-3 col-6">
            <label for="lastname" class="form-label">Lastname</label>
            <input class="form-control"  name="last_name" type="text" id="lastname" required="" value="<?php echo $agent->last_name ?>" placeholder=" Zenaty">
        </div>

        <div class="mb-3 col-12">
            <label for="emailaddress" class="form-label">Email address</label>
            <input class="form-control" name="email" type="email" id="emailaddress" required="" value="<?php echo $agent->email ?>" placeholder="micheal@deo.com">
        </div>

        <div class="mb-3 col-lg-6 col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input class="form-control" name="phone" type="phone" required="" id="phone" value="<?php echo $agent->phone ?>" placeholder="Enter your phone">
        </div>
        <div class="mb-3 col-lg-6 col-md-6">
            <label for="location" class="form-label">Location</label>
            <select class="form-control" name="location"  type="text" id="location" required="">
                <option value="">Select location</option>
                <?php foreach (Agent::LOCATION as $key => $value) { ?>
                    <option value="<?php echo $value ?>" <?php echo $agent->location == $value ? 'selected' : "" ?>><?php echo $value ?></option>
                <?php } ?>
                
            </select>
        </div>

         <div class="mb-3 col-lg-6 col-md-6">
            <label for="account_number" class="form-label">Account Number</label>
            <input class="form-control" name="account_number" type="text" required="" value="<?php echo $agent->account_number ?>" id="account_number" placeholder="Enter your account_number">
        </div>

        <div class="mb-3 col-lg-6 col-md-6">
            <label for="bank_name" class="form-label">Bank Name</label>
            <input class="form-control" name="bank_name" type="text" required="" value="<?php echo $agent->bank_name ?>" id="bank_name" placeholder="Enter your bank_name">
        </div>
	</div>

<?php ?>
	