
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Order History</h1>
			</div>
		</div><!--/.row-->
				
		

<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel Order History</div>
					<div class="panel-body">
						<table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							    	 <th data-field="ID" data-sortable="true" >Nomor</th>
							        <th data-field="lapangan" data-sortable="true" >Lapangan</th>
							        <th data-field="tanggalMain" data-sortable="true">Tanggal Main</th>
							        <th data-field="jamMulai"  data-sortable="true">Jam Mulai</th>
							        <th data-field="jamSelesai" data-sortable="true">Jam Selesai</th>
							        <th data-field="namaPemesan" data-sortable="true">Nama Pemesan</th>
							         <th data-field="noHp" data-sortable="true">noHp</th>
							        
							         <th data-field="action2" data-sortable="true">Update</th>
							    </tr>
						    </thead>
						    <?php foreach ($data as $fb) {
								# code...?>
							<tr>
							    <td><?php echo $fb['id']; ?></td>
								<td><?php echo $fb['lapangan']; ?></td>
								<td><?php echo $fb['tanggalMain']; ?></td>
								<td><?php echo $fb['jamMulai']; ?></td>
								<td><?php echo $fb['jamSelesai']; ?></td>
								<td><?php echo $fb['namaPemesan']; ?></td>
								<td><?php echo $fb['noHp']; ?></td>
								<td align="center">
									<a href="<?php echo base_url()."BookingController/do_delete/".$fb['lapangan']."/".$fb['tanggalMain']."/".$fb['jamMulai']; ?>"><button>Delete</button></a>
									<?php 
										if($fb['status'] == 'Pending')
										{
									?>
											<a href="<?php echo base_url()."BookingController/verifyBooking/".$fb['id']; ?>"><button>Paid</button></a>
											<a href="<?php echo base_url()."BookingController/cancelBooking/".$fb['id']; ?>"><button>Cancel</button></a>
									<?php		
										}
										elseif($fb['status'] == 'Paid')
										{
									?>
										 	<span style="color:green">Paid</span>&nbsp;
										 	<a href="<?php echo base_url()."BookingController/cancelBooking/".$fb['id']; ?>"><button>Cancel</button></a>
									<?php
										}
										elseif($fb['status'] == 'Canceled')
										{
									?>
											<span style="color:red">Canceled</span>
									<?php
										}
									?>
								</td>
								
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
	</div><!--/.main-->