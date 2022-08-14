<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    if(isset($_POST['gc_name']) && isset($_POST['g_name']) && isset($_POST['g_type'])){
        $gc_name = $_POST['gc_name'];
        $g_name =  $_POST['g_name']; 
        $g_type = $_POST['g_type'];
        $members = $_POST['members'];
        $gc_email = $_POST['gc_email'];
        $img = rand(1, 4);
        $up_img = $img.".png";
        $g_create = "INSERT INTO `group`(`id`, `g_name`,`gc_email`, `g_type`, `g_img`, `gc_name`, `group_members`, `group_DaTi`) VALUES (DEFAULT,'{$g_name}','{$gc_email}','{$g_type}','{$up_img}','{$gc_name}','{$members}',DEFAULT)";
        $res = mysqli_query($conn, $g_create);
        if($res==1){
            echo "<script>  
            $('#group_tost').toast('show');
            $('#creategroup').modal('hide');
            </script>";
        }else{
            echo "<script>  $('#group_tost1').toast('show'); </script>";
        }
    }
    if(isset($_POST['exit_user']) && isset($_POST['group_id'])){

        $sql = "SELECT * FROM `group` WHERE id='{$_POST['group_id']}'";
        $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $haystack= (explode(",",$row['group_members']));
                if (($key = array_search($_SESSION['username'], $haystack)) !== FALSE) {
                    unset($haystack[$key]);
                  }
               $tc =  implode(",",$haystack);
               $grup_up = "UPDATE `group` SET `group_members`='$tc' WHERE `id` = {$_POST['group_id']}";
               if(mysqli_query($conn,$grup_up)){
                   echo "
                        <script>
                            $('#userinfo').html('');
                        </script>
                   ";
               }
            }
        }
    }
?>