<?php
if($_POST["signup"]){
	if($_POST["email"]){
		$email = $_POST["email"];
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$emailError ='wrong';
		}
	} else {
		$emailError ='missing';
	}
	if($_POST["password"]){
		$password = $_POST["password"];
		if(strlen($password) < 8 AND !preg_match('/[A-Z]/', $password)){
		$passwordError ='wrong';
		}
	} else {
		$passwordError ='missing';
	} 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diary</title>
	<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style>
  body{
  background-color: #f0edeb;
background-image: url(http://www.transparenttextures.com/patterns/tileable-wood-colored.png);
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */
	
  }
  .container-fluid{
  //background-color: #59912b;
//background-image: url(http://www.transparenttextures.com/patterns/football-no-lines.png);
//background-color: #040105;

//background-position:center;
/* This is mostly intended for prototyping; please download the pattern and re-host for production environments. Thank you! */

  }
  .form{
	margin-top:40px;
	margin-bottom:80px;
  }
  
  .enter{
  margin-top:20px;
  border-radius:0px;
  height:40px;
  font-family: 'Poiret One', cursive;
  font-size:1.4em;
  }
  .form-group{
  margin:0px;
  }
  input[type=text]{
  background:transparent;
  height:40px;
  border-radius:0px;
  border-top:1px solid black;
  border-right:1px solid black;
  border-left:1px solid black;
  }
  input[type=password]{
  background:transparent;
  height:40px;
  border-radius:0px;
  border:1px solid black;
  }
  h1{
  font-family: 'Poiret One', cursive;
  //color:#FAF0E6;
  color:#000;
  text-align:center;
  font-weight:bold;
  }
  h3{
  margin-bottom:40px;
text-align:center;
font-family: 'Gloria Hallelujah', cursive;
font-family: 'Poiret One', cursive;
//color:#FAF0E6;
color:#000;
font-weight:bold;
}
  .signnote{
text-align:center;
font-family: 'Gloria Hallelujah', cursive;
font-family: 'Poiret One', cursive;
color:#5cb85c;
font-weight:bold;
}
  .login{
font-family: 'Poiret One', cursive;
color:#ec971f;
font-weight:bold;
padding-left:6px;
padding-right:6px;	
}
  .css-typing{
	position:absolute;
	top:380px;
	left:300px;
    width:25em;
    white-space:nowrap;
    overflow:hidden;
    -webkit-animation: type 5s steps(50, end);
    animation: type 5s steps(50, end);
   }
@keyframes type{
    from { width: 0; }
}

@-webkit-keyframes type{
    from { width: 0; }
}
img{
height:100px;
}
/**.glyphicon{
color:white;
font-size:20px;
padding-left:80px;
}*/
.glyphicon-envelope, .glyphicon-lock{
color:black;
font-size:20px;
padding:2px;
}
/**.btn-danger,.btn-success{
width:49%;
}*/
.letter {
  background: #fff;
  font-family: 'Gloria Hallelujah', cursive;
  color:#5b2d2f;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  margin: 26px auto 0;
  max-width: 550px;
  min-height: 300px;
  padding: 24px;
  position: relative;
  width: 80%;
  z-index:3000;
}
.letter p{
text-align:center;
}
.letter:before, .letter:after {
  content: "";
  height: 98%;
  position: absolute;
  width: 100%;
  z-index:-1;
}
.letter:before {
  background: #fafafa;
  box-shadow: 0 0 8px rgba(0,0,0,0.2);
  left: -5px;
  top: 4px;
  transform: rotate(-2.5deg);
}
.letter:after {
  background: #f6f6f6;
  box-shadow: 0 0 3px rgba(0,0,0,0.2);
  right: -3px;
  top: 1px;
  transform: rotate(1.4deg);
}
.popover{
    width:200px;  
	font-family: 'Verdana', Sans-serif;
	 display: inline-block;  
	color:eb4d30;
}
  </style>
  <body>
	<div class="container-fluid">
	<h1>Diary</h1>
	<div class="col-md-3"></div>
	<div class="col-md-3 form">	
		<h3>Your own personal diary, with you wherever you go.</h3>
		<p class="lead signnote">Sign up for an account or<span class="login">login</span></p>
		<form class="signup" method="post" action="validate.php">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="email" placeholder="Email" data-content="" data-toggle="popover"
				/><span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" data-content="" data-toggle="popover"
				/><span class="glyphicon glyphicon-lock form-control-feedback"></span>
				<!--<p class="text-center small">Must be at least 8 characters including at least one upper case letter</p>-->
			</div>
			<div class="form-group">
				<input type="submit" class="btn btn-warning enter col-md-6 col-xs-6" value="Login" name="login" id="login"/>
				<input type="submit" class="btn btn-success enter col-md-6 col-xs-6" value="Signup" name="signup" id="signup"/>
			</div>
		</form>
	</div>	
	<div class="col-md-2"></div>
	<div class="col-md-4">	
		<div class="letter">
			<p class="lead">January 17th, 2015</p>
			<p>And now I wander in the woods</p>
			<p>When summer gluts the golden bees,</p>
			<p>Or in autumnal solitudes</p>
			<p>Arise the leopard-coloured trees;
			<p>Or when along the wintry strands</p>
			<p>The cormorants shiver on their rocks;</p>
			<p>I wander on, and wave my hands,</p>
			<p>And sing, and shake my heavy locks.
			<p>The gray wolf knows me; by one ear</p>
			<p>I lead along the woodland deer;</p>
			<p>The hares run by me growing bold.</p>
		</div>
	</div>	
	</div>
		
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script>
	var emailError = "<?php echo $emailError; ?>";
	var passwordError = "<?php echo $passwordError; ?>";
	
	$("#signup").submit(function(e){         
	//	e.preventDefault();
	console.log("form submitted");
	});
	
	if(emailError=='missing'){
		emailError = "Email address is required";
	}
	if(emailError=='wrong'){
		emailError = "Invalid email address";
	}
	if(passwordError=='missing'){
		passwordError = "Password is required";
	}
	if(passwordError=='wrong'){
		passwordError = "Password must be at least 8 characters including at least one capital letter";
	}
	console.log("passwordError"+passwordError);
	console.log("emailError"+emailError);
	if(passwordError!="" || emailError!=""){
		$('[name="email"]').popover({
		content:emailError,
		placement:'top'
		})
		$('[name="password"]').popover({
		content:passwordError,
		placement:'right'
		});
	}
	$('[data-toggle="popover"]').popover('show');
	
	</script>
  </body>
</html>