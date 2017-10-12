<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_artikel extends CI_Controller {
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_artikel');

    }
	 function index(){
	 	$this->load->helper('url');
		$data = $this->mod_artikel->getArtikel();
		$this->load->view('V_form_artikel',array('data' => $data));
	}
	function indexAdmin(){
		$this->load->helper('url');
		$data = $this->mod_artikel->getArtikel();
		$this->load->view('admin_tabel2',array('data' => $data));
		

	}
	public function do_insert(){
			// $config['upload_path']          = './uploads/';
   //          $config['allowed_types']        = 'jpg|png';
   //          $this->load->library('upload', $config);
            
            // $data = $this->upload->data();
     			
     			$judul 	= $_POST['judul'];
				$waktu	= $_POST['waktu'];
				// $isi	= $_POST['harga_produk'];
				$isi	 	= $_POST['deskripsi'];
				 $data = array(
						'judul'   => $this->input->post('judul'),
						'waktu' 	=> $this->input->post('waktu'),
						'deskripsi' 	=> $this->input->post('deskripsi')
						);
					$this->mod_artikel->InsertData('article',$data);
					redirect('myControl/viewFormArtikel');
				// $fileProduk 	= $data['file_name'];                
                   
    //         if (!$this->upload->do_upload('fileProduk'))
    //             {
    //                 $error = array('error' => $this->upload->display_errors());
    //                 print_r($error);
                    
    //             }
    //         else
     //            {
                   
     //                $data = $this->upload->data();
     //                $fileProduk = $data['file_name'];
     //                $data = array(
					// 	'kode_produk'   => $this->input->post('kode_produk'),
					// 	'nama_produk' 	=> $this->input->post('nama_produk'),
					// 	'harga_produk' 	=> $this->input->post('harga_produk'),
					// 	'deskripsi' 	=> $this->input->post('deskripsi'),
					// 	'img_produk'	=> $fileProduk
					// 	);
					// $this->mod_produk->InsertData('produk',$data);
					// redirect('myControl/viewFormArtikel');
					// echo '<script language="javascript">';
					// echo 'alert("Produk telah ditambahkan");';
					// echo 'window.history.go(-1);';
					// echo '</script>';                  
     //            }
	}

	  public function create() {

		    $this->form_validation->set_rules('judul', 'Judul');
		    $this->form_validation->set_rules('waktu', 'Waktu', 'required');
		    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		    if($this->form_validation->run() == FALSE) {
		       redirect('myControl/viewFormArtikel');
					echo '<script language="javascript">';
					echo 'alert("GAGAL Ditambah");';
					echo 'window.history.go(-1);';
					echo '</script>';  
		    } else {
					 $data = array(
						'judul'         => $this->input->post('judul'),
						'waktu' 	=> $this->input->post('waktu'),
						'deskripsi' 	=> $this->input->post('deskripsi')
						);
					$this->mod_artikel->InsertData('article',$data);
					redirect('myControl/viewFormArtikel');
    }
  }

	public function updateProduk(){
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
            
        if(isset($_FILES['fileProduk']) && $_FILES['fileProduk']['size'] > 0){
        	if (!$this->upload->do_upload('fileProduk')){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                    //$this->load->view('upload_form', $error);
            }
        	else{
                //$this->load->view('upload_success', $data);
                //echo "berhasil";
                $data = $this->upload->data();
                
               	$kode_produk 	= $_POST['kode_produk'];
				$nama_produk	= $_POST['nama_produk'];
				$harga_produk	= $_POST['harga_produk'];
				$deskripsi	 	= $_POST['deskripsi'];
				$fileProduk 	= $data['file_name'];
				// $foto 			= $fileName;
		
				$data 	= array(
					'kode_produk' 	=> $kode_produk,
					'nama_produk' 	=> $nama_produk,
					'harga_produk'	=> $harga_produk,
					'deskripsi'		=> $deskripsi,
					'img_produk' 	=> $fileProduk,
				);
				$where = array('kode_produk' => $kode_produk);
				$res = $this->mod_produk->updateData('produk',$data,$where);
				if($res>=1){
					//print_r($res)
					redirect('index.php/Crud_produk/indexAdmin');
				}                   
		            }

        }
        else{
        		$data = $this->upload->data();
                $kode_produk 	= $_POST['kode_produk'];
				$nama_produk	= $_POST['nama_produk'];
				$harga_produk	= $_POST['harga_produk'];
				$deskripsi	 	= $_POST['deskripsi'];
				$fileProduk 	= $data['file_name'];
						
				$data 	= array(
					'kode_produk' 	=> $kode_produk,
					'nama_produk' 	=> $nama_produk,
					'harga_produk'	=> $harga_produk,
					'deskripsi'		=> $deskripsi,
							
				);
				$where = array('kode_produk' => $kode_produk);
				$res = $this->mod_produk->updateData('produk',$data,$where);
				if($res>=1){
					//print_r($res)
					redirect('index.php/Crud_produk/indexAdmin');
				}                   
		            }				
	}
	public function do_delete($kode_produk){
		$where = array('kode_produk' => $kode_produk);
		$res = $this ->mod_produk->DeleteData('produk',$where); 
		if($res>=1){
			redirect('index.php/Crud_produk/indexAdmin');
		}
	}


	
}

	
