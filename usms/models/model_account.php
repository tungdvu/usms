<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */
class Model_account extends CI_Model {
	//private $_account = 's_account';
	private $_tbl = 's_account';
	private $_user = 's_user';
	private $_group = 's_account_group';

	function __construct(){
        parent::__construct();
    }
	
	function total($para_where=NULL) {
		$this->db->from($this->_tbl);
		if(isset($para_where)&&count($para_where)){
			$this->db->where($para_where);
		}
		return $this->db->count_all_results();
	}

	function totalAccount($field,$where)
	{
		$this->db->select($field);
		$this->db->from($this->_tbl);
		$this->db->where($field,$where);
		$count = $this->db->get()->num_rows();
		if($count > 0) return TRUE; else return FALSE;
	}

	function get($select = 'email',$para_where=NULL){
		$this->db->select($select)->from($this->_tbl);
		if(isset($para_where)&&count($para_where)){
			$this->db->where($para_where);
		}
		return $this->db->get()->row_array();
	}	
	function getAccount()
	{
		$this->db->select('a.*, b.Name, g.Name as GroupName');
		$this->db->from($this->_tbl.' a');
		$this->db->join($this->_user. ' b','a.User_ID = b.User_ID','LEFT');
		$this->db->join($this->_group. ' g','g.ID = a.Group_ID','LEFT');
		return $this->db->get()->result();
	}	
	function getAccountByID()
	{
		$this->db->select('a.*,u.Birthday');
		$this->db->from($this->_tbl.' a');
		$this->db->join($this->_user.' u','a.User_ID = u.User_ID','LEFT');
		$data = $this->db->get()->result();
		return isset($data[0]) ? $data[0] : "";
	}

	function getGroupAccount()
	{
		$this->db->select('*');
		$this->db->from($this->_group);
		return $this->db->get()->result();
	}

	function insertAccount($data)
	{
		$this->db->insert($this->_tbl,$data);
		$flag = $this->db->affected_rows();
		if($flag>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	function deleteAccount($id)	
	{
		$this->db->where('ID',$id);
		$this->db->delete($this->_tbl);
		return TRUE;
	}	

	function getEmail($email)
	{
		$this->db->select(array('ID','Email'));
		$this->db->where('Email', $email);
		$this->db->from($this->_tbl);
		$data = $this->db->get()->result_array();
		if($data){
			//return TRUE;
			return $data;
		}else{
			return FALSE;
		}
	}

	function checkoldpass($uid, $pass) 
	{
		if ((int)$uid > 0)
		{
			$this->db->select('*');
			$this->db->from($this->_tbl);
			$this->db->where('ID', $uid);
			$data = $this->db->get()->result_array();
			if (!empty($data[0]))
			{
				$password = $data[0]['Password'];
				$salt = $data[0]['Salt'];
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
			$this->db->update($this->_tbl, array('Password' => $password, 'Salt' => $salt)); 
			return true;
		} return false;
	}		




}