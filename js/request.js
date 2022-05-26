$(document).ready(function(){
	  $(function () {
		  var $sections = $('.form-section');

		  function navigateTo(index) {
		    // Mark the current section with the class 'current'
		    $sections
		      .removeClass('current')
		      .eq(index)
		        .addClass('current');
		    // Show only the navigation buttons that make sense for the current section:
		    $('.form-navigation .previous').toggle(index > 0);
		    var atTheEnd = index >= $sections.length - 1;
		    $('.form-navigation .next').toggle(!atTheEnd);
		    $('.form-navigation [type=submit]').toggle(atTheEnd);
		  }

		  function curIndex() {
		    // Return the current index by looking at which section has the class 'current'
		    return $sections.index($sections.filter('.current'));
		  }

		  // Previous button is easy, just go back
		  $('.form-navigation .previous').click(function() {
		    var n =  navigateTo(curIndex() - 1);
		    console.log(n)
			// fixStepIndicator(curIndex() - 1)
		  });

		  // Next button goes forward iff current block validates
		  $('.form-navigation .next').click(function(e) {
		  	
		    if ($('.demo-form').parsley().validate('block-' + curIndex())){

			 

        		 e.preventDefault();
		        var formData = new FormData($(this).parents('form')[0]);

		        $.ajax({
		            url: 'inc/process_signup.php',
		            type: 'POST',
		            data: formData,
		            cache: false,
		            contentType: false,
		            processData: false,
		            xhr: function() {
		                var myXhr = $.ajaxSettings.xhr();
		                return myXhr;
		            },
		            dataType: "json",
		            success: function (r) {
		                if (r.success == true) {
		                    successTime(r.msg)
		                    navigateTo(curIndex() + 1);
						  	var n = curIndex();
						  	fixStepIndicator(n)
		                    
		                }else{
		                    errorAlert(r.msg)
		                }
		            }
		            
		        });
		        return false;

			  	
			  	
			} 
		  	
		  });

		  function ajax1(){
		  		var edata = new FormData();

				//Form data
				var form_data = $('#form').serializeArray();
				$.each(form_data, function (key, input) {
				    edata.append(input.name, input.value);
				});

				//File data
				var file_data = $('input[type="file"]')[0].files;
				console.log(file_data);
				for (var i = 0; i < file_data.length; i++) {
				    edata.append("file[]", file_data[i]);
				    // console.log(edata);
				}

				//Custom data
				edata.append('key', 'value');

				console.log(edata)
			  	$.ajax({
		            url: 'inc/process_request.php',
		            method:"POST",
		            processData: false,
   					contentType: false,
		            data: edata,
		            dataType: "json",
		            success: function (r) {
		                if (r.success == true) {
		                    successTime(r.msg)
		                    navigateTo(curIndex() + 1);
						  	var n = curIndex();
						  	fixStepIndicator(n)
		                    
		                }else{
		                    errorAlert(r.msg)
		                }
		            }
		        })
		  }
		  function ajax2(){
		  		var edata = $(".demo-form").serializeArray();
			  	var photo = $('#photo').get(0).files[0] ?? '';
			  	var id_card_image = $('#id_card_image').get(0).files[0] ?? '';
			  	var notary_certificate = $('#notary_certificate').get(0).files[0] ?? '';
			  	// console.log(photo)
			  	edata.push(
	            	{name: 'personal', value: 1},
	            	{name: 'photo', value: photo},
	            	{name: 'id_card_image', value: id_card_image},
	            	{name: 'notary_certificate', value: notary_certificate},
	            );
	            $.ajax({
		            url: 'inc/process_request.php',
		            method:"POST",
		            processData: false,
   					contentType: false,
		            data: edata,
		            dataType: "json",
		            success: function (r) {
		                if (r.success == true) {
		                    successTime(r.msg)
		                    navigateTo(curIndex() + 1);
						  	var n = curIndex();
						  	fixStepIndicator(n)
		                    
		                }else{
		                    errorAlert(r.msg)
		                }
		            }
		        })
		  }
		  var x = '';
		  function fixStepIndicator(n, x) {
			  // This function removes the "active" class of all steps...
			  var i, x = document.getElementsByClassName("step");
			  for (i = 0; i < x.length; i++) {
			    x[i].className = x[i].className.replace(" active", "");
			  }
			  //... and adds the "active" class on the current step:
			  x[n].className += " active";
		  }

		  // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
		  $sections.each(function(index, section) {
		    $(section).find(':input').attr('data-parsley-group', 'block-' + index);
		  });
		  navigateTo(0); // Start at the beginning
	  });

	  // $(document).on("submit", ".demo-form", function(e) {
		 //  	e.preventDefault();
		 //  	var edata = $(this).serializeArray();
		 //  	var photo = $('#photo').val();
		 //  	var id_card_image = $('#id_card_image').val();
		 //  	var notary_certificate = $('#notary_certificate').val();

	  //           edata.push(
	  //           	{name: 'uploadFile', value: 1},
	  //           	{name: 'photo', value: photo},
	  //           	{name: 'id_card_image', value: id_card_image},
	  //           	{name: 'notary_certificate', value: notary_certificate},
	  //           	);
		 //  	$.ajax({
	  //           url: 'inc/process_request.php',
	  //           method:"POST",
	  //           data: edata,
	  //           dataType: "json",
	  //           success: function (data) {
	  //               if (data.success == true) {
	  //                   successTime("Saved successfully")
	  //                   // navigateTo(curIndex() + 1);
			// 		  	// var n = curIndex();
			// 		  	// fixStepIndicator(n)
	                    
	  //               }else{
	  //                   errorAlert("Error not sent")
	  //               }
	  //              // 
	  //           }
	  //       })
	  // })



	});
	