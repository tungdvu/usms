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
        $this->load->model(array('Site/model_magazineSite'));
        $this->load->library('Ajax_pagination');
        $this->perPage = 3;
    }

    public function index(){

        //$this->layout->css('template/assets/examples/css/charts/chartjs.css');        
        //$this->layout->js('template/global/js/Plugin/panel.js');        

        $html = $this->flayout->loadTop();
        $html .= $this->load->view('frontend/homepage',NULL,true);
        $html .= $this->flayout->loadFooter();

        $this->flayout->title('USMS - Quản lý khoa học công nghệ');
        $this->flayout->view($html);
    }

    public function searchMagazine(){

        $this->form_validation->set_rules('Name','Tên bài báo','trim');
        if($this->form_validation->run()){

            $name = ($this->input->post('Name') !== "") ? $this->input->post('Name') :"";
            $magazine_name = ($this->input->post('Magazine_Name') !== "") ? $this->input->post('Magazine_Name'): "";
            $magazine_no = ($this->input->post('Magazine_No') !== "") ? $this->input->post('Magazine_No') :"";
            $magazine_year = ($this->input->post('Magazine_Year') !== "") ? $this->input->post('Magazine_Year') : "";
            $author = ($this->input->post('Author_Name')) ? $this->input->post('Author_Name') : "";
            $data = array( $name,$magazine_name,$magazine_no,$magazine_year,$author );

            $this->session->set_flashdata('data',$data);
            //var_dump($data);
        //$datasearch = $this->model_magazineSite->getSearch($data);
        //$data['datasearch'] = $datasearch;
        //var_dump($data['datasearch']);die;


        $total_rows = count($this->model_magazineSite->getSearch($data));
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Site/Home/ajaxPaginationData';
        $config['total_rows']  = $total_rows;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);

        //get the posts data
        $data['datasearch'] = $this->model_magazineSite->getSearch($data,array('limit'=>$this->perPage));
        $data['count'] = count($this->model_magazineSite->getSearch($data));

        //var_dump($data['datasearch']);die;
        }

        $html = $this->flayout->loadTop();
        $html .= $this->load->view('frontend/homepage',isset($data) ? $data : "",true);
        $html .= $this->flayout->loadFooter();

        $this->flayout->title('USMS - Quản lý khoa học công nghệ');
        $this->flayout->view($html);
    }

public function ajaxPaginationData(){
        $page = $this->input->post('page');
        if(!$page){
            $offset = 0;
        }else{
            $offset = $page;
        }
        $data = $this->session->flashdata('data');
        //total rows count
        $total_rows = count($this->model_magazineSite->getSearch($data));
        
        //pagination configuration
        $config['target']      = '#postList';
        $config['base_url']    = base_url().'Site/Home/ajaxPaginationData';
        $config['total_rows']  = $total_rows;
        $config['per_page']    = $this->perPage;
        $this->ajax_pagination->initialize($config);
        
        //get the posts data
        $data['datasearch'] = $this->model_magazineSite->getSearch($data,array('start'=>$offset,'limit'=>$this->perPage));
        
        //load the view
        $this->load->view('frontend/magazine/ajax-pagination-data', $data, false);
    }        
}
?>
