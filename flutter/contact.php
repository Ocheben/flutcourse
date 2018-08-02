<?php
session_start();
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = $_SESSION["email"];
    $email_subject = "Message from Courses";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_SESSION["name"]) ||
        !isset($_SESSION["email"])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_SESSION["name"]; // required
    $email_from = $_SESSION["email"]; // required
    $comments = $_SESSION["course"]; // required

    if ($comments == "Hist") {
      $url = "https://www.youtube.com/playlist?list=PLF4DFAB80C2018F85";
      $cname = "History Course";
    }

    if ($comments == "Art") {
      $url = "http://www.learner.org/courses/globalart/";
      $cname = "Art Course";
    }

    if ($comments == "Eco") {
      $url = "https://www.youtube.com/playlist?list=PL303D52E352C0B7D9&feature=plcp";
      $cname = "Economics Course";
    }
 
    if ($comments == "film") {
      $url = "https://www.youtube.com/playlist?list=PLbMVogVj5nJQsaj5p_MRYLGhUtmpaEDB0";
      $cname = "Film Course";
    }
 
    if ($comments == "lang") {
      $url = "http://www.openculture.com/2014/01/learn-latin-old-english-sanskrit-classical-greek-other-ancient-languages-in-10-lessons.html";
      $cname = "Ancient Languages Course";
    }
 
    if ($comments == "law") {
      $url = "https://www.youtube.com/playlist?list=PLh9mgdi4rNeyfbeQuCxF2nGCMmCcJPoIU";
      $cname = "Law Course";
    }
 
    if ($comments == "lit") {
      $url = "http://www.openculture.com/modern-poetry-a-free-course-from-yale";
      $cname = "Literature Course";
    }
 
    if ($comments == "phil") {
      $url = "http://www.openculture.com/a-history-of-philosophy-in-81-video-lectures";
      $cname = "Philosophy Course";
    }
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Hello, ".clean_string($first_name)."\n";
    $email_message = "Welcome to".clean_string($cname)."\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Course Name: ".clean_string($cname)."\n";
    $email_message .= "Course Link: ".clean_string($url)."\n";
 
// create email headers
$headers = 'From: OChe < i@ocheben.com >'."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
<html>
	<head>
		<title>Courses</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/aos.css" />
		<link rel="stylesheet" href="../assets/css/style.css" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="is-loading-0 is-loading-1">
		<!-- Wrapper -->
			<div id="wrapper">
					<div class="topnav" id="myTopnav">
							<a href="../index.html" class="active" style="font-weight: 700; font-size:25px">COURSES</a>
							<a href="../index.html" class=opts>About</a>
							<a href="../index.html" class=opts>Courses</a>
							<a href="javascript:void(0);" class="icon" onclick="myFunction()">
							  <i class="fa fa-bars"></i>
							</a>
              </div>
              
              <section id="homea">
                                <header style="position: relative; top: 35%;  margin-top: 0px; color: #fff">
									<h2 style="color:#fff">Welcome</h2>
									<p>You have been Enrolled!<br />
									An email has been sent to you with a link to the course.</p>
								</header>
                                </section>

                                <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/aos.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/index.js"></script>
			<script>
					function myFunction() {
						var x = document.getElementById("myTopnav");
						if (x.className === "topnav") {
							x.className += " responsive";
						} else {
							x.className = "topnav";
						}
					}
          </script>
          </body>
          </html>
          
 
<?php
 

?>