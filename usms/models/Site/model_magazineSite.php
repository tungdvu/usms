<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 09/01/2017
 */
class Model_magazineSite extends CI_Model {
	//private $_account = 's_account';
	private $_tbl = 's_magazine';
	private $_user = 's_user';
	private $_smu = 's_magazine_user';
	private $_file = 's_files';
	private $_research = "s_research_area";

	function __construct(){
        parent::__construct();
    }
	
	function getSearch($data,$start = NULL,$limit = NULL) { //$key = '', $siteid = 0, $langCode = 'vn', $start = NULL, $limit = NULL
		if(is_array($data)){

			$this->db->select('s.*, u.Name as Author');
			$this->db->from($this->_tbl.' s');
			$this->db->join($this->_user.' u', 's.User_ID = u.User_ID', 'LEFT');
			
			$this->db->like('s.Magazine_Year',$data[3]);
			$this->db->like('s.Name', $data[0]);
			$this->db->like('s.Magazine_Name',$data[1]);
			$this->db->like('s.Magazine_No',$data[2]);
			$this->db->like('u.Name', $data[4]);
			
			if( isset($start) && isset($limit) && is_numeric($start) && is_numeric($limit)){
				$this->db->limit($limit, $start);
			}
			$this->db->order_by('s.Magazine_Year','DESC');
			$query = $this->db->get();
			return $query->result();
		}
	}

	function getMagazineByID($id)
	{
		$this->db->select('m.*, u.Name AS Author,u.Image_Path AS Avatar, u.Education,u.Email, smu.User_ID AS Author_ID, smu.User_Relate_ID AS RelateUser_ID, rs.Name as ResearchArea');
		$this->db->from($this->_tbl.' m');
		$this->db->join($this->_smu.' smu', 'm.ID  = smu.Magazine_ID','LEFT');
		$this->db->join($this->_user.' u','smu.User_ID = u.User_ID','LEFT');
		$this->db->join($this->_research.' rs', 'm.ResearchArea_ID = rs.ID', 'LEFT');
		$this->db->where('m.ID',$id);
		$data = $this->db->get()->result();
		return isset($data[0]) ? $data[0] : NULL;
	}	



	}