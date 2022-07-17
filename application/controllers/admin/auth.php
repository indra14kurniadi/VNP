<?php

	class Auth extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->model('model_datacustomer');
			
		}
		
		function index()
		{
			$this->load->view('admin/auth/login');
		}

		function check_login()
		{
			if (isset($_POST['submit'])) {
				
				$username	= $this->input->post('username',true);
				$password 	= $this->input->post('password',true);
				// proses pengecekan username dan password di database beradi di model_user dengan memparsing $username dan $password
				// $loginUser untuk mengecek user pada tbl_user sedangkan $loginGuru memerika ke dalam tbl_guru
				$loginUser		= $this->model_datacustomer->login($username, $password);
				

                
                
                


				
				// $loginUser-> mengambil nilai dari $user yang ada di function login pada model_user, apabila data salah maka user tidak berisi dan $loginUser menjadi kosong
				// apablia $loginUser tidak kosong (memiliki data) maka akan membuat session dan redirect ke tampilan_utama
				if (!empty($loginUser)) {

					// $this->session->set_userdata($loginUser); -> maksudnya mengset userdata yang mana datanya diambil dari $loginUser
					$this->session->set_userdata($loginUser);
					redirect('admin/Dashboard');

				} else {

					redirect('admin/auth');
				}
            }else{
				redirect('admin/Auth');
			}

		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('admin/auth');
		}

	}

?>