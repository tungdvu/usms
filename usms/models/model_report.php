<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 26/12/2016
 */
class Model_report extends MY_Model {
	private $_smu = 's_magazine_user';
	private $_sm = 's_magazine';
	private $_user = 's_user';
	private $_file = 's_files';
	private $_research = "s_research_area";

	function __construct(){
        parent::__construct();
    }
	
	function getMagazineByTypeArea($type_area = array())
	{
		$result = array();
		if(is_array($type_area) && !empty($type_area)){
			foreach ($type_area as $key) {
				$this->db->select('*')
						->from($this->_sm)
						->where('Type_Area',$key);
				$query = $this->db->get();
				$result[] = $query->num_rows();
			}
			return $result;
		}
	}
	function getMagazineByReasearchArea($research_area = array())
	{
		$result = array();
		if(is_array($research_area) && !empty($research_area)){
			foreach ($research_area as $key) {
				$this->db->select('*')
						->from($this->_sm)
						->where('ResearchArea_ID',$key);
				$query = $this->db->get();
				$result[] = $query->num_rows();
			}
			return $result;
		}

		// $result = array();
		// $this->db->select('*')
		// 		->from($this->_sm)
		// 		->where('ResearchArea_ID',$research_area);
		// $query = $this->db->get();
		// $result[] = $query->num_rows();
		// return $result;		
	}	
	function getMagazineByYear($year = array(),$type_area)
	{
		$result = array();
		if(is_array($year) && !empty($year)){
			foreach ($year as $key) {
				$this->db->select('*')
						->from($this->_sm)
						->where('Magazine_Year',$key)
						->where('Type_Area',$type_area);
				$query = $this->db->get();
				$result[] = $query->num_rows();
			}
			return $result;
		}

	}	

}