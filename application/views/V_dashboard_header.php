<?php
  if($this->session->has_userdata('logged_in')){
  	$group = $this->session->userdata('group');
  	if($group != 2)
  	{
  		redirect(base_url('MyControl/viewLogin'));
  	}
  }
  else
  {
  	redirect(base_url('MyControl/viewLogin'));
  }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fifa - Futsal</title>

<link href="<?php echo base_url(); ?>/assets/admin/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/admin/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/admin/css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>/assets/admin/css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url(); ?>/assets/admin/js/lumino.glyphs.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>FIFA </span>FUTSAL</a>
				<ul class="user-menu">
					
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		
		<ul class="nav menu">
			<li ><a href="<?php echo base_url(); ?>MyControl/viewOrderHistory"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tabel Booking</a></li>
			<li ><a href="<?php echo base_url(); ?>MyControl/viewTabelEvent"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Tabel Event</a></li>
			<li ><a href="<?php echo base_url(); ?>MyControl/viewFormArtikel"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Input Event</a></li>

			<!-- <li><a href="<?php echo base_url(); ?>index.php/myControl/viewFormAddAkun"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms Tambah Admin</a></li> -->
			<li role="presentation" class="divider"></li>
			<li><a href="<?php echo base_url(); ?>MyControl/logout"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Logout</a></li>
		</ul>
		<div class="attribution"><a href="http://www.medialoot.com/item/lumino-admin-bootstrap-template/"></a><br/><a href="http://www.glyphs.co" style="color: #333;"></a></div>
	</div><!--/.sidebar-->