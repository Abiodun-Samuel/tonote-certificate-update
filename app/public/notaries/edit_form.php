<?php require_once('../../../private/initialize.php'); 
$id =  $_POST['id'] ?? 1;
$notary = Notary::find_by_id($id);
?>
	<input type="hidden" name="id" id="user_id" value="<?php echo $notary->id; ?>">
	<div class="row">
		<div class="col-md-6">
            <label for="email">Email</label>
            <input type="email" required value="<?php echo $notary->email ?>" id="email" name="email" class="form-control border-secondary">
        </div>
        <div class="col-md-6">
            <label for="email">Supreme Court No.</label>
            <input type="text" required value="<?php echo $notary->supreme_court_no ?>" id="supreme_court_no" name="supreme_court_no" class="form-control border-secondary">
        </div>
        <div class="col-6 my-2">
            <label for="firstname">Firstname</label>
            <input type="text" required value="<?php echo $notary->firstname ?>" id="firstname" name="firstname" class="form-control border-secondary">
        </div>
        <div class="col-6 my-2">
            <label for="lastname">Lastname</label>
            <input type="text" required value="<?php echo $notary->lastname ?>" id="lastname" name="lastname" class="form-control border-secondary">
        </div>
         <div class="col-md-6 my-2">
            <label for="phone">Phone Number</label>
            <input type="text" required value="<?php echo $notary->phone ?>" id="phone" name="phone" class="form-control border-secondary">
        </div>
        <div class="col-6 my-2">
            <label>Gender</label>
            <select class="form-control  border-secondary" required name="gender">
                <option value="">Select Gender</option>
                <?php foreach (Notary::GENDER as $key => $value) { ?>
                    <option value="<?php echo $value ?>" <?php echo $value == $notary->gender ? 'selected' : "" ?>><?php echo $value ?></option>
                <?php } ?>
                
            </select>
        </div>
        <div class="col-md-12 my-2">
            <label for="business_address">Business Address</label>
            <input type="text" required value="<?php echo $notary->business_address ?>" id="business_address" name="business_address" class="form-control border-secondary">
        </div>
	</div>

<?php ?>
	