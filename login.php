<?php
include("handle.php");
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
	<link href="css/login.css" rel="stylesheet">
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container-fluid">
	<h1>Diary</h1>
	<div class="col-md-3"></div>
	<div class="col-md-3 form">	
		<h3>Your own personal diary, with you wherever you go.</h3>
		<p class="lead signnote">Sign up for an account or<span class="login">login</span></p>
		<?php
		if($messg){
		echo "<div class='alert alert-danger alert-dismissible' role=alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<p>".$messg."</p>
			</div>";
		}
		?>
		<form class="signup" method="post">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" name="email" placeholder="Email" data-content="" data-toggle="popover"
				value="<?php echo addslashes($_POST['email']); ?>"/><span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="Password" data-content="" data-toggle="popover" data-placement="left"
				value="<?php echo addslashes($_POST['password']); ?>"/><span class="glyphicon glyphicon-lock form-control-feedback"></span>
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