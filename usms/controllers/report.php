<?php

class Report extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('excel');
        $this->load->model('teacher_model');
    }

    function index()
    {
        //var_dump(123);
    }

    function export_nckn()
    {
        $data['nckh'] = $this->teacher_model->getNCKH();
        $data['baibao'] = $this->teacher_model->getBaibao();
        //var_dump($data);


    //     $this->excel->setActiveSheetIndex(0);
    //     $this->excel->getActiveSheet()->setTitle('Report_NCKH');
    //     //$this->excel->getActiveSheet()->getProtection()->setPassword('');//Pass
    //     $this->excel->getDefaultStyle()->getFont()->setName('Times New Roman'); //Font
    //     $this->excel->getDefaultStyle()->getFont()->setSize(11);// Font size 


    // $heading=array('Họ tên','Đề tài','Năm hoàn thành','Cấp','Trách nhiệm');
    
    // //Create a new Object
    // $objPHPExcel = new PHPExcel();
    // $objPHPExcel->getActiveSheet()->setTitle('Report_NCKH');
    // //Loop Heading
    // $rowNumberH = 1;
    // $colH = 'A';
    // foreach($heading as $h){
    //     $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
    //     $colH++;    
    // }
    // //Loop Result
    // $totn=$nilai->num_rows();
    // $maxrow=$totn+1;
    // $nil=$nilai->result();
    //             $row = 2;
    //     $no = 1;
    //     foreach($nil as $n){
    //         //$numnil = (float) str_replace(',','.',$n->nilai);
    //         $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
    //         $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n->nim);
    //         $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->nama);
    //         $objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$row,$n->benar,PHPExcel_Cell_DataType::TYPE_NUMERIC);
    //         $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$row,$n->salah,PHPExcel_Cell_DataType::TYPE_NUMERIC);
    //         $objPHPExcel->getActiveSheet()->getStyle('F'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
    //         $objPHPExcel->getActiveSheet()->setCellValueExplicit('F'.$row,$n->nilai,PHPExcel_Cell_DataType::TYPE_NUMERIC);
    //         $row++;
    //         $no++;
    //     }
    // //Freeze pane
    // $objPHPExcel->getActiveSheet()->freezePane('A2');
    // //Cell Style
    // $styleArray = array(
    //     'borders' => array(
    //         'allborders' => array(
    //             'style' => PHPExcel_Style_Border::BORDER_THIN
    //         )
    //     )
    // );
    // $objPHPExcel->getActiveSheet()->getStyle('A1:F'.$maxrow)->applyFromArray($styleArray);
    // //Save as an Excel BIFF (xls) file
    // $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');

    // header('Content-Type: application/vnd.ms-excel');
    // header('Content-Disposition: attachment;filename="Nilai-'.$nama_sesi.'-'.$nama_blok.'-'.$tgl.'.xls"');
    // header('Cache-Control: max-age=0');

    // $objWriter->save('php://output');
    // exit();            

        $html = $this->load->view('nckh', $data, true);
        $this->layout->view($html);

    }    

}































// public function export_nilai_sesi(){
//     $id=$this->uri->segment(3);
//     $this->load->model('m_user');
//     $mhs=$this->m_user->edit_sesi($id);
//     foreach($mhs->result() as $m):
//         $nama_sesi=$m->nama_sesi;
//         $nama_blok=$m->nama_blok;
//         $tgl=$m->tgl;
//     endforeach;
//     $nilai=$this->m_user->lihat_nilai_sesi($id);
//     $heading=array('No','NIM','Mahasiswa','Benar','Salah','Nilai');
//     $this->load->library('PHPExcel');
//     //Create a new Object
//     $objPHPExcel = new PHPExcel();
//     $objPHPExcel->getActiveSheet()->setTitle($nama_sesi);
//     //Loop Heading
//     $rowNumberH = 1;
//     $colH = 'A';
//     foreach($heading as $h){
//         $objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
//         $colH++;    
//     }
//     //Loop Result
//     $totn=$nilai->num_rows();
//     $maxrow=$totn+1;
//     $nil=$nilai->result();
//                 $row = 2;
//         $no = 1;
//         foreach($nil as $n){
//             //$numnil = (float) str_replace(',','.',$n->nilai);
//             $objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
//             $objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n->nim);
//             $objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->nama);
//             $objPHPExcel->getActiveSheet()->setCellValueExplicit('D'.$row,$n->benar,PHPExcel_Cell_DataType::TYPE_NUMERIC);
//             $objPHPExcel->getActiveSheet()->setCellValueExplicit('E'.$row,$n->salah,PHPExcel_Cell_DataType::TYPE_NUMERIC);
//             $objPHPExcel->getActiveSheet()->getStyle('F'.$row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
//             $objPHPExcel->getActiveSheet()->setCellValueExplicit('F'.$row,$n->nilai,PHPExcel_Cell_DataType::TYPE_NUMERIC);
//             $row++;
//             $no++;
//         }
//     //Freeze pane
//     $objPHPExcel->getActiveSheet()->freezePane('A2');
//     //Cell Style
//     $styleArray = array(
//         'borders' => array(
//             'allborders' => array(
//                 'style' => PHPExcel_Style_Border::BORDER_THIN
//             )
//         )
//     );
//     $objPHPExcel->getActiveSheet()->getStyle('A1:F'.$maxrow)->applyFromArray($styleArray);
//     //Save as an Excel BIFF (xls) file
//     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');

//     header('Content-Type: application/vnd.ms-excel');
//     header('Content-Disposition: attachment;filename="Nilai-'.$nama_sesi.'-'.$nama_blok.'-'.$tgl.'.xls"');
//     header('Cache-Control: max-age=0');

//     $objWriter->save('php://output');
//     exit();
// }

?>