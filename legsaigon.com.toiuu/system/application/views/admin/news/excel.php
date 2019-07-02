<?php
header('Content-type: text/html; charset=utf-8');
    mb_internal_encoding('UTF-8');
    error_reporting(E_ALL);
    ob_start();
    
    require_once("excelwriter.php");
    
    $filename = time().'.xls';
    $excel=new ExcelWriter($filename);
    if($excel==false){
        echo $excel->error;
    }
    
    
    if($listItem){
        $myArr=array("ID","Tiêu đề","Miêu tả");
        $excel->writeLine($myArr);
        #
        foreach($listItem as $item){
            $_array_data = array($item['id'], $item['vn_title'], $item['vn_sapo']);
            $excel->writeLine($_array_data);
        }
    }
    #
    $excel->close();
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$filename.'"');
    header('Cache-Control: max-age=0');
    @readfile($filename);
    @unlink($filename);
    #
    echo 'Đã tạo file Excel thành công';
    #
    ob_end_flush();
?>