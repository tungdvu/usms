<?php
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 27-12-2016
 */
class Model_permit extends MY_Model
{
	private $_acount = "s_account";
	private $_user = "s_user";
	function __construct()
	{
		parent::__construct();
	}

	function getUserInfo($userID)
	{
		if((int)$userID > 0)
		{
			// $query = "SELECT * FROM" .$this->_acount." WHERE ID = '".$userID."'";
			// $data = $this->getRows($query);
			// return isset($data[0])?$data[0]:NULL;
			$this->db->select('a.*, u.*');
			$this->db->from($this->_acount.' a');
			$this->db->where('a.User_ID',$userID);
			$this->db->join($this->_user.' u','a.User_ID = u.User_ID', 'LEFT');
			$query = $this->db->get();
			$data = $query->result();
			return isset($data[0]) ? $data[0] : NULL;
		} 
		return NULL;
	}
}
?>