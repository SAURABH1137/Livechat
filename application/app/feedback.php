<?php
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    
    if(isset($_POST['feed_message'])){
        $int = "INSERT INTO `query_feedback`(`id`, `fname`, `sender_email`, `Query_Feedback`, `Answer`, `date`, `type`) VALUES (DEFAULT,'{$_POST['feed_name']}','{$_POST['feed_email']}','{$_POST['feed_message']}','',DEFAULT,'{$_POST['feed_select']}')";
            $res = mysqli_query($conn, $int)or die("connection failed");
            if($res){
                echo "connection Failed";
            }
    }
    if(isset($_POST['d_val']) && isset($_POST['delete_val'])){
        $int = "DELETE FROM `query_feedback` WHERE id={$_POST['delete_val']}";
        $res = mysqli_query($conn, $int)or die("connection failed");
        if($res){
            echo "connection Failed";
        }

    }
    if(isset($_POST['u_val']) && isset($_POST['update_val'])){
        $int = "UPDATE `query_feedback` SET `Answer`='{$_POST['answer_val']}'WHERE `id`={$_POST['update_val']} ";
        $res = mysqli_query($conn, $int)or die("connection failed");
        if($res){
            echo "connection Failed";
        }
    }
?> 