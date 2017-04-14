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
class Model_scienceuni extends MY_Model {
	private $_tbl = 's_science_uni';
	private $_sm = 's_magazine';
	private $_user = 's_user';
	private $_file = 's_files';
	private $_research = "s_research_area";

	function __construct(){
        parent::__construct();
    }
	
	function addMagazine($data,$current_file)
	{
		$this->do_upload();
		$upload_data = $this->upload->data();
		$file_name =   $upload_data['file_name'];

		$this->db->insert($this->_sm,$data);
		$flag = $this->db->affected_rows();
		if($flag>0){
			$result = array(
				'type'=>'successful',
				'message' => 'Thêm thành công'
			);
		}else{
			$result = array(
				'type'=>'error',
				'message' => 'Thêm thất bại, vui lòng thử lại'
			);
		}
		$last_id = $this->db->insert_id();
        
        $relate_user = $this->input->post('User_Relate_ID');
        $relate = $relate_user !== FALSE ? $relate_user : array();
        $data2 = array(
            'Magazine_ID' => $last_id,
            'User_ID' => $this->input->post('User_ID'),
            'User_Relate_ID' => json_encode($relate),
        );
        $this->db->insert($this->_smu,$data2);	
        $flag2 = $this->db->affected_rows();
		
		$this->db->flush_cache();
		if(isset($current_file) && is_array($current_file) && count($current_file)){
			$data = array();
			foreach($current_file as $key => $val){
				$data[] = array(
					'ID' => $val,
					'F_ID' => $last_id,
					'Created' => date('Y:m:d H:m:s'),
					'Type' => 1,
					'Status' => 1,
				); 
			}
			$this->db->update_batch($this->_file, $data, 'ID'); 
		}

        //if($flag2) {return TRUE;}else{return FALSE;}
        return $result;

	}
    
    function do_upload()
    {
        $config['upload_path'] = './uploads/attachments';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240000';
        $config['max_width']  = '10240';
        $config['max_height']  = '76800';
        $config['encrypt_name'] = 'false';
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
        }

    }

	function getAll()
	{
		$this->db->select('m.*, u.Name AS Author, smu.User_ID AS Author_ID, smu.User_Relate_ID AS RelateUser_ID, rs.Name as ResearchArea, f.Filename AS File');
		$this->db->from($this->_sm.' m');
		$this->db->join($this->_smu.' smu', 'm.ID  = smu.Magazine_ID','LEFT');
		$this->db->join($this->_user.' u','smu.User_ID = u.User_ID','LEFT');
		$this->db->join($this->_research.' rs', 'm.ResearchArea_ID = rs.ID', 'LEFT');
		$this->db->join($this->_file.' f', 'm.ID = f.F_ID', 'LEFT');
		$this->db->order_by('Magazine_Year', 'ASC');
		return $this->db->get()->result();	
	}
	function getMagazineByID($id)
	{
		$this->db->select('m.*, u.Name AS Author,u.Image_Path AS Avatar, u.Education,u.Email, smu.User_ID AS Author_ID, smu.User_Relate_ID AS RelateUser_ID, rs.Name as ResearchArea');
		$this->db->from($this->_sm.' m');
		$this->db->join($this->_smu.' smu', 'm.ID  = smu.Magazine_ID','LEFT');
		$this->db->join($this->_user.' u','smu.User_ID = u.User_ID','LEFT');
		$this->db->join($this->_research.' rs', 'm.ResearchArea_ID = rs.ID', 'LEFT');
		$this->db->where('m.ID',$id);
		$data = $this->db->get()->result();
		return isset($data[0]) ? $data[0] : NULL;
	}
	function getFileByID($id)
	{
		$this->db->select('Filename');
		$this->db->from($this->_file);
		$this->db->where('F_ID',$id);
		$data = $this->db->get()->result();
		return isset($data) ? $data : NULL;
	}
	function countAllMagazine()
	{
		$this->db->select('*');
		$this->db->from($this->_sm);
		$data = $this->db->get();
		return isset($data->num_rows) ? $data->num_rows : NULL;
	}
	function getCountByAuthor($authorID)
	{
		$this->db->select('*');
		$this->db->from($this->_sm);
		$this->db->where('User_ID',$authorID);
		$data = $this->db->get();
		return isset($data->num_rows) ? $data->num_rows : NULL;
	}		

	public function getReasearchArea($field=array())
	{
		$this->db->select($field);
		$this->db->from($this->_research)->order_by('ID', 'ASC');
		return $this->db->get()->result_array();
	}
	public function getReasearchAreaForReport($field=array())
	{
		$result = array();
		$this->db->select($field);
		$this->db->from($this->_research)->order_by('ID', 'ASC');
		$query = $this->db->get();
		foreach($query->result_array() as $value){
			$result[] = $value['ID'];
		}
		return $result;
	}
	public function deleteMagazine($id)	
	{
		$this->db->where('ID',$id);
		$this->db->delete($this->_sm);

	}	
	public function deleteMagazineUser($id)	
	{
		$this->db->where('Magazine_ID',$id);
		$this->db->delete($this->_smu);

	}	
	public function deleteFile($M_id){
		$data = array();
		$data = $this->db->select('ID, Filename')->from('s_files')->where('F_ID',$M_id)->get()->result_array();
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
				$this->db->delete('s_files',array('F_ID'=> $M_id));
			}
		}
	}
	public function updateMagazine($id,$data)
	{
		if ((int)$id > 0)
		{
			//update SM
			$this->db->where('ID', $id);
			if($this->db->update($this->_sm, $data)){
			//update SMU
			    $relate_user = $this->input->post('User_Relate_ID');
			    $relate = $relate_user !== FALSE ? $relate_user : array();
			    $data2 = array(
			          'User_ID' => $this->input->post('User_ID'),
			          'User_Relate_ID' => json_encode($relate),
			      );
			    $this->db->where('Magazine_ID', $id);
				$this->db->update($this->_smu, $data2);
			}
      
			return true;
		} else return false;
	}

}