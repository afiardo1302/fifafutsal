<div class="container">
	<div class="row my-3">
		<div class="col-md-8 p-0">
			<?php
				foreach ($result as $row) {
					$id 		= $row->id;
					$judul 		= $row->judul;
					$judul2 	= str_replace(" ", "-", $judul);
					$timestamp 	= $row->timestamp;
					$waktu 		= $row->waktu;
					$isi 		= $row->isi;
			?>
					<div class="card">
						<div class="card-block px-3">
							<img src="<?php echo base_url('assets/img').$judul2.'-'.$id.'.jpg'; ?>" height="100">
							<br>
							<h2><?php echo $judul; ?></h2>
							<h4><?php echo $timestamp; ?></h4>
							<p><?php echo $isi; ?></p>
						</div>
					</div>
			<?php
				}
			?>
			<div class="card" id="pagination">
				<div class="card-block text-center">
					<br>
					<?php 
						echo $this->pagination->create_links();
					?>
					<br><br>
				</div>
			</div>
		</div>
		<div class="col-md-4 p-0">
			<div class="card">
				<div class="card-block p-3">
					Navigasi:
					<br>
					<ul>
						<li><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>