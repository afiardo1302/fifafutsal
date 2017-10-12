<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/login.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/login.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/fb1.js"></script>

<title>Login</title>
<style type="text/css">
table{
	position: absolute;
	height: 100px;
	top: 50%;
	left: 50%;
	margin: -100px 0 0 -150px;
}
</style>
</head>
<body>
	 <div class="row">
        

	            <div class="col-sm-4" style="#">
	           
	            </div>
		   		<div class="col-sm-4" style="#">
					 <div class="imgcontainer">
					       <H2><!-- <img src="<?php echo base_url(); ?>/assets/img/logom.png" alt="Avatar" class="avatar" width="50" height="50"> -->Form Login</H2>  
						    
		     		</div>	
		 		</div>
		 		<div class="col-sm-4" style="#">
	           
	            </div>
	</div>	
	<form method="post" id="myNavbar" action="<?php echo base_url().'myControl/login'?>">
		
		<table>
					     
			<div class="login-page" method="post" id="myNavbar" action="<?php echo base_url().'myControl/login'?>">
				  <div class="form">
				  
				    <form class="login-form">
				      <input type="text" placeholder="username" name="username" />
				      <input type="password" placeholder="password" name="pass" />
				      <button type="submit">login</button>
				      <!-- <p class="message">Not registered? <a href="#">Create an account</a></p>
 -->				    </form>
				  </div>
			</div>
				<!-- <td colspan="2"><?php echo $err_message;?></td>  -->
			</tr>
		</table>
	</form>
</body>
</html>