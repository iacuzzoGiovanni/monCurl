<?php

	class Member extends CI_Controller{
		

		public function index(){
			$this->load->helper('form');
			$dataLayout['id_body'] = 'form';
			$dataLayout['titre'] = 'connexion';
			$dataLayout['pageCourante'] = 'connexion';
			$dataLayout['vue'] = $this->load->view('member_action', array(), TRUE);

			$this->load->view('layout', $dataLayout);
		}

		public function signIn(){
			if($this->input->post('email1') === $this->input->post('email2')){
				$email = $this->input->post('email1');
			}

			if($this->input->post('mdp1') === $this->input->post('mdp2')){
				$mdp = $this->input->post('mdp1');
			}	

			$this->load->model('M_Member');
			$this->M_Member->inscrire(array('email' => $email, 'mdp' => $mdp));

			
			$res = $this->M_Member->verifier(array('email' => $email, 'mdp' => $mdp));
			if($res['exist']){
				$user = array(
                   'id'  => $res['data']->user_id,
                   'logged_in' => TRUE
               	);
				$this->session->set_userdata($user);
				redirect('curl/index');
			}else{
				$user = array(
                   'logged_in' => FALSE
               	);
				$this->session->set_userdata($user);
				redirect('member/index');
			}
			
		}

		public function login(){
			$email = $this->input->post('email');
			$mdp = $this->input->post('mdp');
			$dataUser = array('email' => $email,
							  'mdp' => $mdp);
			$this->load->model('M_Member');
			$res = $this->M_Member->verifier($dataUser);
			if($res['exist']){
				$user = array(
                   'id'  => $res['data']->user_id,
                   'logged_in' => TRUE
               	);
				$this->session->set_userdata($user);
				redirect('curl/index');
			}else{
				$user = array(
                   'logged_in' => FALSE
               	);
				$this->session->set_userdata($user);
				redirect('member/index');
			}
		}

		public function disconnect(){
			$this->session->unset_userdata('logged_in');
			redirect('member/index');
		}
	}