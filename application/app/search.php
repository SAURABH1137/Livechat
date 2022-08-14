<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $search_value = $_POST["search"];
    $sql = "SELECT * FROM `users` WHERE username LIKE '%{$search_value}%'";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if(($row['email'])==($_SESSION['email'])){
                continue;
            }else if(($row['status'])==='Online'){
                echo "
                <div class='card border-0 mt-2' onclick=clicked_user('{$row['email']}')>
                    <div class='row g-0 p-2 shadow-sm'>
                        <div class='col-md-2 p-2  rounded-circle'>
                            <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'>
                        </div>
                        <div class='col-md-9'>
                            <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                <ul class='list-unstyled'>
                                    <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                    <li class='text-start'><span class='dot-online'></span><span class='card-title'> ".$row['status']."</span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }else if(($row['status'])==='Offline'){
                echo "
                <div class='card border-0 mt-2' onclick=clicked_user('{$row['email']}')>
                    <div class='row g-0 p-2 shadow-sm'>
                        <div class='col-md-2 p-2  rounded-circle'>
                            <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'>
                        </div>
                        <div class='col-md-9'>
                            <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                <ul class='list-unstyled'>
                                    <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                    <li class='text-start'><span class='dot'></span><span class='card-title'> ".$row['status']."</span> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                ";
            }
        }
    }
?>
