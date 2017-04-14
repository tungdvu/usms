<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * USMS - He thong quan ly khoa hoc cong nghe (UTT)
 * v 1.0
 * @author TungVu
 * @email  tungnv249@gmail.com
 * @url    facebook.com/mr.tungnv
 */

class Dashboard extends MY_Controller{
    private $authentication;
    function __construct(){
        parent::__construct();
        $this->load->library('USMSLayout');
        $this->permit->authentication();
        $this->load->model(array('model_report','model_magazine'));
    }

    public function index(){

        $this->layout->css('template/assets/examples/css/charts/chartjs.css');        
        $this->layout->js('template/global/js/Plugin/panel.js');


        $this->layout->title('USMS - Hệ thống Quản lý hoạt động Khoa học Công nghệ');
        $html = $this->usmslayout->loadTop();
        $html .= $this->usmslayout->loadMenu();
        $html .= $this->load->view('backend/layout/content',NULL,true);
        $html .= $this->usmslayout->loadFooter('backend/layout/footer');
        $this->layout->view($html);
    }

    public function getReportMagazineByTypeArea()
    {
        $array = $this->model_report->getMagazineByTypeArea(array(0,1));
        echo json_encode($array);
    }
    public function getReportMagazineByResearchArea()
    {
        $ids = $this->model_magazine->getReasearchAreaForReport('ID');
        $array = $this->model_report->getMagazineByReasearchArea($ids);
        echo json_encode($array);
    }    
    public function getReportMagazineByYear()
    {
        $array = array();
        $array[] = $this->model_report->getMagazineByYear(array("2011", "2012","2013","2014","2015","2016"),0);
        $array[] = $this->model_report->getMagazineByYear(array("2011", "2012","2013","2014","2015","2016"),1);
        echo json_encode($array);
    }         

    public function checklog() {
        /**
         * highly advised that you use authentification
         * before running this controller to keep the world out of your logs!!!
         * you can use whatever method you like does not have to be logs
         */
        $authentication = $this->session->userdata('authentication');
        $user = json_decode($authentication,TRUE);
        if($user['permit'] == -1) {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $this->load->library('fire_log');
        } else {
            redirect('admin/authentication');
        }
    }

    function __destruct(){
        //$this->permit->checkSelectSite();
    }
}
?>
