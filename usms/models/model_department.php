<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 2016-11-25
 */
class Model_department extends MY_Model {
	private $_tbl = 's_department';

	function __construct(){
        parent::__construct();
    }
		
	function getDepartment()
	{
		$sql = "SELECT a.ID, a.Name, COALESCE(b.Name,'-') AS 'ParentName' FROM s_department AS a LEFT JOIN s_department AS b on a.Parent_ID = b.ID ORDER BY Name ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getRootDepartment()
	{
		$sql = "SELECT a.ID, a.Name, a.Key, COALESCE(b.Name,'-') AS 'ParentName' FROM s_department AS a LEFT JOIN s_department AS b on a.Parent_ID = b.ID WHERE a.Parent_ID = 0 ORDER BY ParentName ASC ";
		$query = $this->db->query($sql);
		return $query->result();
	}	

	function getDepartmentById($id)
	{
		$sql = "SELECT a.ID, a.Name, a.Key, a.Parent_ID, COALESCE(b.Name,'-') AS 'ParentName' FROM s_department AS a LEFT JOIN s_department AS b on a.Parent_ID = b.ID WHERE a.id= ?" ;
		$query = $this->db->query($sql,array($id));
		return $query->result_array();		
	}

	function getKeyDepartment()
	{
		$sql = "SELECT a.Key FROM s_department AS a GROUP BY a.Key" ;
		$query = $this->db->query($sql);
		return $query->result_array();			
	}

	function totalDepartment($field=array())
	{
		$this->db->SELECT($field);
		$this->db->FROM($this->_tbl);
		$this->db->WHERE('Parent_ID =',0);
		return $this->db->get()->result_array();

	}
	
	function addDepartment($data)
	{
		$this->_add($this->_tbl,$data);
		return TRUE;
	}
	function updateDepartment($uid, $data)
	{
		if ((int)$uid > 0)
		{
			$this->db->where('id', $uid);
			$this->db->update($this->_tbl, $data);
			return true;
		} else return false;
	}
	function getChildDepartment($id)
	{
		$this->db->SELECT('*');
		$this->db->FROM($this->_tbl);
		$this->db->WHERE('Parent_ID', $id);
		$result = $this->db->get()->num_rows();
		if($result > 0){return TRUE;}else{return FALSE;}
	}
	function deleteDepartment($id)	
	{
		$this->db->where('id',$id);
		$this->db->delete($this->_tbl);
		return TRUE;
	}

	function user()//lay user tu host de import
	{
		$this->db->select('*');
		$this->db->from('utt_users_host');
		return $this->db->get()->result_array();
	}


	function get($select = 'email',$para_where=NULL){
		$this->db->select($select)->from($this->_tbl);
		if(isset($para_where)&&count($para_where)){
			$this->db->where($para_where);
		}
		return $this->db->get()->row_array();
	}

	function getEmail($email)
	{
		$this->db->select(array('id','email'));
		$this->db->where('email', $email);
		$this->db->from($this->_tbl);
		$data = $this->db->get()->result_array();
		if($data){
			//return TRUE;
			return $data;
		}else{
			return FALSE;
		}
	}


	public function register(){
		$salt = random_string('alnum',255);
		$password = $this->input->post('password');
		$password_encode = md5(md5(md5($password).md5($salt)));
		$date_to_int = time();
		$this->db->insert($this->_tbl,array(
			'username' =>$this->input->post('username'),
			'email' =>$this->input->post('email'),
			'password'=>$password_encode,
			'salt'=>$salt,
			'time_create'=>$date_to_int,
			'fullname'=>$this->input->post('fullname'),
			'address'=>$this->input->post('address'),
			'phone' => $this->input->post('telephone'),
			'permit' =>$this->input->post('permit')
		));
		$flag = $this->db->affected_rows();
		if($flag>0){
			return array(
				'type'=>'successful',
				'message' => 'Thêm thành công'
			);
		}
		else
		{
			return array(
				'type'=>'error',
				'message' => 'Thêm thất bại'
			);
		}
	}

	function checkoldpass($uid, $pass) 
	{
		if ((int)$uid > 0)
		{
			$this->db->select('*');
			$this->db->from($this->_tbl);
			$this->db->where('id', $uid);
			$data = $this->db->get()->result_array();
			if (!empty($data[0]))
			{
				$password = $data[0]['password'];
				$salt = $data[0]['salt'];
				$password_encode = md5(md5(md5($pass).md5($salt)));
				if ($password == $password_encode) return true;
			} else return false;
		} else return false;
	}

	function changepass($uid, $newpass)
	{
		if ((int)$uid > 0)
		{
			$salt = md5(time('Y').time('m').time('d').time('s'));
			$password = md5(md5(md5($newpass).md5($salt)));
			$this->db->where('id', $uid);
			$this->db->update($this->_tbl, array('password' => $password, 'salt' => $salt)); 
			return true;
		} return false;
	}		




}