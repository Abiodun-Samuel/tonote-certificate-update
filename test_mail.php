<?php require_once('private/initialize.php'); ?>
<?php include('header.php'); 
$list = ['Personal Information','Next of Kin Details', 'Membership', 'upload document'];
?>

<style type="text/css">
	/* Style the form */
	#regForm {
	  background-color: #ffffff;
	  margin: 100px auto;
	  padding: 40px;
	  width: 70%;
	  min-width: 300px;
	}
	input {
	  padding: 10px;
	  width: 100%;
	  font-size: 17px;
	  font-family: Raleway;
	  border:1px solid #6c757d;
	}


	/* Mark input boxes that gets an error on validation: */
	input.invalid {
	  border:1px solid red !important;
	}
	select.invalid {
	  border:1px solid red !important;
	}

	/* Hide all steps by default: */
	.tab {
	  display: none;
	}


	/* Mark the steps that are finished and valid: */
	.steps{
      list-style-type: none;
      margin: 0;
      padding: 0;
      background-color: #fff;
      text-align: center;
    }


    .steps li{
      display: inline-block;
      margin: 10px;
      color: #ccc;
      padding-bottom: 5px;
    }
    .step .circle{
    	/*background-color: blue ;*/
    }

    .circle{
        display: inline-block;
        height: 30px; width: 30px;
        border: 2px solid #ccc;
        border-radius:100% ;
    }
    .step.active >.circle{
    	background-color: green;
    }
    .step.active{
      border-bottom: 1px solid darkblue;
      color: darkblue;
    }

	.step.finish {
		border-bottom: 1px solid 04AA6D;
	  color: green;
	  font-weight: bold;
	}
	.text-danger{color: red;}
</style>
<body>
	<form id="regForm" action="">
		<!-- <div class="steps" style="text-align:center;margin-top:40px;">
		  <li class="step active">Personal</li>
		  <li class="step">Identity</li>
		  <li class="step">Memeber</li>
		  <li class="step">Upload</li>
		</div> -->

		<div class="d-flex justify-content-between steps border-bottom">

		  	<?php $sn = 1; for ($i=0; $i < count($list); $i++) { ?>
		  		<li class=" step <?php echo $i == 0 ? "active" : "" ?>">
		        	<div class="text-center">
		        		<span class="circle"><?php echo $sn++; ?></span>
		        	</div>
		        	<div class="step-title"><?php echo $list[$i] ?></div>
		        </li>
		  	<?php } ?>
	  	</div>

<h1>Register:</h1>

	<!-- One "tab" for each step in the form: -->
	<div class="tab">
		<h5 class="">Let's start with your Information</h5>
		<div class="row">
		    <div class="col-md-12">
	            <label for="email">Email</label>
	            <input class="form-control" type="email" required oninput="this.className = 'form-control border-secondary'" id="email" name="personal[email]" class="form-control">
	        </div>
	        <div class="col-6 my-2">
	            <label for="firstname">Firstname</label>
	            <input class="form-control" type="text" required oninput="this.className = 'form-control border-secondary'" id="firstname" name="personal[firstname]" class="form-control">
	        </div>
	        <div class="col-6 my-2">
	            <label for="lastname">Lastname</label>
	            <input class="form-control" type="text" required oninput="this.className = 'form-control border-secondary'" id="lastname" name="personal[lastname]" class="form-control">
	        </div>
	         <div class="col-md-12 my-2">
	            <label for="phone">Phone Number</label>
	            <input class="form-control" type="text" required oninput="this.className = 'form-control border-secondary'" id="phone" name="personal[phone]" class="form-control">
	        </div>
	        
	  <!-- </div>

	  <div class="form-section row">
	  	<div class="col-md-12">
	  		<h5 class="">Personal Information</h5>
			<p>Tell us more ?</p>
	  	</div>
	  	 -->
		<div class="col-6 my-2">
			<label>Date of Birth</label>
			<input type="date" name="personal[dob]" value="<?php echo date("Y-m-d") ?>" required onChange="this.className = 'form-control border-secondary'" class="form-control border-secondary">
		</div>

		<div class="col-6 my-2">
			<label>Gender</label>
			<select class="form-control border-secondary" required onChange="this.className = 'form-control border-secondary'" name="personal[gender]">
				<option value="">Select Gender</option>
				<option selected="" value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>

		<div class="col-md-12 my-2">
			<label for="business_address">Business Address</label>
			<input type="text" required oninput="this.className = 'form-control form-control border-secondary'" name="personal[business_address]" class="form-control border-secondary">
		</div>

		<div class="col-md-12 my-2">
	        <label for="language">languages Spoken</label>
	        <select class="form-control  border-secondary" required onChange="this.className = 'form-control border-secondary'" name="personal[language]" id="language">
	        	<!-- <option value="">Select Language</option> -->
	        	<option value="english">English</option>
	        	<option value="hausa">Hausa</option>
	        	<option value="igbo">Igbo</option>
	        	<option value="youruba">Youruba</option>
	        	<option value="pidgin">Pidgin</option>
	        	<option value="others">others</option>
	        </select>
	    </div>
	    </div>
	</div>

	<div class="tab">Contact Info:
	  <p><input class="form-control" placeholder="E-mail..." oninput="this.className = 'form-control border-secondary'"></p>
	  <p><input class="form-control" placeholder="Phone..." oninput="this.className = 'form-control border-secondary'"></p>
	</div>

	<div class="tab">Birthday:
	  <p><input class="form-control" placeholder="dd" oninput="this.className = 'form-control border-secondary'"></p>
	  <p><input class="form-control" placeholder="mm" oninput="this.className = 'form-control border-secondary'"></p>
	  <p><input class="form-control" placeholder="yyyy" oninput="this.className = 'form-control border-secondary'"></p>
	</div>

	<div class="tab">Login Info:
	  <p><input class="form-control" placeholder="Username..." oninput="this.className = 'form-control border-secondary'"></p>
	  <p><input class="form-control" placeholder="Password..." oninput="this.className = 'form-control border-secondary'"></p>
	</div>

	<div style="overflow:auto;">
	  <div class="d-flex justify-content-between">
	  	<div>
	    	<button type="button" class="btn outline-btn" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
	    </div>
	    <div>
	    	<button type="button" class="btn solid-btn" id="nextBtn" onclick="nextPrev(1)">Next</button>
	    </div>
	  </div>
	</div>

	<!-- Circles which indicates the steps of the form: -->
	

	</form>
<?php include('footer.php') ?>

<script type="text/javascript">
	var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()){
	  	return false;
	  } else{
	  	x[currentTab].style.display = "none";
  	// Hide the current tab:
  	
	  	// if (n > 0) {

	  	// 	var formData = new FormData($(this).parents('form')[0]);

	   //      $.ajax({
	   //          url: 'inc/process_signup.php',
	   //          type: 'POST',
	   //          data: formData,
	   //          cache: false,
	   //          contentType: false,
	   //          processData: false,
	   //          xhr: function() {
	   //              var myXhr = $.ajaxSettings.xhr();
	   //              return myXhr;
	   //          },
	   //          dataType: "json",
	   //          success: function (r) {
	   //              if (r.success == true) {
	   //                  successTime(r.msg)
	   //                  x[currentTab].style.display = "none";
	   //              }else{
	   //                  errorAlert(r.msg)
	   //              }
	   //          }
	            
	   //      });
	   //      return false;
	  	// }

		
	}
  
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("form-control");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      // y[i].className += " invalid";
      y[i].className += " invalid";
     
      // y[i].insertAdjacentHTML('afterend', '<div class="text-danger">This field is required</div>')
      // and set the current valid status to false:
      valid = false;
    }else{

    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>
</html>