
<?php include ('header.php');
$request = $_GET['r'] ?? "";

if ($request == 1) {
	$request_type = "Affidavit of SIM Card Loss";
}
else if($request == 2){
	$request_type = "Affidavit of Name Change";
}else if($request == 3){
	$request_type = "Affidavit of Proof of Ownership";
}else if($request == 4){
	$request_type = "Sworn Declaration of Age";
}else if($request == 5){
	$request_type = "Certified True Copy of Title Deed";
}else if($request == 6){
	$request_type = "Certified True Copy of Utility Bill";
}else if($request == 7){
	$request_type = "Real Estate Transaction Closing";
}else{
	$request_type = "Loan and Mortgage documents";
}
?>

<div class="container">

    <!--hero section start-->
    <section class="hero-section ptb-100">
		<div class="form__container">
		    <div class="title__container">
		        <h1><?php echo $request_type ?? "Title goes here" ?></h1>
		        <p>Follow this simple steps to complete your request</p>
		    </div>
		    <div class="body__container">
		        <div class="left__container">
		            <div class="side__titles">
		                <div class="title__name">
		                    <h3>Your Details</h3>
		                    <p>Fill & press next</p>
		                </div>
		                <div class="title__name">
		                    <h3>More about you</h3>
		                    <p>Fill & press next</p>
		                </div>
		                <div class="title__name">
		                    <h3>Upload</h3>
		                    <p>Upload & press next</p>
		                </div>
		                <!-- <div class="title__name">
		                    <h3>Budget</h3>
		                    <p>Select & press next</p>
		                </div>
		                <div class="title__name">
		                    <h3>Complete</h3>
		                    <p>Finaly press submit</p>
		                </div> -->
		            </div>
		            <div class="progress__bar__container">
		                <ul>
		                    <li class="active step" id="icon1">
		                        <ion-icon name="person-outline"></ion-icon>
		                    </li>
		                    <li class="step" id="icon2">
		                        <ion-icon name="book-outline"></ion-icon>
		                    </li>
		                    <li class="step" id="icon3">
		                        <ion-icon name="layers-outline"></ion-icon>
		                    </li>
		                    <!-- <li id="icon4">
		                        <ion-icon name="pricetag-outline"></ion-icon>
		                    </li>
		                    <li id="icon5">
		                        <ion-icon name="mail-outline"></ion-icon>
		                    </li> -->
		                </ul>
		            </div>
		        </div>
		        <div class="right__container">
		            <form id="form1">
		                <div class="sub__title__container ">
		                    <p>Step 1/5</p>
		                    <h3>Let's start with your details</h3>
		                    <p class="border-bottom">Please fill the details below so that we can we can get in contacat with you about our product</p>
		                    <!-- <input type="" name=""> -->
		                </div>
		                <div class=" row"> 
		                	<div class="col-md-12">
			                	<label for="name">Email</label> 
			                	<input type="text" name="email" class="form-control my-3 border-secondary"> 
			                </div>
			                <div class="col-md-6">
			                	<label for="name">Firstname</label> 
			                	<input type="text" name="fname" class="form-control my-3 border-secondary"> 
			                </div>
			                <div class="col-md-6">
			                	<label for="name">Lastname</label> 
			                	<input type="text" name="lname" class="form-control my-3 border-secondary"> 
			                </div>
			                <div class="col-md-12">
			                	<label for="name">Phone number</label> 
			                	<input type="text" name="phone" class="form-control my-3 border-secondary"> 
			                </div>
			                <div class="col-md-12 clearFix">
			                	<button type="submit" class="btn solid-btn nxt__btn float-right" onclick="nextPrev(1)"> Next</button> 
			           		 </div>
			            </div>
		            </form>
		            <form class="active__form" id="form2">
		                <div class="sub__title__container">
		                    <p>Step 2/5</p>
		                    <h2>What best describes you ?</h2>
		                    <p class="border-bottom">Please let us know what type of business best describes you as entreprenuer or businessman.</p>
		                </div>
		                <div class=" row"> 
			                
			                <div class="col-md-6">
			                	<label for="name">Identification Type </label> 
			                	<p style="font-size: 10px;">Government Issued ID card</p>
			                	<select name="id_type" class="form-control my-3 border-secondary"> 
			                		<option value="" selected>Select ID type</option>
			                		<option value="1" >National ID Card</option>
			                		<option value="2" >Voters card</option>
			                		<option value="3" >Drivers lincense</option>
			                		<option value="4" >Passport</option>
			                	</select>
			                </div>
			                <div class="col-md-6">
			                	<label for="name">Identification Number </label> 
			                	<p style="font-size: 10px;">for preferred mode of identification</p>
			                	<input type="text" name="id_number" class="form-control my-3 border-secondary" placeholder="123456789">
			                </div>
			                <div class="col-md-6">
			                	<label for="name">Date of Birth</label> 
			                	<input type="date" name="dob" class="form-control my-3 border-secondary"> 
			                </div>
			                <div class="col-md-6">
			                	<label for="name">Nationality</label> 

			                	<input type="text" name="nationality" class="form-control my-3 border-secondary"> 
			                </div>
			                
			                <div class="col-md-12 d-flex justify-content-between">
			                	<button type="button" class="prev__btn outline-btn" onclick="prevForm();">Back</button> 
		                    	<button type="submit" class="btn solid-btn nxt__btn" onclick="nextPrev(2)">Next</button> 
		                    </div> 
			           		 </div>
			            </div>
		               <!--  <div class="input__container">
		                    <div class="selection newB">
		                        <div class="imoji">
		                            <ion-icon name="happy"></ion-icon>
		                        </div>
		                        <div class="descriptionTitle">
		                            <h3>New Business</h3>
		                            <p>Started trading in last 12 months</p>
		                        </div>
		                    </div>
		                    <div class="selection exitB">
		                        <div class="imoji">
		                            <ion-icon name="business"></ion-icon>
		                        </div>
		                        <div class="descriptionTitle">
		                            <h3>Existing Business</h3>
		                            <p>Have been operating beyond 12 months</p>
		                        </div>
		                    </div>
		                    <div class="buttons"> 
		                    <button type="button" class="prev__btn outline-btn" onclick="prevForm();">Back</button> 
		                    <button type="submit" class="btn solid-btn nxt__btn">Next</button> </div>
		                </div> -->
		            </form>
		            <form class="active__form" id="form3">
		                <div class="sub__title__container">
		                    <p>Step 3/5</p>
		                    <h2>What service are looking for ?</h2>
		                    <p class="border-bottom">Please let us know what type of business best describes you as entreprenuer or businessman.</p>
		                </div>
		                <div class="input__container">
		                    <div class="selection newB">
		                        <div class="imoji">
		                            <ion-icon name="desktop"></ion-icon>
		                        </div>
		                        <div class="descriptionTitle">
		                            <h3>Website Development</h3>
		                            <p>Development of online websites</p>
		                        </div>
		                    </div>
		                    <div class="selection exitB">
		                        <div class="imoji">
		                            <ion-icon name="phone-portrait"></ion-icon>
		                        </div>
		                        <div class="descriptionTitle">
		                            <h3>Development of Mobile App</h3>
		                            <p>Development of android and IOS mobile app</p>
		                        </div>
		                    </div>
		                    <div class="buttons"> 
		                    <button type="button" class="prev__btn outline-btn" onclick="prevForm();">Back</button> 
		                    <button type="submit" class="btn solid-btn nxt__btn">Next</button> 
		                	</div>
		                </div>
		            </form>
		            <form class="active__form" id="form4">
		                <div class="sub__title__container">
		                    <p>Step 4/5</p>
		                    <h2>Please select your budget</h2>
		                    <p>Please let us know budget for your project so yes are great that we can give the right quote thanks</p>
		                </div>
		                <div class="input__container"> <input type="range" min="10000" max="500000" value="250000" class="slider">
		                    <div class="output__value"> </div>
		                    <div class="buttons"> <a class="prev__btn outline-btn" onclick="prevForm();">Back</a> 
		                    <button type="submit" class="btn solid-btn nxt__btn">Next</button> 
		                </div>
		                </div>
		            </form>
		            <form class="active__form" id="form5">
		                <div class="sub__title__container">
		                    <p>Step 5/5</p>
		                    <h2>Complete Submission</h2>
		                    <p>Thanks for completing the form and for your time.Plss enter your email below and submit the form</p>
		                </div>
		                <div class="input__container"> <label for="Email">Enter your email</label> <input type="text">
		                    <div class="buttons"> 
		                    	<a class="prev__btn outline-btn" onclick="prevForm();">Back</a> 
		                    	<button type="submit" class="btn solid-btn nxt__btn" id="submitBtn">Next</button> 
		                    </div>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>
	</section>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<!-- <script type="text/javascript">
	$(document).ready(function() {

	   
	});
	</script> -->
	
	<script type="text/javascript" src="js/request_form.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<!-- <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
</body>
</html>