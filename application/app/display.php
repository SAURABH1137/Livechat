<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $sql = "SELECT * FROM `users` WHERE email='{$_POST['user_msg']}'";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    echo "<input type='text' class='form-control visually-hidden' id='to_msg_send' value='{$_POST['user_msg']}'>
    <input type='text' class='form-control visually-hidden' id='user_name' value='{$_SESSION['username']}'>
    ";
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo"
                <div class='row'>
                    <div class='col-12'>
                        <div class='bg-transparent card'>
                            <div class='row g-0 p-2 shadow-sm'>
                                <div class='col-md-2 p-2  rounded-circle'>
                                    <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid' style='height: 50px; width: 50px;'>
                                </div>
                                <div class='col-md-9'>
                                    <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                        <ul class='list-unstyled'>
                                            <li class='text-start'><span class='pl-2 text-uppercase'> ".$row['username']."</span><span class='card-title text-end'> &#126; ".$row['about']."</span></li><br>
                                            ";
                                            if($row['status']=='Offline'){
                                                echo"<li class='text-start'><span class='dot'></span><span class='card-title'> ".$row['status']."</span> </li>";
                                            }else{
                                                echo"<li class='text-start'><span class='dot-online'></span><span class='card-title'> ".$row['status']."</span> </li>";
                                            }
                                            echo"
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class='col mt-2'>
                                    <nav class='navbar'>
                                        <div class='dropend'>
                                            <img src='http://$hostname/livechat/img/svg/three-dots-vertical.svg' class='dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <ul class='dropdown-menu p-2 msg-send-user'>
                                                <li onclick=follow('{$row['email']}')><a class='dropdown-item' href='#'><img src='http://$hostname/livechat/img/svg/person-plus-fill.svg'><span class='p-3'>Follow</span></a></li>
                                                <li onclick=unfollow('{$row['email']}')><a class='dropdown-item' href='#'><img src='http://$hostname/livechat/img/svg/person-x-fill.svg'><span class='p-3'>Unfollow</span></a></li>   
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-12'>
                        <div class='bg-transparent mt-1 card' id='chat_scroll'>
                            <div class='col chat-box' id='chat_msg'>
                            
                            </div>
                            <div class='col bg-transparent shadow-sm'>
                            <div class='input-group bg-transparent'>
                                <input type='text' class='form-control bg-transparent ' id='user_send' style='height: 90px;' placeholder='Send Message' >
                                <span class='input-group-text bg-transparent' onclick='user_send(); scrollToBottom();'><img src='http://$hostname/livechat/img/svg/cursor-fill.svg'></span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            ";
        }
    }

    

?>