//your javascript goes here
var currentTab = 0;
document.addEventListener("DOMContentLoaded", function (event) {


	showTab(currentTab);

});

function showTab(n) {
	var x = document.getElementsByClassName("tab");
	x[n].style.display = "block";
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
	fixStepIndicator(n)
}

function nextPrev(n) {
	var x = document.getElementsByClassName("tab");
	if (n == 1 && !validateForm()) {
		return false;
	}else{
		x[currentTab].style.display = "none";
		currentTab = currentTab + n;
		if (currentTab >= x.length) {
				// document.getElementById("regForm").submit();
				// return false;
				//alert("sdf");
				document.getElementById("nextprevious").style.display = "none";
				document.getElementById("all-steps").style.display = "none";
				document.getElementById("register").style.display = "none";
				document.getElementById("text-message").style.display = "block";


		}
		showTab(currentTab);
	}
}

// function validate(){
// 	validate({
// 		rules: {
			
// 			email: 'required',
// 			fname: 'required',
// 			lname: 'required',
// 			phone: 'required',
// 			email: {
// 				required: true,
// 				email: true,
// 			},
// 			id_type: 'required',
// 			id_number: 'required',
// 			dob: 'required',
// 			nationality: 'required',	

// 		},
// 		messages: {
// 			fname: 'This field is required',
// 			lname: 'This field is required',
// 			email: 'Enter a valid email',
// 			phone: 'This field is required',
			
// 			id_type: 'Select an ID Type',
// 			id_number: 'Enter your ID Number',
// 			dob: 'Enter your date of birth',
// 			nationality: "Enter your nationality"
// 		},
// 		submitHandler: function (form) {
// 			// form.submit();
// 			alert("Hello")
// 		}
// 	});
// }
function validateForm() {
	var x, y, i, valid = true;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByTagName("input");

     if(y){
     	for (i = 0; i < y.length; i++) {
			if (y[i].value == "") {
				y[i].className += " invalid";
				valid = false;
			}
		}
	} 
	
	if (valid) {
		document.getElementsByClassName("step")[currentTab].className += " finish";
	}
	return valid;
}

function fixStepIndicator(n) {
	var i, x = document.getElementsByClassName("step");
	for (i = 0; i < x.length; i++) {
		x[i].className = x[i].className.replace(" active", "");
	}
	x[n].className += " active";
}
