<?php
    session_start();
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');

    $sql1 = "SELECT * FROM `users` WHERE email='{$_SESSION['username']}'";
    $result1 = mysqli_query($conn,$sql1) or die("SQL Query error....!");

        if(mysqli_num_rows($result1)>0){
            $row=mysqli_fetch_assoc($result1);
        }
        echo "
            <div class='col bg-transparent card p-2'>
                <div class='row'>
                    <div class='col-7'>
                        <form action='' method='POST' enctype='multipart/form-data'>
                            <div class='col mt-2 text-center'>
                                <img src=http://$hostname/livechat/img/profile_img/".$row['photo']." class='rounded img-fluid' width='40%'><br>
                                <input type='file' class='form-control-sm' name='image' value=".$row['photo'].">
                            </div>
                            <div class='form-group row mt-4'>
                                <label class='col-sm-4 col-form-label'>Email</label>
                                <div class='col-sm-8'>
                                    <input type='email' name='email' class='form-control bg-transparent disabled' value=".$row['email']." readonly>
                                </div>
                            </div>
                            <div class='form-group row mt-2'>
                                <label for='' class='col-sm-4 col-form-label'>User Name</label>
                                <div class='col-sm-8'>
                                    <div class='col input-group'>
                                        <input type='text' name='username' class='form-control bg-transparent disabled' value=".$row['username'].">
                                        <span class='input-group-text bg-transparent' id='edit_username'><img src='http://$hostname/livechat/img/svg/pencil-square.svg'></span>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group row mt-2'>
                                <label class='col-sm-4 col-form-label'>About</label>
                                <div class='col-sm-8'>
                                    <div class='col mt-2 input-group'>
                                        <input type='text' name='about' id='quali' class='form-control bg-transparent disabled' value=".$row['about'].">
                                        <span class='input-group-text bg-transparent' id='edit_about'><img src='http://$hostname/livechat/img/svg/pencil-square.svg'></span>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group row mt-2'>
                                <label class='col-sm-4 col-form-label'>Password</label>
                                <div class='col-sm-8'>
                                    <div class='col mt-2 input-group'>
                                        <input type='password' name='password' id='password_edit' class='form-control bg-transparent disabled' value=".$row['password'].">
                                        <span class='input-group-text bg-transparent' id='edit_password'><img src='http://$hostname/livechat/img/svg/eye.svg'></span>
                                    </div>
                                </div>
                            </div>
                            <div class='form-group row mt-2'>
                                <label class='col-sm-4 col-form-label'>City</label>
                                <div class='col-sm-8'>
                                    <div class='col mt-2 input-group'>
                                        <input type='text' name='city' id='city' class='form-control bg-transparent disabled' value=".$row['city'].">
                                        <span class='input-group-text bg-transparent' id='edit_city'><img src='http://$hostname/livechat/img/svg/pencil-square.svg'></span>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group row mt-2'>
                                <label class='col-sm-4 col-form-label'>Qualification</label>
                                <div class='col-sm-8'>
                                    <div class='col mt-2 input-group'>
                                        <input type='text' name='qualification' id='qualification' class='form-control bg-transparent disabled' value=".$row['qualification'].">
                                        <span class='input-group-text bg-transparent' id='edit_qualification'><img src='http://$hostname/livechat/img/svg/pencil-square.svg'></span>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group row mt-2'>
                                <label class='col-sm-4 col-form-label'>Hobbies</label>
                                <div class='col-sm-8'>
                                    <div class='col mt-2 input-group'>
                                        <input type='text' name='Hobbies' id='Hobbies' class='form-control bg-transparent disabled' value=".$row['Hobbies'].">
                                        <span class='input-group-text bg-transparent' id='edit_Hobbies'><img src='http://$hostname/livechat/img/svg/pencil-square.svg'></span>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group row mt-2'>
                                <label class='col-sm-4 col-form-label'>School/College Name</label>
                                <div class='col-sm-8'>
                                    <div class='col mt-2 input-group'>
                                        <input type='text' name='College' id='College' class='form-control bg-transparent disabled' value=".$row['College'].">
                                        <span class='input-group-text bg-transparent' id='edit_College'><img src='http://$hostname/livechat/img/svg/pencil-square.svg'></span>
                                    </div>
                                </div>
                            </div>
                            <div class='mt-4  text-end'>
                                <input type='submit' name='submit' value ='SUBMIT' class='btn btn-secondary btn-sm'>
                            </div>
                        </form>
                    </div>
                ";?>
            

                    <div class='col-5'>
                            <?php
                                $sql = "SELECT * FROM `users`,`follow` WHERE `u_email`=`email` AND `follow`.f_email='{$_SESSION['username']}'";
                                $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
                                $i=0;
                                echo "<span class='text-muted lead'><small>Following</small></span>";
                                echo "<div class='followers-box-scroll'>";
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "
                                            <div class='bg-transparent card shadow-sm mt-1' onclick=clicked_user('{$row['email']}')>
                                                <div class='row g-0 p-1 '>
                                                    <div class='col-md-3 p-2  rounded-circle'>
                                                        <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'>
                                                    </div>
                                                    <div class='col-md-9'>
                                                        <div class='card-body col-md-12  badge text-wrap text-muted'>
                                                            <ul class='list-unstyled'>
                                                                <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                                                <li class='text-start'><span class='card-title'> ".$row['about']."</span> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                }
                                echo "</div>";
                            ?>
                            <?php
                                $sql = "SELECT * FROM `users`,`msg` WHERE `users`.email=`msg`.to_id AND uid='{$_SESSION['username']}' ORDER BY uid DESC LIMIT 1;
                                
                                ";
                                $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
                                $i=0;
                                if(mysqli_num_rows($result)>0){
                                    echo "<span class='text-muted lead'><small>Least Interacted With</small></span>";
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "
                                            <div class='bg-transparent card shadow-sm mt-1' onclick=clicked_user('{$row['email']}')>
                                                <div class='row g-0 p-1 '>
                                                    <div class='col-md-2 p-2  rounded-circle'>
                                                        <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' class='img-fluid'>
                                                    </div>
                                                    <div class='col-md-9'>
                                                        <div class='card-body col-md-12  badge text-wrap text-muted'>
                                                            <ul class='list-unstyled'>
                                                                <li class='text-start'><span class='card-title pl-2 text-uppercase text-start'> ".$row['username']."</span></li><br>
                                                                <li class='text-start'><span class='card-title'> ".$row['about']."</span> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
                                    }
                                }
                            ?>
                            <span class='text-muted lead'><small>Notification</small></span>
                            <div class='bg-transparent card shadow-sm mt-1'>
                                <div class='row g-0 p-1 '>
                                    <div class='col-md-2 p-2'>
                                        <img src='<?php echo "http://$hostname/livechat/img/fav-icon.png"?>' class='img-fluid'>
                                    </div>
                                    <div class='col-md-10'>
                                        <div class='card-body col-md-12  badge text-wrap text-muted'>
                                            <ul class='list-unstyled'>
                                                <li class='text-start'><span class='card-title pl-2 text-start'><span style='color:black'>Live</span><span style='color:Tomato'>Chat</span></span></li><br>
                                                <li class='text-start'>
                                                    <span class='card-title'>Soon they'll be in our other app Messenger. You'll
                                                        be able to do more, like take <span style='color:black'>selfies</span> and <span style='color:black'>videos right in the app</span>__ and its' much
                                                        faster.
                                                    </span> 
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>       
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    var i=0;
                    $("#edit_password").on("click",function(){
                       if(i==0){
                        $("#password_edit").get(0).type = 'text';
                        $("#edit_password").html("<img src='http://127.0.0.1/livechat/img/svg/eye-slash.svg'>");
                        i=i+1;
                       }else{
                        $("#password_edit").get(0).type = 'password';
                        $("#edit_password").html("<img src='http://127.0.0.1/livechat/img/svg/eye.svg'>");
                        i=0;
                       }
                    })
                })
            </script>