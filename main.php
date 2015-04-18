<?php
	session_start();
	include("connection.php");
	$query = "SELECT page FROM diary WHERE id='".$_SESSION['id']."' LIMIT 1";
	$result=mysqli_query($link, $query);
	$row=mysqli_fetch_array($result);
	$page = $row['page'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diary</title>
	<link href='http://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <!-- Bootstrap -->
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css"></link>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5.css"></link>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body data-spy="scroll" data-target=".navbar-collapse">
	<nav class="navbar navbar-default">
		<div class="navbar-header pull-left">
				<a class="navbar-brand">Diary</a>
		</div>
		<div class="pull-right">
  			<ul class= "navbar-nav nav">
				<a href="login.php?logout=1" id="logout">Log Out</a>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<textarea class="form-control" rows="25" id="editor"><?php echo $page; ?></textarea>
		</div>
		<p class="result"></p>		
	</div>
	    	
	<script src="js/wysihtml5-0.3.0.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<!--<script src="wysiwyg/prettify.js"></script>-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<!-- wysihtml5 parser rules -->	
	<script src="js/bootstrap-wysihtml5.js"></script>
	<script>
		$('#editor').wysihtml5({
			"color": true,
			"link":false,
			"image":false,
			events: {
                load: function() {
                    var some_wysi = $('#editor').data('wysihtml5').editor;
                    $(some_wysi.composer.element).keyup(function(){ 
						$.post("modifydiary.php",{page:$("#editor").val()}).done(function (){
							var date = new Date();
							$(".result").html("Saved at:"+date.toTimeString().split(' ')[0]);
						});
                    });
                }
            }
		});
		$("button").click(function(){ 
            $.post("modifydiary.php",{page:$("#editor").val()});
        });
	</script>
  </body>
</html>