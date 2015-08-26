<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tr3umPHant Designs - Contact</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">
    
    <!--Buttons CSS-->
    <link href="css/buttons.css" rel="stylesheet">

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
<!--
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>Me</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-8">

                    <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
                </div>
                <div class="col-md-4">

                    <p>Address:
                        <strong>3481 Melrose Place
                            <br>Beverly Hills, CA 90210</strong>
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>-->

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Contact
                        <strong>form</strong>
                    </h2>
<!--MAIL-->
<?php
	$positive = "<center style='color: green;'>Your form has been submitted; I will respond within 24 hours.</center>";
	$negative = "<center style='color: red;'>Whoops! Looks like some fields were left empty; please try again.</center>";
	$error = "<center style='color: red;'>Sorry, the email could not be sent; try again.</center>";
	if(isset($_GET['submit'])){
		$name = $_GET['name'];
		$email = $_GET['email'];
		$phone = $_GET['phone'];
		$message = $_GET['message'];
		$body = "Name: $name \r\n"."E-Mail: $email \r\n"."Phone Number: $phone \r\n"."Message: $message";
		if($name == "" || $email == "" || $phone == "" || $message == ""){
			echo "$negative";
		}
		else{
			if(mail("hopet1@mymail.nku.edu", "Contact", $body)){
				echo "$positive";
			}
			else{
				echo "$error";
			}
		}
	}
?>
<!--END OF MAIL-->
                    <hr>
                    <p style="text-align:center"><span class="glyphicon glyphicon-phone-alt"></span><strong>&nbsp;&nbsp;&nbsp;(937)270-5527</strong></p>
                    <p style="text-align:center"><span class="glyphicon glyphicon-envelope"></span><strong><a href="mailto:name@example.com">&nbsp;&nbsp;&nbsp;hopet1@mymail.nku.edu</a></strong></p>
                    <p style="text-align: center;">If you have any questions, comments, or concerns in regards to my designs, pricing, availability, etc., please free to either call me via phone, e-mail me, or submit a contact form below. If you were not satisfied with your design, please let me know that as well, as I assure you I will continue to produce only the best for you and your brand.</p>
                    <br clear="all">
                    <form role="form" method="GET" enctype="text/plain" action="">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label>Name<span style="color: red;"> *</span></label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Email Address<span style="color: red;"> *</span></label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Phone Number<span style="color: red;"> *</span></label>
                                <input type="tel" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Message<span style="color: red;"> *</span></label>
                                <textarea name="message" id="message" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <center><button type="submit" name="submit" class="btn btn-1" >Submit</button></center>
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
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
