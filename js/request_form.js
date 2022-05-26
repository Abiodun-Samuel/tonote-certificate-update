const nxtBtn = document.querySelector('#submitBtn');
const form1 = document.querySelector('#form1');
const form2 = document.querySelector('#form2');
const form3 = document.querySelector('#form3');
const form4 = document.querySelector('#form4');
const form5 = document.querySelector('#form5');


const icon1 = document.querySelector('#icon1');
const icon2 = document.querySelector('#icon2');
const icon3 = document.querySelector('#icon3');
const icon4 = document.querySelector('#icon4');
const icon5 = document.querySelector('#icon5');


var viewId = 1;

function nextForm() {


	// var empty = true;
	// $('input[type="text"]').each(function() {
	//    if ($(this).val() != "") {
	//         viewId=viewId+1;
	// 		progressBar();
	// 		displayForms();
	//    }else{
	//    	  alert("Error")
	//    }
	// });

}
// $(document).on("submit", "#form1" function (e) {
// 	e.preventDefault();

// })
$('form[id="form1"]').validate({
	rules: {
		email: 'required',
		fname: 'required',
		lname: 'required',
		phone: 'required',
		email: {
			required: true,
			email: true,
		},
		// psword: {
		//   required: true,
		//   minlength: 8,
		// }
	},
	messages: {
		fname: 'This field is required',
		lname: 'This field is required',
		email: 'Enter a valid email',
		phone: 'This field is required',
		// psword: {
		//   minlength: 'Password must be at least 8 characters long'
		// }
	},
	submitHandler: function (form) {
		// form.submit();
		viewId = viewId + 1;
		progressBar();
		displayForms();
	}
});
$('form[id="form2"]').validate({
	rules: {
		id_type: 'required',
		id_number: 'required',
		dob: 'required',
		nationality: 'required',

	},
	messages: {
		id_type: 'Select an ID Type',
		id_number: 'Enter your ID Number',
		dob: 'Enter your date of birth',
		nationality: "Enter your nationality"
	},
	submitHandler: function (form) {
		// form.submit();
		viewId = viewId + 1;
		progressBar1();
		displayForms();
	}
});

function prevForm() {
	console.log("helloprev");
	viewId = viewId - 1;
	console.log(viewId);
	progressBar1();
	displayForms();
}

function progressBar1() {
	if (viewId === 1) {
		icon2.classList.add('active');
		icon2.classList.remove('active');
		icon3.classList.remove('active');
		// icon4.classList.remove('active');
		// icon5.classList.remove('active');
	}
	if (viewId === 2) {
		icon2.classList.add('active');
		icon3.classList.remove('active');
		icon4.classList.remove('active');
		icon5.classList.remove('active');
	}
	// if (viewId === 3) {
	// 	icon3.classList.add('active');
	// 	icon4.classList.remove('active');
	// 	icon5.classList.remove('active');
	// }
	// if (viewId === 4) {
	// 	icon4.classList.add('active');
	// 	icon5.classList.remove('active');
	// }
	if (viewId === 3) {
		// icon2.classList.remove('active');
		icon3.classList.add('active');
		nxtBtn.innerHTML = "Submit"
	}
	if (viewId > 3) {
		icon2.classList.remove('active');
		icon3.classList.remove('active');
		// icon4.classList.remove('active');
		// icon5.classList.remove('active');

	}
}

function progressBar() {
	if (viewId === 2) {
		icon2.classList.add('active');
	}
	// if (viewId === 3) {
	// 	icon3.classList.add('active');
	// }
	// if (viewId === 4) {
	// 	icon4.classList.add('active');
	// }
	if (viewId === 3) {
		icon5.classList.add('active');
		nxtBtn.innerHTML = "Submit"
	}
	if (viewId > 3) {
		icon2.classList.remove('active');
		icon3.classList.remove('active');
		icon4.classList.remove('active');
		icon5.classList.remove('active');

	}
}

function displayForms() {

	if (viewId > 3) {
		viewId = 1;
	}

	if (viewId === 1) {
		form1.style.display = 'block';
		form2.style.display = 'none';
		form3.style.display = 'none';
		// form4.style.display = 'none';
		// form5.style.display = 'none';


	} else if (viewId === 2) {
		form1.style.display = 'none';
		form2.style.display = 'block';
		form3.style.display = 'none';
		// form4.style.display = 'none';
		// form5.style.display = 'none';

	} else if (viewId === 3) {
		form1.style.display = 'none';
		form2.style.display = 'none';
		form3.style.display = 'block';
		// form4.style.display = 'none';
		// form5.style.display = 'none';
	} 

	// else if (viewId === 4) {
	// 	form1.style.display = 'none';
	// 	form2.style.display = 'none';
	// 	form3.style.display = 'none';
	// 	form4.style.display = 'block';
	// 	form5.style.display = 'none';

	// } else if (viewId === 5) {
	// 	form1.style.display = 'none';
	// 	form2.style.display = 'none';
	// 	form3.style.display = 'none';
	// 	form4.style.display = 'none';
	// 	form5.style.display = 'block';

	// }
}

// for slider

var slider = document.querySelector(".slider");
var output = document.querySelector(".output__value");
output.innerHTML = slider.value;

slider.oninput = function () {
	output.innerHTML = this.value;


}
