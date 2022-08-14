<?php
    include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");
    $hostname = getenv('HTTP_HOST');
    $sql = "SELECT * FROM `admin`";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");

    if(isset($_POST['username']) && isset($_POST['password'])){
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                if($row['username']==$_POST['username'] && $row['password']==$_POST['password']){
                    echo "
                        <script>
                            var hostname = window.location.origin;
                            window.location.href = hostname+'/livechat/admin/homepage.php';
                        </script>
                    ";
                }
            }
        }
    }
    if(isset($_POST['valid'])){
        if($_POST['valid']!=null || $_POST['valid']==='True'){
            echo "
                <div class='col-12 position-absolute top-50 start-50 translate-middle' id='view'>
                    <div class='col border border-3 p-3 fw-light'>

                        <div class='col text-center text-secondary bg-light text-uppercase p-3 fw-bold' id='admin_panel'>
                            <span>Forget Password</span>
                        </div>

                        <div class='mb-3 mt-2'>
                            <label for='email' class='form-label'>Email ID</label>
                            <input type='text' class='form-control' id='email'> <span class='text-muted' id='validated'></span>
                        </div>

                        <div class='d-grid gap-2 mx-auto'>
                            <span class='text-end' id='homepage'></span>
                            <input type='submit' value='Reset Password' class='btn btn-primary' id='send_email'>
                        </div>

                    </div>
                    <div id='show'></div>
                </div>
            ";
        }
    }



    if(isset($_POST['send_email'])){
        if($_POST['send_email']!=null){
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if($_POST['send_email']==$row['username']){
                        $to = $_POST['send_email'];
                        $subject = "Reset Password Form Live Chat..!";
                        $body = "
                                    <html>
                                        <body>
                                            <h1>Live Chat</h1><br/>
                                            <p>Hi ".$row['Admin_Name']." <p>
                                            <p>Your Password is : <b>".$row['password']."</b></p>
                                        </body>
                                    </html>
                                ";


                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                            $headers .= 'From : sonuaction01@gmail.com' . "\r\n";
                        if(mail ($to, $subject, $body, $headers)){
                            echo "
                                <script>
                                    $('#toast2').toast('show');
                                    $('#homepage').html('<a href=http://$hostname/livechat/admin>Retun Homepage</a>')
                                </script>
                            ";
                        }else{
                            echo "<span id='failed_to_send'>Email Sending Failed...! </span>
                                  <script>
                                    setInterval(function()
                                    { 
                                        $('#failed_to_send').html(' ');
                                    }, 7000);
                                  </script>
                            "; 
                                
                        }
                    }else{
                        echo "
                        <script>
                            setInterval(function()
                            { 
                                $('#staticBackdrop').modal('hide');
                            }, 4000);
                            $('#email').val(' ');
                        </script>
                        ";
                    }
                }
            }
        } 
    }
?>



<script>

        $("#email").on('keyup',function(){
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var a = $(this).val();
            if(!regex.test(a)) {
                $("#validated").html("<small>invalid Email ID</small>");
            }else{
                $("#validated").html('');
            }
        })


        $("#send_email").on('click',function(event){
            var d = $("#email").val();
               if(d!=null && d!=''){
                    $('#staticBackdrop').modal('show');
               }
            $.ajax({
                url : hostname+"/livechat/admin/validation.php",
                type:"POST",
                data :{send_email:d},
                success : function(data){
                $('#show').html(data);
                    $('#staticBackdrop').modal('hide');
                }
            });
            event.preventDefault();
        });
</script>


