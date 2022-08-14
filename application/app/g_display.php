<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $sql = "SELECT * FROM `group` WHERE id='{$_POST['group_id']}'";
    echo "<input type='text' class='form-control visually-hidden' id='to_msg_send' value='{$_POST['group_id']}'>
        <input type='text' class='form-control visually-hidden' id='user_name' value='{$_SESSION['username']}'>
    ";

    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            echo"
                <div class='row'>
                    <div class='col-12'>
                        <div class='bg-transparent card'>
                            <div class='row g-0 p-2 shadow-sm'>
                                <div class='col-md-2 p-2  rounded-circle'>
                                    <img src='http://$hostname/livechat/img/group_img/".$row['g_img']."' class='img-fluid' style='height: 50px; width: 50px;'>
                                </div>
                                <div class='col-md-9' id='gorup_indodkdfwe'>
                                    <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                        <ul class='list-unstyled'>
                                            <li class='text-start'><span class='pl-2 text-uppercase'> ".$row['g_name']."</span></li>
                                            <li class='text-start mt-2'> ".$row['g_type']."</li>
                                            <input type='text' class='invisible' value='".$row['id']."' id='group_id_e'>
                                        </ul>
                                    </div>
                                </div>
                                <div class='col mt-2'>
                                <nav class='navbar'>
                                    <div class='dropend'>
                                        <img src='http://$hostname/livechat/img/svg/three-dots-vertical.svg' class='dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <ul class='dropdown-menu p-2 msg-send-friend'>
                                            <li onclick=exitgroup('{$_SESSION['username']}')><a class='dropdown-item text-danger' href='#'><img src='http://$hostname/livechat/img/svg/box-arrow-right.svg'><span class='p-3'>Exit Group</span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-12'>
                        <div class='bg-transparent mt-1 card' id='chat_scroll'>
                            <div class='col chat-box' id='group_msg'>
                            
                            </div>
                        </div>
                    </div>
                    <div class='col bg-transparent shadow-sm'>
                    <div class='input-group bg-transparent'>
                        <input type='text' class='form-control bg-transparent ' id='user_send' style='height: 90px;' placeholder='Send Message' >
                        <span class='input-group-text bg-transparent' onclick='user_send(); scrollToBottom();'><img src='http://$hostname/livechat/img/svg/cursor-fill.svg'></span>
                    </div>
                </div>
                </div>
            ";
            
        }
    }
?>