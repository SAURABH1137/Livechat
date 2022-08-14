<?php 
// ************************ login validation **************************
session_start();
$hostname = getenv('HTTP_HOST');
include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php");

if(isset($_POST['uname'])){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if($row['email']===$_POST['uname'] && $row['password']===$_POST['pass']){
                $_SESSION['username']=$_POST['uname'];
                $_SESSION['email']=$_POST['uname'];
                echo 'true';
            }
        }
    }
}
// ************************ XXXXXXXXXXXXXXXXX **************************
// ************************ Registration validation ********************
if(isset($_POST['reg_msg'])){
    $email = $_POST['em'];
    $username = $_POST['us'];
    $cpassword = $_POST['cp'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO `users`(`id`, `email`, `password`, `status`, `photo`, `about`, `username`) VALUES (DEFAULT,'{$email}','{$cpassword}','Offline','user.png','Be Happy','{$username}')";
    if (mysqli_query($conn, $sql)) {
        echo "true";
    } else {
       echo "false";
    }
      mysqli_close($conn);
}
// ************************ XXXXXXXXXXXXXXXXX **************************
// ************************ forget password validation *****************
if(isset($_POST['f_password'])){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql) or die("SQL Query error....!");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            if($row['email']===$_POST['f_password']){
                $to = $_POST['f_password'];
                $subject = "Reset Password Form Live Chat..!";
                $body = "
                        <html>
                            <body>
                                <h1>Live Chat</h1><br/>
                                <p>Hi ".$row['username']." <p>
                                <p>Your Password is : <b>".$row['password']."</b></p>
                            </body>
                        </html>
                    ";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\b";
                    $headers .= 'From : sonuaction01@gmail.com' . "\r\n";
                if(mail ($to, $subject, $body, $headers)){
                    echo 'true';
                }
            }
        }
    }
      mysqli_close($conn);
}
// ************************ XXXXXXXXXXXXXXXXX **************************
// ************************ logout validation **************************
if(isset($_POST['log_out'])){
    $sql1 = "UPDATE `users` SET `status`='Offline' WHERE email='{$_SESSION['username']}'";
    $result = mysqli_query($conn,$sql1) or die("SQL Query error....!");
    session_unset();
    session_destroy();
    echo 'true';
}
// ************************ XXXXXXXXXXXXXXXXX **************************
?>
