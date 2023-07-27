<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Spreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->library('session');

		if (!$this->session->userdata('userid')) {
			redirect('User_Login');
		}
	}
	public function index()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Dashboard';
		$this->load->view('admin/head', $data);
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		$factoryid = $this->session->userdata('factoryid');
		$this->load->view('admin/toprightnav', $data);
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/dashboard', $data);
	}
	public function factory_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->billfor_list();
		$this->load->view('admin/factory_insert_form', $data);
	}
	public function fac_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$facid = $this->form_validation->set_rules('facid', 'Factory ID', 'required');
			$facname = $this->form_validation->set_rules('facname', 'Factory Name', 'required');
			$fac_address = $this->form_validation->set_rules('fac_address', 'Factory Address', 'required');
			$foid = $this->form_validation->set_rules('foid', 'Factory For', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->factory_insert_form();
			} else {
				$facid = $this->input->post('facid');
				$facname = $this->input->post('facname');
				$fac_address = $this->input->post('fac_address');
				$foid = $this->input->post('foid');
				$ins = $this->Admin->fac_insert($facid, $facname, $fac_address,$foid);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/factory_insert_form', 'refresh');
			}
		}
	}
	public function factory_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/factory_list', $data);
	}
	public function factory_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Info Update';
		$facid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['all_line']=$this->Admin->all_line();
		//$data['opskill']=$this->Admin->opskill($opid);
		$data['flup'] = $this->Admin->factory_list_up($facid);
		$this->load->view('admin/factory_list_up', $data);
	}
	public function flup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$fid = $this->input->post('fid');
			$facid = $this->input->post('facid');
			$factoryname = $this->input->post('factoryname');
			$factory_address = $this->input->post('factory_address');

			$ins = $this->Admin->flup($fid, $facid, $factoryname, $factory_address);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/factory_list', 'refresh');
		}
	}
	public function department_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/department_insert_form', $data);
	}
	public function department_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$department = $this->form_validation->set_rules('department', 'Department Name', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->department_insert_form();
			} else {
				$department = $this->input->post('department');
				$ins = $this->Admin->department_insert($department);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/department_insert_form', 'refresh');
			}
		}
	}
	public function department_list()
	{

		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->department_list();
		$this->load->view('admin/department_list', $data);
	}
	public function department_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Info Update';
		$deptid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->department_list_up($deptid);
		$this->load->view('admin/department_list_up', $data);
	}
	public function departmentlup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$deptid = $this->input->post('deptid');
			$departmentname = $this->input->post('departmentname');

			$ins = $this->Admin->departmentlup($deptid, $departmentname);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/department_list', 'refresh');
		}
	}
	public function designation_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/designation_insert_form', $data);
	}
	public function designation_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$designation = $this->form_validation->set_rules('designation', 'Designation', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->designation_insert_form();
			} else {
				$designation = $this->input->post('designation');
				$ins = $this->Admin->designation_insert($designation);
				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/designation_insert_form', 'refresh');
			}
		}
	}
	public function designation_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Designation List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->designation_list();
		$this->load->view('admin/designation_list', $data);
	}
	// public function designation_list_up()
	// {
	// 	$this->load->database();
	// 	$this->load->model('Admin');
	// 	$data['title'] = 'Designation Update';
	// 	$designationid = $this->uri->segment(3);
	// 	$this->load->view('admin/head', $data);
	// 	$this->load->view('admin/toprightnav');
	// 	$this->load->view('admin/leftmenu');
	// 	$data['dlup'] = $this->Admin->designation_list_up($designationid);
	// 	$this->load->view('admin/designation_list_up', $data);
	// }
	// public function designationlup()
	// {
	// 	$this->load->database();
	// 	$this->load->library('form_validation');
	// 	$this->load->model('Admin');
	// 	if ($this->input->post('submit')) {
	// 		$designation = $this->input->post('edesignation');
	// 		$ins = $this->Admin->parentdesignationlup($designationid, $designation);
	// 		if ($ins == TRUE) {
	// 			$this->session->set_flashdata('Successfully', 'Successfully Updated');
	// 		} else {
	// 			$this->session->set_flashdata('Successfully', 'Failed To Updated');
	// 		}
	// 		redirect('Dashboard/designation_list', 'refresh');
	// 	}
	// }
	
	
	
	
	
	public function usertype_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/usertype_insert_form', $data);
	}
	public function usertype_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertype = $this->form_validation->set_rules('usertype', 'User type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->usertype_insert_form();
			} else {
				$usertype = $this->input->post('usertype');
				$ins = $this->Admin->usertype_insert($usertype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/usertype_insert_form', 'refresh');
			}
		}
	}
	public function usertype_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->usertype_list();
		$this->load->view('admin/usertype_list', $data);
	}
	public function usertype_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Type Update';
		$usertypeid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');

		$data['dlup'] = $this->Admin->usertype_list_up($usertypeid);
		$this->load->view('admin/usertype_list_up', $data);
	}
	public function usertypelup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$usertypeid = $this->input->post('usertypeid');
			$usertype = $this->input->post('usertype');

			$ins = $this->Admin->usertypelup($usertypeid, $usertype);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/usertype_list', 'refresh');
		}
	}

	public function userstatus_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/userstatus_insert_form', $data);
	}
	public function userstatus_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatus = $this->form_validation->set_rules('userstatus', 'User Status', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->userstatus_insert_form();
			} else {
				$userstatus = $this->input->post('userstatus');

				$ins = $this->Admin->userstatus_insert($userstatus);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/userstatus_insert_form', 'refresh');
			}
		}
	}
	public function userstatus_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->userstatus_list();
		$this->load->view('admin/userstatus_list', $data);
	}
	public function userstatus_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Status Info Update';
		$userstatusid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['dlup'] = $this->Admin->userstatus_list_up($userstatusid);
		$this->load->view('admin/userstatus_list_up', $data);
	}
	public function userstatuslup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$userstatusid = $this->input->post('userstatusid');
			$userstatus = $this->input->post('userstatus');

			$ins = $this->Admin->userstatuslup($userstatusid, $userstatus);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/userstatus_list', 'refresh');
		}
	}
	public function line_manager_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Line Manager Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/line_manager_insert_form', $data);
	}
	public function line_manager_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$lmuserid = $this->form_validation->set_rules('lmuserid', 'Line Manager ID', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->line_manager_insert_form();
			} else {
				$lmuserid = $this->input->post('lmuserid');

				$ins = $this->Admin->line_manager_insert($lmuserid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/line_manager_insert_form', 'refresh');
			}
		}
	}
	public function linemanager_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Line Manager List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->linemanager_list();
		$this->load->view('admin/linemanager_list', $data);
	}
	public function user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/user_list', $data);
	}
	public function factorywise_user_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User List';
		$factoryid = $this->input->post('factoryid');
		$data['ul'] = $this->Admin->factorywise_user_list($factoryid);
		$this->load->view('admin/factorywise_user_list', $data);
	}
	public function user_list_up()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Info Update';
		$userid = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$data['ul4'] = $this->Admin->userstatus_list();
		$data['ul5'] = $this->Admin->linemanager_list();
		$data['ulup'] = $this->Admin->user_list_up($userid);
		$this->load->view('admin/user_list_up', $data);
	}
	public function ulup()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$factoryid = $this->input->post('factoryid');
			$departmentid = $this->input->post('departmentid');
			$name = $this->input->post('name');
			$designationid = $this->input->post('designationid');
			$mobile = $this->input->post('mobile');
			$usertypeid = $this->input->post('usertypeid');
			$lmuserid = $this->input->post('lmuserid');
			$depthuserid = $this->input->post('depthuserid');
			$userstatusid = $this->input->post('userstatusid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$indate = $this->input->post('indate');
			$userid = $this->input->post('userid');


			$ins = $this->Admin->ulup($factoryid, $departmentid, $designationid, $name, $mobile, $usertypeid, $lmuserid, $depthuserid,$userstatusid, $userid, $password, $indate);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/user_list', 'refresh');
		}
	}
	
		///////////////////////////////////////////////////////////////MOVEMENT//////////////////////////////////////////////////////
	
	public function movement_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Movement Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/movement_insert_form', $data);
	}
	public function movement_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$purpose = $this->form_validation->set_rules('purpose', 'Purpose', 'required');
			$location = $this->form_validation->set_rules('location', 'Location', 'required');
			$factoryid = $this->form_validation->set_rules('factoryid', 'Billing Unit', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->movement_insert_form();
			} else {
				$userid = $this->input->post('userid');
				$lmauserid = $this->input->post('lmauserid');
				$fdate = $this->input->post('fdate');
				$tdate = $this->input->post('tdate');
				$ftime = $this->input->post('ftime');
				$ttime = $this->input->post('ttime');
				$purpose = $this->input->post('purpose');
				$location = $this->input->post('location');
				$factoryid = $this->input->post('factoryid');

				$ins = $this->Admin->movement_insert($userid,$lmauserid,$fdate,$tdate,$ftime,$ttime,$purpose,$location,$factoryid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/movement_list', 'refresh');
			}
		}
	}
	public function movement_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Movement List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$userid = $this->session->userdata('userid');
		$data['ul'] = $this->Admin->movement_list($userid);
		$this->load->view('admin/movement_list', $data);
	}
	public function movement_bill_create()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Create';
		$mtoken = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['mtoken'] = $this->Admin->movement_bill_id($mtoken);
		$data['mtoken'] = $mtoken;
		$this->load->view('admin/movement_bill_create_form', $data);
		//if ($ins == TRUE) {
//					$this->load->view('admin/movement_bill_create_form', $data);
//				} else {
//					redirect('Dashboard/movement_list', 'refresh');
//				}
		
	}
	public function movement_bill_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mtoken = $this->form_validation->set_rules('mtoken', 'Token', 'required');
			//$transport = $this->form_validation->set_rules('transport', 'Transport','numeric');
//			$tiffin = $this->form_validation->set_rules('tiffin', 'Tiffin','regex_match[/(^\d+|^\d+[.]\d+)+$/]');
//			$accomodation = $this->form_validation->set_rules('accomodation', 'Accomodation','regex_match[/(^\d+|^\d+[.]\d+)+$/]');
//			$gift = $this->form_validation->set_rules('gift', 'Gift','regex_match[/(^\d+|^\d+[.]\d+)+$/]');
//			$others = $this->form_validation->set_rules('others', 'Others','regex_match[/(^\d+|^\d+[.]\d+)+$/]');
			
			if ($this->form_validation->run() == FALSE) {
				$this->movement_list();
			} else {
				$mtoken = $this->input->post('mtoken');
				$transport = $this->input->post('transport');
				$tiffin = $this->input->post('tiffin');
				$accomodation = $this->input->post('accomodation');
				$gift = $this->input->post('gift');
				$others = $this->input->post('others');

				$ins = $this->Admin->movement_bill_insert($mtoken,$transport,$tiffin,$accomodation,$gift,$others);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('UnSuccessfully', 'Failed To Inserted');
				}
				redirect('Dashboard/movement_list', 'refresh');
			}
		}
	}
	public function movement_bill_details()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Create';
		$mtoken = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['mtoken'] = $this->Admin->movement_bill_id($mtoken);
		$data['ul'] = $this->Admin->movement_bill_details($mtoken);
		$this->load->view('admin/movement_bill_details', $data);
	}
	public function movement_bill_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mtoken = $this->input->post('mtoken');
			$transport = $this->input->post('transport');
			$tiffin = $this->input->post('tiffin');
			$accomodation = $this->input->post('accomodation');
			$gift = $this->input->post('gift');
			$others = $this->input->post('others');
			$ins = $this->Admin->movement_bill_update($mtoken,$transport,$tiffin,$accomodation,$gift,$others);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/movement_list', 'refresh');
		}
	}
	public function approval_pending_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Approval List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$userid = $this->session->userdata('userid');
		$depthuserid = $this->session->userdata('depthuserid');
		//$data['ul'] = $this->Admin->approval_pending_list($userid,$depthuserid);
		$usertype= $this->session->userdata('user_type');
		if($usertype=='1')
		{
			$data['ul'] = $this->Admin->approval_pending_list_admin();
		}
		else
		{
			$data['ul'] = $this->Admin->approval_pending_list($userid,$depthuserid);
		}
		$this->load->view('admin/approval_pending_list', $data);
	}
	public function movement_bill_approved()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Create';
		$mtoken = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['mtoken'] = $this->Admin->movement_bill_id($mtoken);
		$ins = $this->Admin->movement_bill_approved($mtoken);
		if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Approved');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Approved');
			}
			redirect('Dashboard/approval_pending_list', 'refresh');
	}
	public function date_wise_approval_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Approved List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_approval_list_form', $data);
	}
	public function date_wise_approval_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$userid = $this->session->userdata('userid');
		$depthuserid = $this->session->userdata('depthuserid');
		$usertype= $this->session->userdata('user_type');
		if($usertype=='1')
		{
			$data['ul'] = $this->Admin->date_wise_approval_list_admin($pd,$wd,$userid,$depthuserid);
		}
		if($usertype=='2')
		{
			$data['ul'] = $this->Admin->date_wise_approval_list_user($pd,$wd,$userid);
		}
		if($usertype=='3')
		{
			$data['ul'] = $this->Admin->date_wise_approval_list($pd,$wd,$userid);
		}
		if($usertype=='4')
		{
			$data['ul'] = $this->Admin->date_wise_approval_list_depthead($pd,$wd,$depthuserid);
		}
		
		if($usertype=='3')
		{
			$this->load->view('admin/date_wise_approval_list', $data);
		}
		elseif($usertype=='2')
		{
			$this->load->view('admin/date_wise_approval_list_user', $data);
		}
		elseif($usertype=='1')
		{
			$this->load->view('admin/date_wise_approval_list', $data);
		}
		elseif($usertype=='4')
		{
			$this->load->view('admin/date_wise_approval_list', $data);
		}
	}
	public function user_wise_approval_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'User Wise Approved List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/user_wise_approval_list_form', $data);
	}
	public function user_wise_approval_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$uid = $this->input->post('uid');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$userid = $this->session->userdata('userid');
		$data['ul'] = $this->Admin->user_wise_approval_list($uid,$pd,$wd,$userid);
		$this->load->view('admin/user_wise_approval_list', $data);
	}
	public function movement_bill_print()
	{
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('pdf');
		//$this->load->view('admin/mypdf', $data);
		$data['title'] = 'Out Of Office Bill PDF';
		$this->load->library('numbertowordconvertsconver');
		$mid = $this->uri->segment(3);
		//$mid = $this->session->userdata('mid');
		$this->load->view('admin/head', $data);
		//if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
			$data['ul'] = $this->Admin->movement_bill_print($mid);
			$html = $this->load->view('admin/movementbillpdf', $data, true);
			$this->pdf->createPDF($html, 'Out Of Office Bill', false);
		//} else {
//			$data['ul'] = $this->Admin->conveyanceguest_submit_details_user_print($ccid, $userid);
//			$html = $this->load->view('admin/conveyanceguestpdf', $data, true);
			//if ($html == TRUE) {
//				$this->pdf->createPDF($html, 'Get Conveyance Details', false);
//			} else {
//				echo "Already Print";
//			}
		//}
	}
	
	public function movement_bill_print_for_user()
	{
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('pdf');
		//$this->load->view('admin/mypdf', $data);
		$data['title'] = 'Out Of Office Bill PDF';
		$this->load->library('numbertowordconvertsconver');
		$mid = $this->uri->segment(3);
		//$mid = $this->session->userdata('mid');
		$this->load->view('admin/head', $data);
		//if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
			$data['ul'] = $this->Admin->movement_bill_print($mid);
			$html = $this->load->view('admin/movementbillforuserpdf', $data, true);
			$this->pdf->createPDF($html, 'Out Of Office Bill', false);
		//} else {
//			$data['ul'] = $this->Admin->conveyanceguest_submit_details_user_print($ccid, $userid);
//			$html = $this->load->view('admin/conveyanceguestpdf', $data, true);
			//if ($html == TRUE) {
//				$this->pdf->createPDF($html, 'Get Conveyance Details', false);
//			} else {
//				echo "Already Print";
//			}
		//}
	}  
	
	public function date_wise_approval_list_user_print()
	{
		$this->load->database();
		$this->load->model('Admin');
		$this->load->library('pdf');
		//$this->load->view('admin/mypdf', $data);
		$data['title'] = 'Out Of Office Bill PDF';
		$this->load->library('numbertowordconvertsconver');
		$pd = $this->uri->segment(3);
		$wd = $this->uri->segment(4);
		$userid = $this->session->userdata('userid');
		$this->load->view('admin/head', $data);
		//if ($this->session->userdata('user_type') == '1' || $this->session->userdata('user_type') == '2') {
			$data['ul'] = $this->Admin->date_wise_approval_list_user_print($pd,$wd,$userid);
			$html = $this->load->view('admin/date_wise_approval_list_user_print_pdf', $data, true);
			$this->pdf->createPDF($html, 'Out Of Office Bill', false);
		//} else {
//			$data['ul'] = $this->Admin->conveyanceguest_submit_details_user_print($ccid, $userid);
//			$html = $this->load->view('admin/conveyanceguestpdf', $data, true);
			//if ($html == TRUE) {
//				$this->pdf->createPDF($html, 'Get Conveyance Details', false);
//			} else {
//				echo "Already Print";
//			}
		//}
	} 
}
