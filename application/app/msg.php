<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    if(isset($_POST['store_msg'])){
        $store_msg = $_POST['store_msg'];
        $us_msg = $_POST['us_msg'];
        $to_msg_store = $_POST['to_msg_store']; 
        $to_name = $_POST['to_name'];
        if(is_numeric($to_msg_store)){
            $msg_insert = "INSERT INTO `msg`(`mid`, `uid`, `to_id`, `msg`, `m_status`, `c_time`,`type`) VALUES (DEFAULT,'{$to_name}','{$to_msg_store}','{$us_msg}','seen',DEFAULT,'Group')";
        }else{
            $msg_insert = "INSERT INTO `msg`(`mid`, `uid`, `to_id`, `msg`, `m_status`, `c_time`,`type`) VALUES (DEFAULT,'{$to_name}','{$to_msg_store}','{$us_msg}','notseen',DEFAULT,'Individual')";
        }
        $res = mysqli_query($conn, $msg_insert)or die("connection failed");
        mysqli_query($conn,$res);
    }
?> 