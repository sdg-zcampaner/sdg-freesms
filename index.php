<?php
	include('core/Handler.php');
	
	$handler = new Handler();

	if(isset($_POST['send'])){
		extract($_POST);

		$action  = $handler->sendMessage($msg,$number);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Free SMS Portal | Send text messages for free.</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

	<!-- /recaptcha service -->
	<!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">FREE SMS PORTAL</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<div class="row"> 

			<div class="col-md-offset-1 col-md-10">
			<h2>Send a free sms now !</h2><hr/>
			<?php
				if(isset($_SESSION['flash'])){?>

				<div id="flash" class="alert alert-info"> <?php print $_SESSION['flash'] ?> </div>


			<?php } ?>
			

				<div  class="panel panel-default" >
					<div class="panel-heading">SMS Details</div>
					<div class="panel-body">

						<form action="#" class="form-horizontal" method="post" >

							  <input required="" name="number" type="text" class="form-control" placeholder="Mobile Number e.g +639077527512" aria-describedby="basic-addon1" required/>

								 <Br/><textarea required=""  placeholder="Write your message here..." name="msg" class="form-control" rows="5" cols="40" required/></textarea><br/>
								<!-- <div class="g-recaptcha" data-sitekey="6LfCZEAUAAAAAJjz0R4m1RpDobyNBc35ihL1OwUS"></div>
								<input type="hidden" name="gkey" value="6LfCZEAUAAAAAJjz0R4m1RpDobyNBc35ihL1OwUS" class="g-recaptcha" > -->
								<Br/>
								<input class="btn btn-lg btn-success" type="submit" value="Send Message" name="send">

						</form>

					</div>
				</div>	
			</div>
		</div><!--  /row -->
		<hr/>
		<footer>&copy; <?php print date('Y') ?> Zach Campaner</footer>
	</div><!--  /container -->	
		
	
	<!-- /unset session -->
	<?php unset($_SESSION['flash']) ?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){

			$("#flash").delay(5000).slideUp();
		});

	</script>
</body>
</html>