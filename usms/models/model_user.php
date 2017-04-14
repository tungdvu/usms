<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 2016-11-30
 */
class Model_user extends MY_Model {
	private $_user = 's_user';
	private $_department = "s_department";
	private $_brch = "s_brch";
	private $_position = "s_position";

	function __construct(){
        parent::__construct();
    }

    function getUser()
    {
    	$this->db->select('a.*, b.Name AS DepartmentName');
    	$this->db->from($this->_user.' a');
    	$this->db->join($this->_department.' b','a.Department_ID = b.ID' ,'LEFT');
    	return $this->db->get()->result();
    }

	public function getUserById($id)
	{
		$this->db->select('u.*,d.Name AS DepartmentName, b.Name AS Branch, p.Name as Position');
		$this->db->from($this->_user.' u');
		$this->db->join($this->_department.' d','u.Department_ID = d.ID', 'LEFT');
		$this->db->join($this->_brch. ' b','u.Place_ID = b.ID','LEFT');
		$this->db->join($this->_position. ' p','u.Position_ID = p.ID','LEFT');
		$this->db->where('User_ID',$id);
		$this->db->limit(1);
		return $this->db->get()->result();
	}
	public function GetUserInfo($id)
	{
		$this->db->select('birthday');
		$this->db->from($this->_user);
		$this->db->where('User_ID',$id);
		return $this->db->get()->row()->birthday;
	}

	public function getBranch()
	{
		$this->db->select('*')->from($this->_brch);
		return $this->db->get()->result_array();
	}
	public function getPosition()
	{
		$this->db->select('*')->from($this->_position);
		return $this->db->get()->result_array();
	}
	public function updateUser($uid,$data) 	    
	{
		if ((int)$uid > 0)
		{
			$this->db->where('User_ID', $uid);
			$this->db->update($this->_user, $data);
			return true;
		} else return false;		
	}
	public function deleteUser($id)	
	{
		$this->db->where('id',$id);
		$this->db->delete($this->_user);
		return TRUE;
	}
	public function totalUser()
	{
		$this->db->select('u.*, d.Name AS DepartmentName');
		$this->db->from($this->_user.' u');
		$this->db->join($this->_department.' d','u.Department_ID = d.ID', 'LEFT');
		return $this->db->get()->result_array();
	}	
}