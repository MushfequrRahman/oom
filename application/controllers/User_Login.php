<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Login extends CI_Controller {

	
	public function index()
		{
			if($this->session->userdata('userid')!='')
				{
					redirect('Dashboard');
				}
			if(!$this->session->userdata('userid'))
				{
					$this->load->database();
					$this->load->model('Admin');
					$this->load->model('Login_Model');
					$data['title']='Out Of Office Management';
					$this->load->view('admin/head',$data);
					$data['ul']=$this->Admin->factory_list();
					$data['ul1']=$this->Admin->department_list();
					$data['ul2']=$this->Admin->designation_list();
					//$data['allf']=$this->Login_Model->factory_list();
					$this->load->view('admin/login_form',$data);
				}
	 	}
	
	
	public function login_form()
		{
			$this->load->database();
		$this->load->model('Admin');
			if($this->session->userdata('userid')!='')
			{
				redirect('Dashboard');
			}
			if(!$this->session->userdata('userid'))
			{
				$data['title']='Login';
				$this->load->view('admin/head',$data);
				$data['ul']=$this->Admin->factory_list();
				$data['ul1']=$this->Admin->department_list();
				$data['ul2']=$this->Admin->designation_list();
				$this->load->view('admin/login_form',$data);
			}
			
		 }
	 
	 public function login()
		{
			$this->load->database();
			$this->load->library('form_validation');
			$this->load->model('Login_Model');
			if($this->input->post('submit'))
				{
					$userid=$this->form_validation->set_rules('userid','User ID','required');
					$password=$this->form_validation->set_rules('password','Password','required');
					//$user_type=$this->form_validation->set_rules('user_type','User Type','required');
					//$unit=$this->form_validation->set_rules('unit','Unit','required');
					if($this->form_validation->run()==FALSE)
						{
							$data['title']='Out Of Office Management';
							$this->load->view('admin/head',$data);
							$data['allf']=$this->Login_Model->factory_list();
							$this->load->view('admin/login_form',$data);
						}
					else
						{
							$userid=$this->input->post('userid');
							$password=$this->input->post('password');
							//$user_type=$this->input->post('user_type');
							//$unit=$this->input->post('unit');
							$result=$this->Login_Model->login($userid,$password);
							if($result)
								{
									//$arr=print_r($result);
									//echo $arr[0]['name'];
									$userid=$result[0]['userid'];
									$name=$result[0]['name'];
									$user_type=$result[0]['user_type'];
									$unit=$result[0]['factoryid'];
									$lmauserid=$result[0]['lmauserid'];
									$depthheadid=$result[0]['depthheadid'];
									$accuserid=$result[0]['accuserid'];
									$accheadid=$result[0]['accheadid'];
									//$pic=$result[0]['image'];
									$session_data = array(  
                          			'userid'     =>     $userid,
									'user_type'     =>     $user_type,
									'unit'     =>     $unit,
									'name'     =>     $name,
									'lmauserid'     =>     $lmauserid,
									'depthheadid'     =>     $depthheadid,
									'accuserid'     =>     $accuserid,
									'accheadid'     =>     $accheadid,
                     				);  
                     				$this->session->set_userdata($session_data);
								 	redirect('User_Login');
					 				//$this->load->view('login_view');
								}
						 	else
								{
									$this->session->set_flashdata('error', 'Invaluserid User ID and Password');
									$data['title']='Out Of Office Management';
									$this->load->view('admin/head',$data);
									//$data['allf']=$this->Login_Model->factory_list();
									$this->load->view('admin/login_form',$data);
								}
						 }
					}
			}
		
		public function logout()  
      		{  
		   		$this->session->sess_destroy();
		   		$this->session->unset_userdata('userid');  
           		redirect('User_Login');  
      		} 
}
