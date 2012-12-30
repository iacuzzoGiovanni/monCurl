<?php

	class Member extends CI_Controller{
		

		public function index(){
			$this->load->helper('form');
			$dataLayout['id_body'] = 'form';
			$dataLayout['titre'] = 'connexion';
			$dataLayout['pageCourante'] = 'connexion';
			$dataLayout['vue'] = $this->load->view('member_login', array(), TRUE);

			$this->load->view('layout', $dataLayout);
		}

		public function login(){
			$email = $this->input->post('email');
			$mdp = $this->input->post('mdp');
			$dataUser = array('email' => $email,
							  'mdp' => $mdp);
			$this->load->model('M_Member');
			$res = $this->M_Member->verifier($dataUser);
			
			if($res){
				$this->session->set_userdata('logged_in', TRUE);
				redirect('curl/index');
			}else{
				$this->session->set_userdata('logged_in', FALSE);
				redirect('member/index');
			}
		}

		public function disconnect(){
			$this->session->unset_userdata('logged_in');
			redirect('member/index');
		}
	}