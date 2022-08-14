<?php
$sql9 = "SELECT * FROM `users`,`msg` WHERE `users`.email=`msg`.to_id AND uid='{$_SESSION['username']}' ORDER BY mid DESC LIMIT 1";
$result = mysqli_query($conn,$sql9) or die("SQL Query error....!");
$i=0;
    if(mysqli_num_rows($result)>0){
        while($row9=mysqli_fetch_assoc($result)){
           if($_SESSION['username']==$row9['username']){
            echo "
                <li class='text-start mt-2'><span class='card-title' id='lastmsg_user'>".$row9['msg']."</span> </li>
            ";
           }else{
                echo "
                        <li class='text-start mt-2'><span class='card-title' id='lastmsg_user'>". $row9['username']." : ".$row9['msg']."</span> </li>
                ";
           }
        }
    }
?>