<?php
session_start();
$date=0;
include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php"); 
 $sql6 = "SELECT * FROM `msg`  WHERE  to_id = '{$_POST['gp_msg']}' ORDER BY mid";
 $result4 = mysqli_query($conn,$sql6) or die("SQL Query error....!");
 $output = "";
 if(mysqli_num_rows($result4)>0){
     while($row4=mysqli_fetch_assoc($result4)){
        $time = date("g:i A", strtotime($row4['c_time']));

        if($row4['Date1']==$date){
            $date;
       }else{
            $date = $row4['Date1'];
            $output .= "  
                 <div class='offset-5 col-2 mt-2  mb-2 badge text-dark text-wrap msg-send-friend'>
                     <div class='text-center'> 
                         <small>$date</small>
                     </div>
                 </div><br>
             ";
       }

         if($row4['uid'] === $_SESSION['username']){
             $output .= "  
                 <div class='bg-transparent offset-7 text-start mt-1 col-5 badge text-secondary text-wrap msg-send-friend shadow-sm'>
                     <span class='p-2 rounded'>
                         {$row4['msg']}
                     </span>
                     <div class='text-end'> 
                         <small>$time</small>
                     </div>
                 </div><br>
             ";
         }else{
             $output .= "  
                 <div class='bg-transparent text-start col-5 mt-1 border badge text-primary text-wrap msg-send-user shadow-sm'>
                 <div class='text-end'> 
                         <small>~ {$row4['uid']}</small>
                     </div>
                     <span class='p-2 rounded'>
                         {$row4['msg']}
                     </span>

                     <div class='text-end'> 
                         <small>$time</small>
                     </div>
                 </div><br>
             ";
         }
     }
 }
 echo "$output";
?>