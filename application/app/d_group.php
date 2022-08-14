<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $sql = "SELECT * FROM `group`";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    $i=0;
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
           $memberlist =  explode(",",$row['group_members']);
           for($i=0; $i<count($memberlist); $i++){
                if($memberlist[$i]==$_SESSION['username']){
                    echo "
                    <div class='bg-transparent card shadow-sm mt-1' onclick=group_click('{$row['id']}')>
                        <div class='row g-0 p-2  border-0'>
                            <div class='col-md-2 p-2  rounded-circle'>
                                <img src='http://$hostname/livechat/img/group_img/".$row['g_img']."' class='img-fluid'>
                            </div>
                            <div class='col-md-9'>
                                <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                    <ul class='list-unstyled'>
                                        <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['g_name']."</span></li><br>
                                        <li class='text-start'><span class='card-title'> ".$row['g_type']."</span> </li>
                                    </ul>
                                </div>
                                <span class='' id='un_seen_msg$i'></span>
                                <div class='text-end g-0'>
                                    <button class='btn btn-outline-primary btn-sm'><small>Message</small></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
           }
        }
    }
?>