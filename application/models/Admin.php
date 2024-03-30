<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{

	public function fac_insert($facid,$facname,$fac_address)
	{
		$sql = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO factory VALUES ('$facid','$facname','$fac_address')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factory_list()
	{
		$query = "SELECT * FROM factory ORDER BY factoryname ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function factory_list_up($facid)
	{
		$sql1 = "SELECT * FROM factory WHERE factoryid='$facid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function flup($fid, $facid, $factoryname, $factory_address)
	{
		$sql = "UPDATE factory SET factoryid='$facid',factoryname='$factoryname',factory_address='$factory_address' WHERE factoryid='$fid'";
		$query = $this->db->query($sql);
	}
	public function department_insert($department)
	{
		$sql = "SELECT * FROM department WHERE departmentname='$department'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO department VALUES ('','$department')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function department_list()
	{
		$query = "SELECT * FROM department";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function department_list_up($deptid)
	{
		$sql1 = "SELECT * FROM department 
		
		WHERE deptid='$deptid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function departmentlup($deptid, $departmentname)
	{
		$sql = "UPDATE department SET deptid='$deptid',departmentname='$departmentname' WHERE deptid='$deptid'";
		$query = $this->db->query($sql);
	}

	public function designation_insert($designation)
	{
		$sql = "SELECT * FROM designation WHERE designation='$designation'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO designation VALUES ('','$designation')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function designation_list()
	{
		$query = "SELECT * FROM designation";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function designation_list_up($designationid)
	{
		$sql1 = "SELECT * FROM designation WHERE designationid='$designationid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function designationlup($designationid, $designation)
	{

		$sql = "UPDATE designation SET designation='$designation' WHERE designationid='$designationid'";
		$query = $this->db->query($sql);
	}
	public function usertype_insert($usertype)
	{
		$sql = "SELECT * FROM usertype WHERE usertype='$usertype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO usertype VALUES ('','$usertype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function usertype_list()
	{
		$query = "SELECT * FROM usertype";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function usertype_list_up($usertypeid)
	{
		$sql1 = "SELECT * FROM usertype WHERE usertypeid='$usertypeid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function usertypelup($usertypeid, $usertype)
	{
		$sql = "UPDATE usertype SET usertype='$usertype' WHERE usertypeid='$usertypeid'";
		$query = $this->db->query($sql);
	}
	public function transittype_insert($transittype)
	{
		$sql = "SELECT * FROM transittype WHERE transittype='$transittype'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO transittype VALUES ('','$transittype')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function transittype_list()
	{
		$query = "SELECT * FROM transittype ORDER BY transittype ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function transitmode_insert($ttid,$transitmode)
	{
		$sql = "SELECT * FROM transitmode WHERE transit='$transitmode'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO transitmode VALUES ('','$ttid','$transitmode')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function transitmode_list()
	{
		$query = "SELECT * FROM transitmode 
		JOIN transittype ON transittype.ttid=transitmode.ttid
		ORDER BY transit ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function line_manager_insert($lmuserid)
	{
		$sql = "SELECT * FROM line_manager_insert WHERE lmuserid='$lmuserid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO line_manager_insert VALUES ('$lmuserid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	
	public function linemanager_list()
	{
		$query = "SELECT * FROM line_manager_insert 
		JOIN user ON user.userid=line_manager_insert.lmuserid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function depthhead_user_insert($depthuserid)
	{
		$sql = "SELECT * FROM depthhead_user_insert WHERE depthheadid='$depthuserid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO depthhead_user_insert VALUES ('$depthuserid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function depthhead_list()
	{
		$query = "SELECT depthhead_user_insert.depthheadid,name FROM depthhead_user_insert 
		JOIN user ON user.userid=depthhead_user_insert.depthheadid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function accounts_user_insert($accuserid)
	{
		$sql = "SELECT * FROM accounts_user_insert WHERE accuserid='$accuserid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO accounts_user_insert VALUES ('$accuserid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function accounts_list()
	{
		$query = "SELECT user.name,accounts_user_insert.accuserid FROM accounts_user_insert 
		JOIN user ON user.userid=accounts_user_insert.accuserid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function accountshead_user_insert($accheaduserid)
	{
		$sql = "SELECT * FROM accounts_head_insert WHERE accheadid='$accheaduserid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO accounts_head_insert VALUES ('$accheaduserid')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function accountshead_list()
	{
		$query = "SELECT user.name,accounts_head_insert.accheadid 
		FROM accounts_head_insert 
		JOIN user ON user.userid=accounts_head_insert.accheadid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_insert($factoryid,$departmentid,$designationid,$name,$email,$pmobile,$userid,$password)
	{
		$sql = "SELECT * FROM user WHERE userid='$userid'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO user VALUES ('$factoryid','$departmentid','$designationid','$name','$email','$pmobile','0','$userid','','','','','$password','1','0000-00-00')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function factorywise_user_list($factoryid)
	{
		$query = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE user.factoryid='$factoryid' ORDER BY user.userid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_list_up($userid)
	{
		$sql1 = "SELECT * FROM user 
		LEFT JOIN factory ON factory.factoryid=user.factoryid
		LEFT JOIN department ON department.deptid=user.departmentid
		LEFT JOIN designation ON designation.desigid=user.designationid
		LEFT JOIN usertype ON usertype.usertypeid=user.user_type
		LEFT JOIN userstatus ON userstatus.userstatusid=user.ustatus
		WHERE userid='$userid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function ulup($factoryid, $departmentid, $designationid, $name, $mobile, $usertypeid, $lmuserid, $depthheadid,$accuserid,$accheadid,$userstatusid, $userid, $password, $indate)
	{
		$indate = date("Y-m-d", strtotime($indate));
		$sql = "UPDATE user SET factoryid='$factoryid',departmentid='$departmentid',designationid='$designationid',name='$name',mobile='$mobile',user_type='$usertypeid',lmauserid='$lmuserid',depthheadid='$depthheadid',accuserid='$accuserid',accheadid='$accheadid',password='$password',ustatus='$userstatusid',indate='$indate' WHERE userid='$userid'";
		
		//$sql1 = "UPDATE movement_insert SET lmauserid='$lmuserid' WHERE userid='$userid'";
//		
//		$this->db->query($sql1);
		return $query = $this->db->query($sql);
	}

	public function userstatus_insert($userstatus)
	{
		$sql = "SELECT * FROM userstatus WHERE userstatus='$userstatus'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 1) {
			return false;
		} else {
			$sql = "INSERT INTO userstatus VALUES ('','$userstatus')";
			$query = $this->db->query($sql);
			return $query;
		}
	}
	public function userstatus_list()
	{
		$query = "SELECT * FROM userstatus";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function userstatus_list_up($userstatusid)
	{
		$sql1 = "SELECT * FROM userstatus WHERE userstatusid='$userstatusid'";
		$query1 = $this->db->query($sql1);
		$result = $query1->result_array();
		return $result;
	}
	public function userstatuslup($userstatusid, $userstatus)
	{
		$sql = "UPDATE userstatus SET userstatus='$userstatus' WHERE userstatusid='$userstatusid'";
		$query = $this->db->query($sql);
	}
	
	/////////////////////////////////////////////////////////////MOVEMENT////////////////////////////////////////////////////////////////
	
	//public function movement_insert($userid,$lmauserid,$fdate,$tdate,$ftime,$ttime,$purpose,$location,$factoryid)
//	{
//		date_default_timezone_set('Asia/Dhaka');
//		$fdate=date("Y-m-d", strtotime($fdate));
//		$tdate=date("Y-m-d", strtotime($tdate));
//		$d=date('Y-m-d');
//		$t= date("H:i:s");
//		$d1=str_replace("-","",$d);
//		$t1=str_replace(":","",$t);
//		$ccid=$d1.$t1;
//		$sql = "INSERT INTO movement_insert VALUES ('$ccid','$userid','$lmauserid','$fdate','$tdate','$ftime','$ttime','$purpose','$location','1','$factoryid')";
//		$query = $this->db->query($sql);
//		return $query;
//	}

	public function movement_insert1($userid,$lmauserid,$depthuserid,$accuserid,$accheadid,$fdate,$tdate,$factoryid)
	{
		date_default_timezone_set('Asia/Dhaka');

		$fmy=strtotime($fdate);
		$month=date("F",$fmy);
		$year=date("Y",$fmy);
		$fdate=date("Y-m-d", strtotime($fdate));
		$tdate=date("Y-m-d", strtotime($tdate));
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d1=str_replace("-","",$d);
		$t1=str_replace(":","",$t);
		$ccid=$d1.$t1;
		$sql = "INSERT INTO movement_insert1 VALUES ('$ccid','$userid','$lmauserid','$depthuserid','$accuserid','$accheadid','$fdate','$tdate','1','$factoryid',CURDATE(),CURTIME(),'$month','$year','','','')";
		$query = $this->db->query($sql);
		return $query;
	}
	

	public function movement_list($userid)
	{
		$query = "SELECT SUM(taka) AS ctotal,movement_insert1.mid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
					movement_insert1.fdate,movement_insert1.tdate,
					movement_insert1.mstatus 
					FROM movement_insert1
					JOIN user ON user.userid=movement_insert1.userid
					LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
					WHERE movement_insert1.userid='$userid' AND movement_insert1.mstatus IN('1','2')
					GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function movement_bill_insert1($data)
	{
		date_default_timezone_set('Asia/Dhaka');
		$d=date('Y-m-d');
		$t= date("H:i:s");
		$d1=str_replace("-","",$d);
		$t1=str_replace(":","",$t);
		$ccid=$d1.$t1;
		$ccid = $ccid . $data['i'];
		$sql = "SELECT mid FROM movement_insert1 WHERE mid='$data[mtoken]'";
		$query = $this->db->query($sql);
		if ($query->num_rows() == 0) {
			return false;
		} else {
		$sql1 = "INSERT INTO movement_bill_insert1 VALUES ('$ccid','$data[mtoken]','$data[fplace]','$data[ftime]','$data[tplace]','$data[ttime]','$data[purpose]','$data[mode]','$data[taka]','$data[remarks]')";
		$query1 = $this->db->query($sql1);
		// $sql2 = "UPDATE movement_insert1 SET mstatus='2' WHERE mid='$data[mtoken]'";
		// $this->db->query($sql2);
		return $query1;
		}
	}
	public function movement_bill_details($mtoken)
	{
		$query = "SELECT * FROM movement_insert1
		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE movement_insert1.mid='$mtoken'
		ORDER BY mbillid ASC";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function movement_bill_update($data)
	{
		$sql = "UPDATE movement_bill_insert1 SET fplace='$data[fplace]',ftime='$data[ftime]',tplace='$data[tplace]',ttime='$data[ttime]',purpose='$data[purpose]',mode='$data[billtype]',taka='$data[taka]',remarks='$data[remarks]' WHERE mbillid='$data[mbillid]'";
		return $query = $this->db->query($sql);
	}
	public function movement_bill_check($mtoken)
	{
		$query = "SELECT * FROM movement_insert1
		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE movement_insert1.mid='$mtoken'";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function approval_pending_list_admin()
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE mstatus='2'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	
	public function approval_pending_list_linemanager($userid)
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE (movement_insert1.lmauserid='$userid' OR movement_insert1.depthheadid='$userid') AND mstatus='2'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function approval_pending_list_depthhead($userid)
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE movement_insert1.depthheadid='$userid' AND mstatus='2'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function approval_pending_list_user($userid)
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE movement_insert1.userid='$userid' AND mstatus='2'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function approval_pending_list_accounts($userid)
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE movement_insert1.accuserid='$userid' AND mstatus='3'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function approval_pending_list_accountshead($userid)
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE movement_insert1.accheadid='$userid' AND mstatus='3'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function approval_pending_list_accountscommon()
	{
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
		mid,mstatus 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE mstatus='3'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	public function movement_bill_approved($mtoken)
	{
		$sql = "UPDATE movement_insert1 SET mstatus='3' WHERE mid='$mtoken'";
		return $query = $this->db->query($sql);
	}
	public function movement_bill_reject($mtoken)
	{
		$sql = "UPDATE movement_insert1 SET mstatus='0' WHERE mid='$mtoken'";
		return $query = $this->db->query($sql);
	}
	public function movement_bill_acc_approved($mtoken)
	{
		$accappuser = $this->session->userdata('userid');
		$sql = "UPDATE movement_insert1 SET mstatus='4',accappdate=CURDATE(),accapptime=CURTIME(),accappuser='$accappuser' WHERE mid='$mtoken'";
		return $query = $this->db->query($sql);
	}
	public function date_wise_approval_list_depthhead($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN user ON user.userid=movement_insert1.depthheadid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND movement_insert1.depthheadid='$userid'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_list_linemanager($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND movement_insert1.lmauserid='$userid'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_list_admin($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,user.userid,name,user.lmauserid,user.depthheadid,user.accuserid,mid,mstatus,accappuser,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN user ON user.userid=movement_insert1.userid
		WHERE fdate BETWEEN '$pd' AND '$wd'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	
	public function date_wise_approval_list($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,user.userid,name,user.lmauserid,user.depthheadid,user.accuserid,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN user ON user.userid=movement_insert1.userid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (movement_insert1.lmauserid='$userid' OR movement_insert1.depthheadid='$userid' OR movement_insert1.userid='$userid')
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_list_user($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,user.userid,name,user.lmauserid,user.depthheadid,user.accuserid,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN user ON user.userid=movement_insert1.userid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND userid='$userid'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_list_accounts($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND movement_insert1.accuserid='$userid'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_list_accountshead($pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND movement_insert1.accheadid='$userid'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_list_accountscommon($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,mid,mstatus,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid 
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		WHERE fdate BETWEEN '$pd' AND '$wd'
		GROUP BY movement_insert1.mid";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function date_wise_approval_details_list($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT mid,fdate,tdate,billingunit,user.userid,name,departmentname,user.lmauserid,
		user.depthheadid,
		user.accuserid,mid,mstatus,accappuser,
				(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
				(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
				
				(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
				(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
				(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
				(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
				(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
				(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
				(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
				(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid,
				transit,transittype,taka,smonth,syear
				FROM movement_insert1
				JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
				JOIN user_department_details ON user_department_details.userid=movement_insert1.userid
				JOIN transitmode ON transitmode.tmid=movement_bill_insert1.mode
				JOIN transittype ON transittype.ttid=transitmode.ttid
				JOIN user ON user.userid=movement_insert1.userid
		WHERE fdate BETWEEN '$pd' AND '$wd'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function user_wise_approval_list($uid,$pd,$wd,$userid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT SUM(taka) AS ctotal,fdate,tdate,user.userid,name,user.lmauserid,user.depthheadid,user.accuserid,mid,mstatus,fdate,tdate  
		FROM movement_insert1
		JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN user ON user.userid=movement_insert1.userid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND lmauserid='$userid' AND userid='$uid'";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function bill_type_wise_summary_list($pd,$wd,$factoryid,$ttid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transittype,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		JOIN transittype ON transittype.ttid=transitmode.ttid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (billingunit='$factoryid' AND transitmode.ttid='$ttid' AND mstatus!=0)";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function bill_type_wise_summary_list_ttid($pd,$wd,$ttid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transittype,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		JOIN transittype ON transittype.ttid=transitmode.ttid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (transitmode.ttid='$ttid' AND mstatus!=0)";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function bill_type_wise_summary_list_factoryid($pd,$wd,$factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transittype,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		JOIN transittype ON transittype.ttid=transitmode.ttid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (billingunit='$factoryid' AND mstatus!=0)";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function bill_type_wise_summary_list_all($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transittype,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		JOIN transittype ON transittype.ttid=transitmode.ttid
		WHERE fdate BETWEEN '$pd' AND '$wd' AND  mstatus!=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function unit_wise_summary_list($pd,$wd,$factoryid,$tmid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (billingunit='$factoryid' AND tmid='$tmid' AND mstatus!=0)";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function unit_wise_summary_list_tmid($pd,$wd,$tmid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (tmid='$tmid' AND mstatus!=0)";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function unit_wise_summary_list_factoryid($pd,$wd,$factoryid)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  


 FROM movement_insert1

		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE fdate BETWEEN '$pd' AND '$wd' AND (billingunit='$factoryid' AND mstatus!=0)";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function unit_wise_summary_list_all($pd,$wd)
	{
		$pd = date("Y-m-d", strtotime($pd));
		$wd = date("Y-m-d", strtotime($wd));
		$query = "SELECT 

		fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,transit,remarks,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  
		FROM movement_insert1
		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE fdate BETWEEN '$pd' AND '$wd' AND mstatus!=0";
		$result = $this->db->query($query);
		return $result->result_array();
	}
	public function movement_bill_print($mid)
	{
		$query = "SELECT fdate,tdate,fplace,ftime,mid,mstatus,tplace,ttime,taka,purpose,billingunit,
		transit,remarks,accappuser,
		(SELECT name FROM user WHERE user.userid=movement_insert1.userid) AS username,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.userid) AS userid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.lmauserid) AS lname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.lmauserid) AS lid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.depthheadid) AS dname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.depthheadid) AS did,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accuserid) AS aname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accuserid) AS aid,
		(SELECT name FROM user WHERE user.userid=movement_insert1.accheadid) AS ahname,
		(SELECT userid FROM user WHERE user.userid=movement_insert1.accheadid) AS ahid  
		FROM movement_insert1
		LEFT JOIN movement_bill_insert1 ON movement_bill_insert1.mtoken=movement_insert1.mid
		JOIN transitmode ON transitmode.tmid= movement_bill_insert1.mode
		WHERE movement_insert1.mid='$mid'";
		$result = $this->db->query($query);
		
		//$sql1 = "UPDATE movement_insert SET mstatus='4' WHERE mid='$mid'";
//		$this->db->query($sql1);
		return $result->result_array();
	}
}
