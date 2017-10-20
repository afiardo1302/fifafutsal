
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Event dan article</h1>
			</div>
		</div><!--/.row-->
				
		

<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Event dan article</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							    	<th data-field="id" data-sortable="true" >id</th>
							    	 <th data-field="judul" data-sortable="true" >Judul</th>
							        <th data-field="waktu" data-sortable="true" >Waktu</th>
							        <th data-field="Deskripsi" data-sortable="true">Deskripsi Main</th>
							     
							        
							        <th data-field="action2" data-sortable="true">Action2</th>
							    </tr>
						    </thead>
						    <?php foreach ($data as $a) {
								# code...?>
							<tr>
								<td><?php echo $a['id']; ?></td>
							    <td><?php echo $a['judul']; ?></td>
								<td><?php echo $a['waktu']; ?></td>
								<td><?php echo $a['deskripsi']; ?></td>
						
								
								<td align="center"><a href="<?php echo base_url()."crud_artikel/do_delete/".$a['id']; ?>"><button>DELETE</button></a></td>
								
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->