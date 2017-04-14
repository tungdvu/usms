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

	function __construct(){
        parent::__construct();
    }
	
	function getSearch($data,$params = array()) { //$key = '', $siteid = 0, $langCode = 'vn', $start = NULL, $limit = NULL
		if(is_array($data)){

			$this->db->select('s.*, u.Name as Author');
			$this->db->from($this->_tbl.' s');
			$this->db->join($this->_user.' u', 's.User_ID = u.User_ID', 'LEFT');
			
			$this->db->like('s.Magazine_Year',$data[3]);
			$this->db->like('s.Name', $data[0]);
			$this->db->like('s.Magazine_Name',$data[1]);
			$this->db->like('s.Magazine_No',$data[2]);
			$this->db->like('u.Name', $data[4]);
			
        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit'],$params['start']);
        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
            $this->db->limit($params['limit']);
        }

			$result = array();

			$query = $this->db->get();
			//$result['count'] = $query->num_rows();
			//$result['data'] = $query->result();
			return $query->result();
			
			//return $this->db->count_all_results();			



			//$sql = "*, (SELECT Name FROM s_user WHERE s_magazine.User_ID = s_user.User_ID) AS AuthorName FROM s_magazine";

			//$query="from_id, (SELECT COUNT(id) FROM user_messages WHERE from_id=1223 AND status=1) AS sent_unread,
            //(SELECT COUNT(id) FROM user_messages WHERE from_id=1223 AND status=2) AS sent_read";

			// $query = $this->db->select($sql);
			// $query->like('AuthorName', $data[0]);
			// $query->like('Magazine_Name',$data[1]);
			// $query->like('Magazine_No',$data[2]);			
			// $query->where('Magazine_Year',$data[3]);
			// // $result = $query_run->get('user_messages');
			// $result = $query->get();
			// return $result->result();



				// $this->db->select('*,(select Name from s_users where )');
				// $this->db->from($this->_tbl);

				// $this->db->like('Name', $data[0]);
				// $this->db->like('Magazine_Name',$data[1]);
				// $this->db->like('Magazine_No',$data[2]);
				// $this->db->where('Magazine_Year',$data[3]);
				// return $this->db->count_all_results();
		}
	}



	}