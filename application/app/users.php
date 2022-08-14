<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    $i=0;
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
                foreach($conn->query("SELECT COUNT(*) FROM `msg` WHERE to_id='{$_SESSION['email']}' AND uid='{$row['email']}' AND m_status='notseen'") as $pow) {
                    if($pow['COUNT(*)']>0){
                        echo "
                            <script>
                                $('#unseen_msg$i').html('{$pow['COUNT(*)']}');
                                $('#unseen_msg$i').addClass('col offset-2 badge bg-primary rounded-pill');
                            </script> 
                        ";
                    }    
                }

                foreach($conn->query("SELECT COUNT(*) FROM `follow` WHERE f_email='{$row['email']}'") as $pow123) {
                    if($pow123['COUNT(*)']>0){
                        echo "
                            <script>
                                $('#followerscount$i').html('{$pow123['COUNT(*)']}+');
                            </script> 
                        ";
                    }else{
                        echo "
                        <script>
                            $('#followerscount$i').html('');
                        </script> 
                    ";
                    }  
                }
            
            if(($row['email'])==($_SESSION['email'])){
                continue;
            }else if(($row['status'])==='Online'){
                echo "
                <div class='bg-transparent card shadow-sm mt-1' onclick=clicked_user('{$row['email']}')>
                    <div class='row g-0 p-2'>
                        <div class='col-md-2 p-2  rounded-circle'>
                            <div type='button' class='position-relative'>
                                <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'></img>
                                <span id='followerscount$i'class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning'>
                                    99+
                                    <span class='visually-hidden'>unread messages</span>
                                </span>
                            </div>
                        </div>
                        <div class='col-md-9'>
                            <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                <ul class='list-unstyled'>
                                    <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                    <li class='text-start'><span class='dot-online'></span><span class='card-title'> ".$row['status']."</span> </li>
                                </ul>
                            </div>
                            <span class='' id='unseen_msg$i'></span>
                        </div>
                    </div>
                </div>
                ";
            }else if(($row['status'])==='Offline'){
                echo "
                <div class='bg-transparent card shadow-sm mt-1' onclick=clicked_user('{$row['email']}')>
                    <div class='row g-0 p-2'>
                        <div class='col-md-2 p-2 rounded-circle'>
                            <div type='button' class='position-relative'>
                                <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'></img>
                                <span id='followerscount$i'class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning'>
                                    99+
                                    <span class='visually-hidden'>unread messages</span>
                                </span>
                            </div>
                        </div>
                        <div class='col-md-9'>
                            <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                <ul class='list-unstyled'>
                                    <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                    <li class='text-start'><span class='dot'></span><span class='card-title'> ".$row['status']."</span> </li>
                                </ul>
                            </div>
                            <span class='' id='unseen_msg$i'></span>
                        </div>
                    </div>
                </div>
                ";
            }
            $i++;
        }
    }
?>