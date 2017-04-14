<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 16/12/2016
 */
    function __construct(){
        parent::__construct();
        $CI =& get_instance();            
        $this->load->helper(array('form','url'));
        $this->load->library(array('MY_Encrypt','form_validation','session'));    
        $this->load->model('model_magazine');

    }
    if(!function_exists('getName')){
    	function getName($id){
			//get main CodeIgniter object
    		$ci =& get_instance();
			//load databse library
    		$ci->load->database();
    		$query = $ci->db->get_where('s_user',array('User_ID'=>$id));
    		if($query->num_rows() > 0){
    			$result = $query->row_array();
    			return $result['Name'];
    		}else{
    			return false;
    		}    		
    	}

    }




?>
