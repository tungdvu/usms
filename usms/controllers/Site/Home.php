<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * version 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 * 09/01/2017
 */

class Home extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library(array('MY_Encrypt'));
        $this->load->model(array('Site/model_magazineSite','model_magazine'));
    }

    public function index(){
        $html = $this->flayout->loadTop();
        $html .= $this->load->view('frontend/homepage',NULL,true);
        $html .= $this->flayout->loadFooter();

        $this->flayout->title('USMS - Quản lý khoa học công nghệ');
        $this->flayout->view($html);
    }

    public function searchMagazine(){
        $this->load->config('pagination');
        $this->load->library('pagination');
        $config = $this->config->item('pagination');

        $this->form_validation->set_rules('Name','Tên bài báo','trim');
        if(isset($_GET['submit'])){

            $name = ($this->input->get('Name') !== "") ? trim($this->input->get('Name')) :"";
            $magazine_name = ($this->input->get('Magazine_Name') !== "") ? trim($this->input->get('Magazine_Name')): "";
            $magazine_no = ($this->input->get('Magazine_No') !== "") ? trim($this->input->get('Magazine_No')) :"";
            $magazine_year = ($this->input->get('Magazine_Year') !== "") ? trim($this->input->get('Magazine_Year')) : "";
            $author = ($this->input->get('Author_Name')) ? trim($this->input->get('Author_Name')) : "";
            
            $data = array( $name,$magazine_name,$magazine_no,$magazine_year,$author );

            $config['total_rows'] = count($this->model_magazineSite->getSearch($data));
            $config['page_query_string'] = TRUE;
            $config['use_page_numbers'] = TRUE;
            $config['query_string_segment'] = 'page';
            $config['per_page'] = 10;
            $config['full_tag_open']='<div class="row"><div class="col-xs-12"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination pull-right" style = "float:left!important;">';
            // $config['base_url'] = is_bool(strpos(getCurrentUrl(),"&"))?getCurrentUrl():substr(getCurrentUrl(),0,strpos(getCurrentUrl(),"&"));
            $config['base_url'] = getCurrentUrl();            
            $total_page=ceil($config['total_rows']/$config['per_page']);
            $page = (int)$this->input->get('page');
            $page = ($page>$total_page)?$total_page:$page;
            $page = ($page<1)?1:$page;
            $page = $page-1;
            $this->pagination->initialize($config);
            $data['list_paginition'] = $this->pagination->create_links();
            if($config['total_rows']>0){
                $datasearch = $this->model_magazineSite->getSearch($data,($page*$config['per_page']),$config['per_page']);
            }else{
                $datasearch = $this->model_magazineSite->getSearch($data);
            }
            
            $data['datasearch'] = $datasearch;
            $data['count'] = ($this->model_magazineSite->getSearch($data) !== NULL) ? count($this->model_magazineSite->getSearch($data)) : 0;            
            //var_dump($data['count']);die;
        }

        $html = $this->flayout->loadTop();
        $html .= $this->load->view('frontend/homepage',isset($data) ? $data : "",true);
        $html .= $this->flayout->loadFooter();

        $this->flayout->title('USMS - Quản lý khoa học công nghệ');
        $this->flayout->view($html);
    }

    public function MagazineView()
    {
        
        if($this->uri->total_segments() < 4){
            redirect('/Site/Home');
        }else{
            $magazineID = $this->encrypt->decode($this->uri->segment(4));
        }
        //var_dump($magazineID);die;
        $data['magazines'] = $this->model_magazineSite->getMagazineByID($magazineID);
        $data['files'] = $this->model_magazine->getFileByID($magazineID);
        //var_dump($data['files']);die;

        $html = $this->flayout->loadTop();
        $html .= $this->load->view('frontend/singleMagazineView',isset($data) ? $data : "",true);
        $html .= $this->flayout->loadFooter();

        $this->flayout->title('USMS - Xem chi tiết bài báo khoa học');
        $this->flayout->view($html);

    }    
}
?>
