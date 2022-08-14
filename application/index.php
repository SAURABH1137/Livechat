<?php 
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/links/index.php"); 
    if(isset($_SESSION['username'])){
        $sql = "UPDATE `users` SET `status`='Online' WHERE email='{$_SESSION['username']}'";
        $result = mysqli_query($conn,$sql) or die("SQL Query error....!");

        $sql1 = "SELECT * FROM `users` WHERE email='{$_SESSION['username']}'";
        $result1 = mysqli_query($conn,$sql1) or die("SQL Query error....!");

            if(mysqli_num_rows($result1)>0){
                $row=mysqli_fetch_assoc($result1);
            }
        echo "
                <div class='container-fluid img-radius'>
                    <div class='col-sm-5'>
                        <img src='http://$hostname/livechat/img/fav-icon.png' alt='fav-icon' class='img-fluid'>
                    </div>
                    <div class='row'>";
// ***************************user information *********************************
                    echo "
                        <div class='col-md-3'>
                            <div class='bg-transparent card'>
                                <div class='row g-0 p-2 shadow-sm'>
                                    <div class='col-md-2 p-2  rounded-circle'>
                                        <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'>
                                    </div>
                                    <div class='col-md-9'>
                                        <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                            <ul class='list-unstyled'>
                                                <li class='text-start'><span class='card-title text-start pl-2 text-uppercase'> ".$row['username']."</span></li><br>
                                                <li class='text-start'><span class='dot-online'></span><span class='card-title'> ".$row['status']."</span> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class='col-md-1 pt-2'>
                                        <nav class='navbar '>
                                            <div class='dropend'>
                                                <img src='http://$hostname/livechat/img/svg/three-dots-vertical.svg' class='dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
                                                <ul class='dropdown-menu p-2 msg-send-user'>
                                                    <li><a class='dropdown-item' data-bs-toggle='modal' href='#creategroup' role='button'><img src='http://$hostname/livechat/img/svg/people-fill.svg'><span class='p-3'>Create Group</span></a></li>
                                                    <li id='display_profile'><a class='dropdown-item' role='button'><img src='http://$hostname/livechat/img/svg/person-lines-fill.svg'><span class='p-3'>Profile</span></a></li>
                                                    <li onclick='logout(true);'><a class='dropdown-item' href='#'><img src='http://$hostname/livechat/img/svg/lock-fill.svg'><span class='p-3'>Logout</span></a></li>   
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <div class='col mt-2'>
                                <div class='input-group'>
                                    <input type='text' class='form-control bg-transparent' id='search' onkeyup='search();'>
                                    <span class='input-group-text bg-transparent'><img src='http://$hostname/livechat/img/svg/search.svg'></span>
                                </div>
                            </div>
                            <div class='col chat-box' id='onlineusers'>

                            </div>
                        </div>
                        ";

// ****************************** xxxxxxxxxxxxxxxxxx ********************************************                   
// ***************************** message information ********************************************
                        echo "
                        <div class='col-6 col-md-6 bg-transparent' id='profile'>
                            <div class='col' id='userinfo'>
                                <img src='http://$hostname/livechat/img/slider/1.gif'style='height: 690px;' class='img-fluid'>
                            </div>
                        </div>
                        <div class='col  bg-transparent'>
                            <span class='text-muted lead card border-0 bg-transparent'><small>Followers</small></span>
                            <div class='col chat-box-scroll' id='follow'></div>
                            <span class='text-muted lead '><small>Groups</small></span>
                            <div class='col chat-box-scroll' id='group_list'>
                                
                            </div>
                        </div>
                        ";
// ****************************** xxxxxxxxxxxxxxxxxx ********************************************    
    }else{
        echo "
            <script>
                var hostname = window.location.origin;
                window.location.href = hostname+'/livechat/';
            </script>
        ";
    }
?> 

<?php
    if(isset($_SESSION['username']) && isset($_POST['submit'])){
        if(isset($_FILES['image']) &&  isset($_POST['password']) && $_FILES['image']['name']!=''){
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $about = $_POST['about'];
            $city = $_POST['city'];
            $qualification = $_POST['qualification'];
            $Hobbies = $_POST['Hobbies'];
            $College = $_POST['College'];
            $username = $_POST['username'];
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp,"../img/profile_img/".$file_name);
            $sql="UPDATE `users` SET `email`='{$email}',`password`='{$pass}',`photo`='{$file_name}',`about`='{$about}',`username`='{$username}',`city`='{$city}',`qualification`='{$qualification}',`Hobbies`='{$Hobbies}',`College`='{$College}' WHERE email='{$_SESSION['username']}'";
            $result=mysqli_query($conn,$sql);

        }else if(isset($_SESSION['username']) && isset($_POST['submit'])){
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $about = $_POST['about'];
            $username = $_POST['username'];
            $city = $_POST['city'];
            $qualification = $_POST['qualification'];
            $Hobbies = $_POST['Hobbies'];
            $College = $_POST['College'];
            $sql="UPDATE `users` SET `email`='{$email}',`password`='{$pass}',`about`='{$about}',`username`='{$username}',`city`='{$city}',`qualification`='{$qualification}',`Hobbies`='{$Hobbies}',`College`='{$College}' WHERE email='{$_SESSION['username']}'";
            $result=mysqli_query($conn,$sql);
        }
    }
?>

    <div class='modal fade' id='creategroup' aria-hidden='true' aria-labelledby='creategroupLabel' tabindex='-1'>
        <div class='modal-dialog modal-dialog-centered'>
            <div class='modal-content msg-send-user'>
                <div class='modal-body'>
                    <div class='row'>
                        <div class='col'>
                            <div>
                                <label for="gc_name" class="form-label text-uppercase">Group Creater Name <span class='text-danger'>*</span></label>
                                <input type="text" id="gc_name" class="form-control bg-transparent" value= '<?php echo$row['username'];?>' disabled>
                                <input type="text" id="gc_email" class="form-control" value= '<?php echo$row['email'];?>' hidden>
                            </div>
                            <div>
                                <label for="g_name" class="form-label text-uppercase">Group Name<span class='text-danger'>*</span></label>
                                <input type="text" id="g_name" class="form-control bg-transparent" required>
                            </div>
                            <div>
                                <label for="g_type" class="form-label text-uppercase">group description<span class='text-danger'>*</span> </label>
                                <input type="text" id="g_type" class="form-control bg-transparent" required>
                            </div>
                            <div id='added_list'>

                            </div>
                        </div>
                    </div>
                    <div class="col chat-box-scroll mt-2">
                        <?php
                            $sql = "SELECT * FROM `users`";
                            $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
                            $i=0;
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    if(($row['email'])==($_SESSION['email'])){
                                        continue;
                                    }else{
                                        echo "
                                        <div class='col shadow-sm card bg-transparent'>
                                            <div class='row g-0 p-2'>
                                                <div class='col-md-2 p-2  rounded-circle'>
                                                    <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'>
                                                </div>
                                                <div class='col-md-9'>
                                                    <div class='card-body col-md-8 g-0 badge text-wrap text-muted'>
                                                        <ul class='list-unstyled'>
                                                            <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                                            <li class='text-start'><span class='dot-online'></span><span class='card-title'> ".$row['email']."</span> </li>
                                                        </ul>
                                                    </div>   
                                                    <input type='checkbox' class='checkbox' onclick='checkbox_cliked();' value='{$row['email']}' name='pl'><small></small>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                    }
                                    $i++;
                                }
                            }
                        ?>
                    </div><br>                
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-outline-secondary' onclick=create_group();>Submit</button>
                </div>
            </div>
        </div>
    </div>





    <div aria-live='polite' aria-atomic='true' class='position-fixed top-0 end-0 bd-example-toasts'>
        <div class='toast-container'>
            <div class='toast' id='group_tost'>
                <div class='toast-header'>
                    <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                    <strong class='me-auto'>LiveChat</strong>
                    <small></small>
                    <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                </div>
            <div class='toast-body'>
               Group Created Successfully....&#128077;
            </div>
        </div>
    </div>

    <div aria-live='polite' aria-atomic='true' class='position-fixed top-0 end-0 bd-example-toasts'>
        <div class='toast-container'>
            <div class='toast' id='group_tost1'>
                <div class='toast-header'>
                    <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                    <strong class='me-auto'>LiveChat</strong>
                    <small></small>
                    <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                </div>
            <div class='toast-body'>
                All fields are required....&#x1F44E;
            </div>
        </div>
    </div>