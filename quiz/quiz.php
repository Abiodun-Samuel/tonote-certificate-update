
<?php require_once('../private/initialize.php'); 
$id = $_GET['id'] ?? '';

if (empty($id)) {
	redirect_to(url_for('../quiz/index.php'));
}
$notary = Certificate::find_by_id($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToNote E-cademy Assessment </title>
    <link rel="stylesheet" href="quiz.css">
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <!-- start Quiz button -->
    <div class="" style="padding: 50px 0px 0px 50px">
    	<img src="../img/white-logo.png" width="100">
    	<h3>Welcome <span style="color: white;">
    		<!--Oluwakemi Afolabi-->
    		<?php echo $notary->fullname ?>
    			
    		</span>
    	</h3>
    </div>
    
    <div class="start_btn"><button>Start Assessment</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Assessment guidelines</span></div>
        <div class="info-list">
            <div class="info">1. You will have <span>90 seconds</span> to answer question.</div>
            <div class="info">2. You can not change your anwser once selected.</div>
            <div class="info">3. You will be unable to select an answer after 90 seconds.</div>
            <div class="info">4. You will be unable to leave the assessment once you begin.</div>
            <div class="info">5. You get a point for each correct answer.</div>
			<div class="info">Good luck Notaries!</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">ToNote E-cademy Assessment</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">90</div>
            </div>
            <div class="time_line"></div>
            <div class="wrongAns" style="color: red; text-align: center;"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next Que</button>
        </footer>
    </div>

    <!-- Result Box -->
    <form method="post" id="quiz_form">
    	<input type="hidden" name="id" value="<?php echo $id ?>">
    	<input type="hidden" name="score" id="score">
    	
    	
	    <div class="result_box">
	        <div class="icon">
	            <img src="../img/fav.png" width="100">
	        </div>
	        <div class="complete_text">Assessment completed!</div>
	        <div class="score_text text-center">
	            <!-- Here I've inserted Score Result from JavaScript -->
	        </div>
	        <div class="buttons">
	            <button class="restart" id="retake">Retake Test</button>
	            <button class="quit" id="quit">Quit Test</button>
	            <button id="end" class="end" style="display:none;">Proceed</button>
	        </div>
	        
	    		
	            <!-- <button class="restart" style="display: none;">Retake Test</button> -->
	            <!-- <button class="quit"  style="display: none;">Quit Test</button> -->
	            <!-- <button class="end"   style="display: none;">Submit</button> -->
	        
	    </div>
    </form>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
	<script src="../js/sweet.js"></script>
	<script type="text/javascript">
		
	   function successAlert(msg){
	       Swal.fire({
	         title: msg,
	         type: "success",
	         showCloseButton: !1,
	         focusConfirm: !1,
	         confirmButtonText: '<i class="fa fa-thumbs-up"></i> Ok!',
	         confirmButtonAriaLabel: "Thumbs up, great!",
	         confirmButtonClass: "btn btn-primary",
	         buttonsStyling: !1,
	       });
	   }
	   function successTime(msg){
	     Swal.fire({
	       position: 'bottom-end',
	       type:"success",
	       title:msg,
	       showConfirmButton:!1,
	       timer:1000,
	     })
	   }
	   function errorAlert(msg){
	       Swal.fire({
	         title: msg,
	         type: "error",
	         showCloseButton: !1,
	         timer:1500,
	         showCancelButton: !1,
	         confirmButtonClass: "btn btn-primary",
	         buttonsStyling: !1,
	       });
	   }
	   function errorTime(msg){
	     Swal.fire({
	       position:"center",
	       type:"error",
	       title:msg,
	       showConfirmButton:!1,
	       timer:1500,
	       confirmButtonClass:"btn btn-primary",
	       buttonsStyling:!1
	     })
	   }
	</script>
    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <script src="questions.js"></script>

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="script.js"></script>
    

</body>
</html>
</html>