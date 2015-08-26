<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tr3umPHant Designs - Requests</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    
    <!--Buttons CSS-->
    <link href="css/buttons.css" rel="stylesheet">
       
    <script src="js/jquery-1.11.1.min.js"></script>

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div class="brand">Tr3umPHant Designs</div>
    <div class="address-bar">Graphic design has never been easier</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Tr3umPHant Designs</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home <span class="glyphicon glyphicon-home"></a>
                    </li>
                    <li>
                        <a href="about.html">About <span class="glyphicon glyphicon-user"></a>
                    </li>
					  <li>
                        <a href="graphicwork.html">Graphic Work <span class="glyphicon glyphicon-picture"></a>
                    </li>
                    <li>
                        <a href="requests.php">Requests <span class="glyphicon glyphicon-shopping-cart"></a>
                    </li>
                    <li>
                        <a href="contact.php">Contact <span class="glyphicon glyphicon-earphone"></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Request <strong>Form</strong>
                    </h2>
<?php
	//Positive message to be printed when form was successfully sent.
	$positive = "<center style='color: green;'>Your form has been submitted; I will respond within 24 hours.</center>";
	//Negative message to be printed when form is left empty.
	$negative = "<center style='color: red;'>Whoops! Looks like some fields were left empty; please try again.</center>";
	//Error message to be printed when the email could not be sent.
	$error = "<center style='color: red;'>Sorry, the email could not be sent; try again.</center>";
	
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$design = $_POST['design'];
	$date = $_POST['date'];
	$extraCharge = $_POST['extraCharge'];
	$description = $_POST['description'];
	$body = "Name: $name \r\n"."E-Mail: $email \r\n"."Phone Number: $phone \r\n"."Design Needed: $design \r\n".
				 "Date Needed: $date \r\n"."Extra Charge: $extraCharge\r\n"."Description of Design: $description \r\n\r\n";
	$to = "hopet1@mymail.nku.edu";
	$from = $email;
	$subject = $design;
				 
	if(($_POST['nameOfFile']) != ""){
		$uploaddir = 'uploads/';
		$uploadfile = $uploaddir . basename($_FILES['uploadedFile']['name']);
		
		//If image could not be moved to server...
		if (!move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadfile)) {
  			echo "<center>Image could not be uploaded, try again please.</center>\n";
		} 
		
		//Name of file in directory.
		$fileName = $uploadfile;
	
		//Header for email.
		$headers = "From: $from"; 
		
		//Boundary 
		$semi_rand = md5(time()); 
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
		
		//Header for email, part II
		$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
		
		
		//Message text.
		$contents = $body; 

		//Multipart boundary
		$message .= "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" .
    	 "Content-Transfer-Encoding: 7bit\n\n" . $contents. "\n\n"; 

		//Preparing attachments   
		$message .= "--{$mime_boundary}\n";         
       $file = fopen($fileName,"rb");
       $data = fread($file,filesize($fileName));
       fclose($file);
		$data = chunk_split(base64_encode($data));
			
       $message .= "Content-Type: application/octet-stream; name=\"".basename($fileName)."\"\n" .
    	"Content-Description: ".basename($fileName)."\n" . "Content-Disposition: attachment;\n" . " filename=\"".basename($fileName)."\"; size=".filesize($fileName).";\n"."Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
       $message .= "--{$mime_boundary}--";

		//If form is empty...
		if($name == "" || $email == "" || $phone == "" || $date == "" || $description == ""){
			echo "$negative";
		}
		else{          
			if(@mail($to, $subject, $message, $headers)){
				echo $positive; 
			}else{
				echo "<center>Failure</center>";
			}
		}
	}
	else{
		if($name == "" || $email == "" || $phone == "" || $date == "" || $description == ""){
			echo "$negative";
		}
		else{          
			if(@mail($to, $subject, $body, $headers)){
				echo $positive; 
			}else{
				echo "<center>Failure</center>";
			}
		}
	}
}
?>
                    <hr>
                    <p style="text-align: center">If you are looking for a graphic designer for branding purposes, promotional events, or just a simple illustration, look no further! Tr3umPHant Designs has got you covered. Just fill out the short request form below and I will get back with you within 24 hours on the next steps for completeing your dream design! (Method of payment will be discussed once design is complete.)</p>
                    <br clear="all">
                    <form role="form" method="POST" enctype="multipart/form-data" action="">
                        <div class="row">
                        
                        		<!--NAME-->
                            <div class="form-group col-lg-4">
                                <label>Name<span style="color: red;"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            
                            <!--EMAIL-->
                            <div class="form-group col-lg-4">
                                <label>Email Address<span style="color: red;"> *</span></label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            
                            <!--PHONE NUMBER-->
                            <div class="form-group col-lg-4">
                                <label>Phone Number<span style="color: red;"> *</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control">
                            </div>
                            
                            <!--TYPE OF DESIGN-->
                            <div class="form-group col-lg-4">
                                <label>Design<span style="color: red;"> *</span></label>
                                <select name="design" id="design" class="form-control">
                                		<option value="Illustration">Illustration ($30.00)</option>
                                		<option value="Flyer">Flyer ($25.00)</option>
                                    <option value="Logo">Logo ($20.00)</option>
                                </select>
                            </div>
                            
                            <!--DATE DESIGN IS NEEDED-->
                			   <div class="form-group col-lg-4">
                					<label>Date Needed<span style="color: red;"> *</span></label><br>
                						<div class="input-group date form_date"  data-date-format="dd MM yyyy" data-link-field="dtp_input1">        
                                    <input type="hidden" name="extraCharge" id="extraCharge">                    
                    					<input name="date" id="date" class="form-control" type="text" value="" readonly>
                    					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                						</div>
                             <input type="hidden" id="dtp_input1" value="" /><br/>
                				</div>
                                
                                

                            
                            <!--FILE UPLOAD-->
                            <div class="form-group col-lg-4">
                            		<label>Image Upload</label><br>
<div class="input-group">
<input type="text" class="form-control" name="nameOfFile" id="nameOfFile" readonly>
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        <span class="glyphicon glyphicon-folder-open"></span><input type="file" name="uploadedFile" id="uploadedFile" style="
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	min-width: 100%;
	min-height: 100%;
	font-size: 100px;
	text-align: right;
	filter: alpha(opacity=0);
	opacity: 0;
	background: red;
	cursor: inherit;
	display: block;"multiple>
                    </span>
                </span>
            </div>        
                            </div>
<script>
//Function to display current file in text box.
$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
  input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
        
    });
});
</script>
                            
                            <div class="clearfix"></div>
  
  							   <!--DESCRIPTION OF DESIGN-->
                            <div class="form-group col-lg-12">
                                <label>Description of Design<span style="color: red;"> *</span></label>
                                <textarea name="description" id="description" class="form-control" rows="6"></textarea>
                            </div>
         
                            <!--SUBMIT BUTTON-->
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <center><button type="submit" name="submit" class="btn btn-1">Submit</button></center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Copyright &copy; Tr3umPHant Designs 2014</h4>
                    <!--Instagram-->
                    <a href="http://instagram.com/travisty92"><img id="iconLogos" src="img/instagram.png" width="40" height="40"></a>	  <!--Twitter-->
                    <a href="https://twitter.com/Travisty92"><img id="iconLogos" src="img/twitter.png" width="40" height="40"></a>     <!--Facebook-->
                    <a href="https://www.facebook.com/trey.a.hope"><img id="iconLogos" src="img/facebook.png" width="40" height="40"></a><!--LinkedIn-->
                    <a href="https://www.linkedin.com/profile/view?id=263733526&trk=nav_responsive_tab_profile_pic"><img id="iconLogos" src="img/linkedin.png" width="40" height="40"></a>
                    <!--Google+-->
					  <a href="https://plus.google.com/106561395830281331769/posts"><img id="iconLogos" src="img/google+.png" width="40" height="40"></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="less/datepicker.less"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
<script type="text/javascript" src="js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="js/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript">
 	$('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
    });

	$('.form_date').datetimepicker().on('changeDate', function(){
		var selectedDate = $('#date').val();
		
		//Set 2 day limit for price increase.
		var limit = new Date();
		limit.setDate(limit.getDate() + 2);
		
		//Must selected future date.
		if(new Date(selectedDate).getTime() < new Date().getTime()){
			alert ("Selected date must be in the future.");
			$('#date').val("");
		}
		//Price goes up if requesting within 2 days.
		else if(new Date(selectedDate).getTime() < limit.getTime()){
			alert ("FYI: Designs requested within 2 days will be $15.00 extra.");
			$('#extraCharge').val("True");
		}
		else{
			$('#extraCharge').val("False");
		}
	});
</script>

</body>

</html>
