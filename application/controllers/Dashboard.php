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
		$this->load->helper('ratelimit');
		limitRequests($this->input->ip_address());

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
		if ($usertype == '1') {
			$query =  $this->db->query("SELECT SUM(taka) AS taka,billingunit
			FROM movement_insert1
			LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
			WHERE MONTH(fdate)=MONTH(NOW()) AND YEAR(fdate)=YEAR(NOW())
			GROUP BY billingunit");
			$record = $query->result();
			$data = array();
			foreach ($record as $row) {

				$data['label'][] = $row->billingunit;

				$data['data'][] = (int) $row->taka;
			}

			$data['chart_data'] = json_encode($data);

			$query1 = $this->db->query("SELECT 

			SUM(taka) AS taka,departmentname
			FROM movement_insert1
			LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
			JOIN user ON user.userid= movement_insert1.userid
			JOIN department ON department.deptid=user.departmentid
			WHERE MONTH(fdate)=MONTH(NOW()) AND YEAR(fdate)=YEAR(NOW()) AND mstatus!='0'
			GROUP BY department.deptid
			ORDER BY departmentname ASC");
			$record1 = $query1->result();
			$data1 = array();
			foreach ($record1 as $row) {
				$data1['label'][] = $row->departmentname;
				$data1['data'][] = (int) $row->taka;
			}
			$data['chart_data1'] = json_encode($data1);




			$this->load->view('admin/dashboard_admin', $data);
		} elseif ($usertype == '4') {
			$query =  $this->db->query("SELECT SUM(taka) AS taka,billingunit
			FROM movement_insert1
			LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
			JOIN user ON user.userid= movement_insert1.userid
			WHERE MONTH(fdate)=MONTH(NOW()) AND YEAR(fdate)=YEAR(NOW()) AND user.depthheadid='$userid' AND mstatus!='0'
			GROUP BY billingunit");
			$record = $query->result();
			$data = array();
			foreach ($record as $row) {

				$data['label'][] = $row->billingunit;

				$data['data'][] = (int) $row->taka;
			}

			$data['chart_data'] = json_encode($data);
			$this->load->view('admin/dashboard_depthhead', $data);
		} elseif ($usertype == '3') {
			$query =  $this->db->query("SELECT SUM(taka) AS taka,billingunit
			FROM movement_insert1
			LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
			JOIN user ON user.userid= movement_insert1.userid
			WHERE MONTH(fdate)=MONTH(NOW()) AND YEAR(fdate)=YEAR(NOW()) AND user.lmauserid='$userid' AND mstatus!='0'
			GROUP BY billingunit");
			$record = $query->result();
			$data = array();
			foreach ($record as $row) {

				$data['label'][] = $row->billingunit;

				$data['data'][] = (int) $row->taka;
			}

			$data['chart_data'] = json_encode($data);
			$this->load->view('admin/dashboard_linemanager', $data);
		} else {
			$this->load->view('admin/dashboard', $data);
		}
	}
	public function factory_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Factory Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['ul'] = $this->Admin->billfor_list();
		if ($this->session->userdata('user_type') == '1') {
			$this->load->view('admin/factory_insert_form', $data);
		} else {
			$this->load->view('admin/dashboard', $data);
		}
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
				$ins = $this->Admin->fac_insert($facid, $facname, $fac_address, $foid);
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
		if ($this->session->userdata('user_type') == '1') {
			$this->load->view('admin/factory_list', $data);
		} else {
			$this->load->view('admin/dashboard', $data);
		}
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
	public function transittype_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Transit Type Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/transittype_insert_form', $data);
	}
	public function transittype_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$transittype = $this->form_validation->set_rules('transittype', 'Transit Type', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->transittype_insert_form();
			} else {
				$transittype = $this->input->post('transittype');
				$ins = $this->Admin->transittype_insert($transittype);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/transittype_insert_form', 'refresh');
			}
		}
	}
	public function transittype_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Transit Type List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->transittype_list();
		$this->load->view('admin/transittype_list', $data);
	}
	public function transitmode_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Transit Mode Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->transittype_list();
		$this->load->view('admin/transitmode_insert_form', $data);
	}
	public function transitmode_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$ttid = $this->form_validation->set_rules('ttid', 'Transit Type', 'required');
			$transitmode = $this->form_validation->set_rules('transitmode', 'Transit Mode', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->transitmode_insert_form();
			} else {
				$ttid = $this->input->post('ttid');
				$transitmode = $this->input->post('transitmode');
				$ins = $this->Admin->transitmode_insert($ttid, $transitmode);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/transitmode_insert_form', 'refresh');
			}
		}
	}
	public function transitmode_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Transit Mode List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->transitmode_list();
		$this->load->view('admin/transitmode_list', $data);
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
	public function depthhead_user_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Head Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/depthhead_user_insert_form', $data);
	}
	public function depthhead_user_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$depthuserid = $this->form_validation->set_rules('depthuserid', 'Department Head ID', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->depthhead_user_insert_form();
			} else {
				$depthuserid = $this->input->post('depthuserid');

				$ins = $this->Admin->depthhead_user_insert($depthuserid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/depthhead_user_insert_form', 'refresh');
			}
		}
	}
	public function depthhead_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Department Head List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->depthhead_list();
		$this->load->view('admin/depthhead_list', $data);
	}
	public function accounts_user_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Accountant Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/accounts_user_insert_form', $data);
	}
	public function accounts_user_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accuserid = $this->form_validation->set_rules('accuserid', 'Accountant ID', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->accounts_user_insert_form();
			} else {
				$accuserid = $this->input->post('accuserid');

				$ins = $this->Admin->accounts_user_insert($accuserid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/accounts_user_insert_form', 'refresh');
			}
		}
	}
	public function accounts_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Accounts User List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accounts_list();
		$this->load->view('admin/accounts_list', $data);
	}
	public function accountshead_user_insert_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Accounts Head Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/accountshead_user_insert_form', $data);
	}
	public function accountshead_user_insert()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$accheaduserid = $this->form_validation->set_rules('accheaduserid', 'Accounts Head ID', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->accounts_user_insert_form();
			} else {
				$accheaduserid = $this->input->post('accheaduserid');

				$ins = $this->Admin->accountshead_user_insert($accheaduserid);

				if ($ins == TRUE) {
					$this->session->set_flashdata('Successfully', 'Successfully Inserted');
				} else {
					$this->session->set_flashdata('Successfully', 'Failed To Inserted');
				}
				redirect('Dashboard/accountshead_user_insert_form', 'refresh');
			}
		}
	}
	public function accountshead_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Accounts Head List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->accountshead_list();
		$this->load->view('admin/accountshead_list', $data);
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
		$data['ul'] =  $this->Admin->factory_list();
		$data['ul1'] = $this->Admin->department_list();
		$data['ul2'] = $this->Admin->designation_list();
		$data['ul3'] = $this->Admin->usertype_list();
		$data['ul4'] = $this->Admin->userstatus_list();
		$data['ul5'] = $this->Admin->linemanager_list();
		$data['ul6'] = $this->Admin->depthhead_list();
		$data['ul7'] = $this->Admin->accounts_list();
		$data['ul8'] = $this->Admin->accountshead_list();
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
			$depthheadid = $this->input->post('depthheadid');
			$accuserid = $this->input->post('accuserid');
			$accheadid = $this->input->post('accheadid');
			$userstatusid = $this->input->post('userstatusid');
			$userid = $this->input->post('userid');
			$password = $this->input->post('password');
			$indate = $this->input->post('indate');
			$userid = $this->input->post('userid');


			$ins = $this->Admin->ulup($factoryid, $departmentid, $designationid, $name, $mobile, $usertypeid, $lmuserid, $depthheadid, $accuserid, $accheadid, $userstatusid, $userid, $password, $indate);
			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Updated');
			} else {
				$this->session->set_flashdata('Successfully', 'Failed To Updated');
			}
			redirect('Dashboard/user_list', 'refresh');
		}
	}

	///////////////////////////////////////////////////////////////MOVEMENT//////////////////////////////////////////////////////

	public function movement_insert_form1()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Movement Insert';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$this->load->view('admin/movement_insert_form1', $data);
	}


	public function movement_insert1()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {

			$factoryid = $this->form_validation->set_rules('factoryid', 'Billing Unit', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->movement_insert_form1();
			} else {
				$userid = $this->input->post('userid');
				$lmauserid = $this->input->post('lmauserid');
				$depthuserid = $this->input->post('depthuserid');
				$accuserid = $this->input->post('accuserid');
				$accheadid = $this->input->post('accheadid');
				$fdate = $this->input->post('fdate');
				$tdate = $this->input->post('tdate');
				$factoryid = $this->input->post('factoryid');

				$ins = $this->Admin->movement_insert1($userid, $lmauserid, $depthuserid, $accuserid, $accheadid, $fdate, $tdate, $factoryid);

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
		$data['ml'] = $this->Admin->transitmode_list();
		$data['mtoken'] = $mtoken;
		$this->load->view('admin/movement_bill_create_form', $data);
	}

	public function movement_bill_insert1()
	{
		$this->load->database();
		//$this->load->library('form_validation');
		$this->load->model('Admin');
		//if ($this->input->post('submit')) {
		$mtoken = $this->input->get('mtoken');
		$fplace = $this->input->get('fplace');
		$fplace =  str_replace("'", "\'", $fplace);
		$ftime = $this->input->get('ftime');
		$tplace = $this->input->get('tplace');
		$tplace =  str_replace("'", "\'", $tplace);
		$ttime = $this->input->get('ttime');
		$purpose = $this->input->get('purpose');
		$purpose =  str_replace("'", "\'", $purpose);
		$mode = $this->input->get('mode');
		$taka = $this->input->get('taka');
		$remarks = $this->input->get('remarks');
		$remarks =  str_replace("'", "\'", $remarks);

		$sql2 = "UPDATE movement_insert1 SET mstatus='2' WHERE mid='$mtoken'";
		$this->db->query($sql2);
		
		// $sql = "SELECT mstatus FROM movement_insert1 WHERE mid='$mtoken'";
		// $query = $this->db->query($sql);
		// $query = $query->result_array();
		// 	foreach ($query as $row) {
		// 		$mstatus = $row['mstatus'];
		// 	}
		// 	if ($mstatus == 2) {
				
		// 		echo "Already Submit";
		// 	}
		// else
		// {

		for ($i = 0; $i < count($mode); $i++) {
			$data["i"] = $i;
			$data["mtoken"] = $mtoken;
			$data["fplace"] = $fplace[$i];
			$data["ftime"] = $ftime[$i];
			$data["tplace"] = $tplace[$i];
			$data["ttime"] = $ttime[$i];
			$data["purpose"] = $purpose[$i];
			$data["mode"] = $mode[$i];
			$data["taka"] = $taka[$i];
			$data["remarks"] = $remarks[$i];
			$ins = $this->Admin->movement_bill_insert1($data);
			
		}
	//}

		if ($ins) {
			echo  "ok";
		} else {
			echo  "error";
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
		$data['ml'] = $this->Admin->transitmode_list();
		$data['ul'] = $this->Admin->movement_bill_details($mtoken);
		$this->load->view('admin/movement_bill_details', $data);
	}

	public function movement_bill_update()
	{
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('Admin');
		if ($this->input->post('submit')) {
			$mbillid = $this->input->post('mbillid');
			$fplace = $this->input->post('fplace');
			$ftime = $this->input->post('ftime');
			$tplace = $this->input->post('tplace');
			$ttime = $this->input->post('ttime');
			//$tfqty=$tfqty-$dqty;

			$purpose = $this->input->post('purpose');
			$billtype = $this->input->post('billtype');
			$taka = $this->input->post('taka');
			$remarks = $this->input->post('remarks');
			for ($i = 0; $i < count($mbillid); $i++) {

				$data["i"] = $i;
				$data["mbillid"] = $mbillid[$i];
				$data["fplace"] = $fplace[$i];
				$data["ftime"] = $ftime[$i];
				$data["tplace"] = $tplace[$i];
				$data["ttime"] = $ttime[$i];
				$data["purpose"] = $purpose[$i];
				$data["billtype"] = $billtype[$i];
				$data["taka"] = $taka[$i];
				$data["remarks"] = $remarks[$i];
				$ins = $this->Admin->movement_bill_update($data);
			}

			if ($ins == TRUE) {
				$this->session->set_flashdata('Successfully', 'Successfully Inserted');
			} else {
				$this->session->set_flashdata('UnSuccessfully', "This Data Inserted.'$data[i]'. Others Are Not");
			}
			redirect('Dashboard/movement_list', 'refresh');
		}
	}
	public function movement_bill_check()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Check';
		$mtoken = $this->uri->segment(3);
		$userid = $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['ul'] = $this->Admin->movement_bill_check($mtoken,$userid);
		$this->load->view('admin/movement_bill_check', $data);
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
		$depthheadid = $this->session->userdata('depthheadid');
		$lmauserid = $this->session->userdata('lmauserid');
		//$data['ul'] = $this->Admin->approval_pending_list($userid,$depthuserid);
		$usertype = $this->session->userdata('user_type');
		if ($usertype == '1') {
			$data['ul'] = $this->Admin->approval_pending_list_admin();
			$this->load->view('admin/approval_pending_list', $data);
		} elseif ($usertype == '3' || $usertype == '4') {
			$data['ul'] = $this->Admin->approval_pending_list_linemanager($userid);
			$this->load->view('admin/approval_pending_list', $data);
		} elseif ($usertype == '4') {
			$data['ul'] = $this->Admin->approval_pending_list_depthhead($userid);
			$this->load->view('admin/approval_pending_list', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->approval_pending_list_user($userid);
			$this->load->view('admin/approval_pending_list', $data);
		} elseif ($usertype == '5') {
			$data['ul'] = $this->Admin->approval_pending_list_accounts($userid);
			$this->load->view('admin/acc_approval_pending_list', $data);
		} elseif ($usertype == '6') {
			$data['ul'] = $this->Admin->approval_pending_list_accountshead($userid);
			$this->load->view('admin/acc_approval_pending_list', $data);
		} elseif ($usertype == '7') {
			$data['ul'] = $this->Admin->approval_pending_list_accountscommon();
			$this->load->view('admin/acc_approval_pending_list', $data);
		}
	}
	public function movement_bill_approved()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Approved';
		$mtoken = $this->uri->segment(3);
		$userid = $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['mtoken'] = $this->Admin->movement_bill_id($mtoken);
		$ins = $this->Admin->movement_bill_approved($mtoken,$userid);
		if ($ins == TRUE) {
			$this->session->set_flashdata('Successfully', 'Successfully Approved');
		} else {
			$this->session->set_flashdata('Successfully', 'Failed To Approved');
		}
		redirect('Dashboard/approval_pending_list', 'refresh');
	}
	public function movement_bill_reject()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Create';
		$mtoken = $this->uri->segment(3);
		$userid = $this->uri->segment(4);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['mtoken'] = $this->Admin->movement_bill_id($mtoken);
		$ins = $this->Admin->movement_bill_reject($mtoken,$userid);
		if ($ins == TRUE) {
			$this->session->set_flashdata('Successfully', 'Successfully Rejected');
		} else {
			$this->session->set_flashdata('Successfully', 'Failed To Rejected');
		}
		redirect('Dashboard/approval_pending_list', 'refresh');
	}
	public function movement_bill_acc_approved()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Approved';
		$mtoken = $this->uri->segment(3);
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		//$data['mtoken'] = $this->Admin->movement_bill_id($mtoken);
		$ins = $this->Admin->movement_bill_acc_approved($mtoken);
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
		//$depthheadid = $this->session->userdata('depthheadid');
		$usertype = $this->session->userdata('user_type');
		if ($usertype == '1') {
			$data['ul'] = $this->Admin->date_wise_approval_list_admin($pd, $wd, $userid);
			$this->load->view('admin/date_wise_approval_list', $data);
		} elseif ($usertype == '3' || $usertype == '4') {
			$data['ul'] = $this->Admin->date_wise_approval_list($pd, $wd, $userid);
			$this->load->view('admin/date_wise_approval_list', $data);
		} elseif ($usertype == '2') {
			$data['ul'] = $this->Admin->date_wise_approval_list($pd, $wd, $userid);
			$this->load->view('admin/date_wise_approval_list_user', $data);
		} elseif ($usertype == '5') {
			$data['ul'] = $this->Admin->date_wise_approval_list_accounts($pd, $wd, $userid);
			$this->load->view('admin/date_wise_approval_list_accounts', $data);
		} elseif ($usertype == '6') {
			$data['ul'] = $this->Admin->date_wise_approval_list_accountshead($pd, $wd, $userid);
			$this->load->view('admin/date_wise_approval_list_accounts', $data);
		} elseif ($usertype == '7') {
			$data['ul'] = $this->Admin->date_wise_approval_list_accountscommon($pd, $wd);
			$this->load->view('admin/date_wise_approval_list_accounts', $data);
		}
	}
	public function date_wise_approval_details_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		$userid = $this->session->userdata('userid');
		//$depthheadid = $this->session->userdata('depthheadid');
		$usertype = $this->session->userdata('user_type');
		$data['ul'] =$this->Admin->date_wise_approval_details_list($pd, $wd);
		$this->load->view('admin/date_wise_approval_details_list', $data);
		
		// if ($usertype == '1') {
		// 	$data['ul'] = $this->Admin->date_wise_approval_list_admin($pd, $wd, $userid);
		// 	$this->load->view('admin/date_wise_approval_list', $data);
		// } elseif ($usertype == '3' || $usertype == '4') {
		// 	$data['ul'] = $this->Admin->date_wise_approval_list($pd, $wd, $userid);
		// 	$this->load->view('admin/date_wise_approval_list', $data);
		// } elseif ($usertype == '2') {
		// 	$data['ul'] = $this->Admin->date_wise_approval_list($pd, $wd, $userid);
		// 	$this->load->view('admin/date_wise_approval_list_user', $data);
		// } elseif ($usertype == '5') {
		// 	$data['ul'] = $this->Admin->date_wise_approval_list_accounts($pd, $wd, $userid);
		// 	$this->load->view('admin/date_wise_approval_list_accounts', $data);
		// } elseif ($usertype == '6') {
		// 	$data['ul'] = $this->Admin->date_wise_approval_list_accountshead($pd, $wd, $userid);
		// 	$this->load->view('admin/date_wise_approval_list_accounts', $data);
		// } elseif ($usertype == '7') {
		// 	$data['ul'] = $this->Admin->date_wise_approval_list_accountscommon($pd, $wd);
		// 	$this->load->view('admin/date_wise_approval_list_accounts', $data);
		// }
	}
	public function date_wise_approval_details_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Date Wise Approved List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$this->load->view('admin/date_wise_approval_details_list_form', $data);
	}
	public function date_wise_approval_list_xls()
	{
		$this->load->database();
		$this->load->model('Admin');
		$userid = $this->session->userdata('userid');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$extension = $this->input->post('export_type');
		if (!empty($extension)) {
			$extension = $extension;
		} else {
			$extension = 'xlsx';
		}
		$this->load->helper('download');
		$data = array();
		$data['title'] = 'Export Excel Sheet';
		// get employee list
		$empInfo = $this->Admin->date_wise_approval_list($pd, $wd, $userid);
		$fileName = 'date_wise_approval_list-' . time();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Token');
		$sheet->setCellValue('B1', 'Employee');
		$sheet->setCellValue('C1', 'From Date');
		$sheet->setCellValue('D1', 'To Date');
		$sheet->setCellValue('E1', 'Total');
		$sheet->setCellValue('F1', 'Status');
		//$sheet->setCellValue('G1', 'Qty');
		//		$sheet->setCellValue('H1', 'Description');
		//		$sheet->setCellValue('I1', 'Unit Price');
		//		$sheet->setCellValue('J1', 'Total Price');
		//		$sheet->setCellValue('K1', 'Remarks');
		//		$sheet->setCellValue('L1', 'User');
		//		$sheet->setCellValue('M1', 'Date');

		// 
		$rowCount = 2;
		foreach ($empInfo as $element) {
			$sheet->setCellValue('A' . $rowCount, $element['mid']);
			$sheet->setCellValue('B' . $rowCount, $element['username']);
			$sheet->setCellValue('C' . $rowCount, $element['fdate']);
			$sheet->setCellValue('D' . $rowCount, $element['tdate']);
			$sheet->setCellValue('E' . $rowCount, $element['ctotal']);
			if ($element['mstatus'] == 2) {
				$sheet->setCellValue('F' . $rowCount, 'Pending/Reject');
			} elseif ($element['mstatus'] == 0) {
				$sheet->setCellValue('F' . $rowCount, 'Rejected');
			} elseif ($element['mstatus'] == 3) {
				$sheet->setCellValue('F' . $rowCount, 'Waiting For Accounts/Print');
			} elseif ($element['mstatus'] == 4) {
				$sheet->setCellValue('F' . $rowCount, 'Approved By Accounts/Print');
			}
			//$sheet->setCellValue('G' . $rowCount, $element['qty'].' '.$element['puom']);
			//			$sheet->setCellValue('H' . $rowCount, $element['description']);
			//			$sheet->setCellValue('I' . $rowCount, $element['price']);
			//			$sheet->setCellValue('J' . $rowCount, $element['qty']*$element['price']);
			//			$sheet->setCellValue('K' . $rowCount, $element['remarks']);
			//			$sheet->setCellValue('L' . $rowCount, $element['uname']);
			//			$sheet->setCellValue('M' . $rowCount, $element['mdate']);


			$rowCount++;
		}

		if ($extension == 'csv') {
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
			$fileName = $fileName . '.csv';
		} elseif ($extension == 'xlsx') {
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
			$fileName = $fileName . '.xlsx';
		} else {
			$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
			$fileName = $fileName . '.xls';
		}

		$this->output->set_header('Content-Type: application/vnd.ms-excel');
		$this->output->set_header("Content-type: application/csv");
		$this->output->set_header('Cache-Control: max-age=0');
		$writer->save(ROOT_UPLOAD_PATH . $fileName);
		//redirect(HTTP_UPLOAD_PATH.$fileName); 
		$filepath = file_get_contents(ROOT_UPLOAD_PATH . $fileName);
		force_download($fileName, $filepath);
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
		$data['ul'] = $this->Admin->user_wise_approval_list($uid, $pd, $wd, $userid);
		$this->load->view('admin/user_wise_approval_list', $data);
	}
	public function unit_wise_summary_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Unit Wise Summary List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$data['ul'] = $this->Admin->transitmode_list();
		$this->load->view('admin/unit_wise_summary_list_form', $data);
	}
	public function unit_wise_summary_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$tmid = $this->input->post('tmid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		//$userid = $this->session->userdata('userid');
		if ($factoryid == '' && $tmid != '') {
			$data['ul'] = $this->Admin->unit_wise_summary_list_tmid($pd, $wd, $tmid);
			$this->load->view('admin/unit_wise_summary_list', $data);
		} elseif ($tmid == '' && $factoryid != '') {
			$data['ul'] = $this->Admin->unit_wise_summary_list_factoryid($pd, $wd, $factoryid);
			$this->load->view('admin/unit_wise_summary_list', $data);
		} elseif ($factoryid != '' && $tmid != '') {
			$data['ul'] = $this->Admin->unit_wise_summary_list($pd, $wd, $factoryid, $tmid);
			$this->load->view('admin/unit_wise_summary_list', $data);
		} elseif ($factoryid == '' && $tmid == '') {
			$data['ul'] = $this->Admin->unit_wise_summary_list_all($pd, $wd);
			$this->load->view('admin/unit_wise_summary_list', $data);
		}
	}
	public function bill_type_wise_summary_list_form()
	{
		$this->load->database();
		$this->load->model('Admin');
		$data['title'] = 'Bill Type Wise Summary List';
		$this->load->view('admin/head', $data);
		$this->load->view('admin/toprightnav');
		$this->load->view('admin/leftmenu');
		$data['fl'] = $this->Admin->factory_list();
		$data['ul'] = $this->Admin->transittype_list();
		$this->load->view('admin/bill_type_wise_summary_list_form', $data);
	}
	public function bill_type_wise_summary_list()
	{
		$this->load->database();
		$this->load->model('Admin');
		$pd = $this->input->post('pd');
		$wd = $this->input->post('wd');
		$factoryid = $this->input->post('factoryid');
		$ttid = $this->input->post('ttid');
		$data['pd'] = $pd;
		$data['wd'] = $wd;
		//$userid = $this->session->userdata('userid');
		if ($factoryid == '' && $ttid != '') {
			$data['ul'] = $this->Admin->bill_type_wise_summary_list_ttid($pd, $wd, $ttid);
			$this->load->view('admin/bill_type_wise_summary_list', $data);
		} elseif ($ttid == '' && $factoryid != '') {
			$data['ul'] = $this->Admin->bill_type_wise_summary_list_factoryid($pd, $wd, $factoryid);
			$this->load->view('admin/bill_type_wise_summary_list', $data);
		} elseif ($factoryid != '' && $ttid != '') {
			$data['ul'] = $this->Admin->bill_type_wise_summary_list($pd, $wd, $factoryid, $ttid);
			$this->load->view('admin/bill_type_wise_summary_list', $data);
		} elseif ($factoryid == '' && $ttid == '') {
			$data['ul'] = $this->Admin->bill_type_wise_summary_list_all($pd, $wd);
			$this->load->view('admin/bill_type_wise_summary_list', $data);
		}
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
		
		// $html = $this->load->view('admin/movementbillpdf', $data, true);
		// $this->pdf->createPDF($html, 'Out Of Office Bill', false);

		$this->load->view('admin/movementbillpdf_html', $data);
		
		
		
		
		
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
		$data['ul'] = $this->Admin->date_wise_approval_list_user_print($pd, $wd, $userid);
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
