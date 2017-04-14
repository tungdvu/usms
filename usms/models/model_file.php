<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_file extends CI_Model{
	
	function delete_files($array){
		$data = array();
		if(isset($array) && is_array($array) && count($array)){
			$data = $this->db->select('ID, Filename')->from('s_files')->where(array('F_ID'=>0,'Filename'=>'Filename'))->where_not_in('ID',$array)->get()->result_array();
		}else{
			$data = $this->db->select('ID, Filename')->from('s_files')->where(array('F_ID'=>0,'Filename'=>'Filename'))->get()->result_array();
		}
		if(count($data)){
			foreach($data as $key => $val){
				$path_to_file = './uploads/attachments/'.$val['value'];
				//$path_to_file2 = './uploads/attachments/thumb__'.$val['value'];
				if(file_exists($path_to_file)){
					unlink($path_to_file);
				}
				if(file_exists($path_to_file2)){
					unlink($path_to_file2);
				}
				$this->db->delete('s_files',array('ID'=> $val['ID']));
			}
		}
	}
	
}
