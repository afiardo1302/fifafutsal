
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form input artikel</h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<!-- <div class="panel-heading">Form Input Produk</div> -->
						<div class="panel-body">
						<div class="col-md-6">
							<form role="form" method="POST" action="<?php echo base_url()."crud_artikel/create"; ?>"  enctype="multipart/form-data">
							
								
								<div class="form-group">
									<label>Judul Event</label>
									<input class="form-control" placeholder="Judul" name="judul" >
								</div>
								<div class="form-group">
									<label>Waktu</label>
									<input type="date" class="form-control" placeholder="Waktu" name="waktu" value="<?php echo date('Y-m-d'); ?>">
								</div>
								<div class="form-group">
									<label>Deskripsi Event</label>
									<textarea  class="form-control" name="deskripsi" rows="3"></textarea>
								</div>
								
								
								
								
								<!-- <div class="form-group">
									
									<input type="submit" value="SUBMIT" align="center"></input>
								</div>		 -->							
								 
								<button type="submit" class="btn btn-primary">Submit Button</button>
							<!-- 	<button type="reset" class="btn btn-default">Reset Button</button> -->
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->