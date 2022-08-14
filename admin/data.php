<?php
include($_SERVER['DOCUMENT_ROOT']."/livechat/application/connection/index.php"); 
$hostname = getenv('HTTP_HOST');
$i =1;
$sql = "SELECT * FROM `users` ORDER BY `id` asc limit 15;";
$result = mysqli_query($conn,$sql) or die("SQL Query error....!");
$profile ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>ID</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Photo</th>
        <th>ON/OFF</th>
    </tr>
';
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $profile .= "
        <tr  class='text-center'>
            <td>$i</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>{$row['status']}</td>
            <td>
                <img src='http://$hostname/livechat/img/profile_img/".$row['photo']."' alt='User_img' class='img-fluid rounded' style='height: 40px; width: 40px;'>
            </td>
            <td>
                <div class='form-check form-check-inline'>
                    <input class='form-check-input' type='checkbox' id='Active{$row['id']}' checked>
                </div>
            </td>
        </tr>
        ";
        $i++;

    }
    echo "
            </table>
        ";
}

$sql1 = "SELECT * FROM `msg` ORDER BY `mid` asc limit 16;";
$result1 = mysqli_query($conn,$sql1) or die("SQL Query error....!");
$messages ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>MID</th>
        <th>Sender Email</th>
        <th>Reciver Email</th>
        <th>Message</th>
        <th>Type</th>
    </tr>
';
$j=1;
if(mysqli_num_rows($result1)>0){
    while($row1=mysqli_fetch_assoc($result1)){
        $messages .= "
        <tr>
            <td>$j</td>
            <td>{$row1['uid']}</td>
            <td>{$row1['to_id']}</td>
            <td>{$row1['msg']}</td>
            <td>{$row1['type']}</td>
        </tr>
        ";
        $j++;
    }
    echo "
            </table>
        ";
}


$sql2 = "SELECT * FROM `group` ORDER BY `id` asc limit 10;";
$result2 = mysqli_query($conn,$sql2) or die("SQL Query error....!");
$group ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Creater Name</th>
        <th>Members</th>
    </tr>
';
$k=1;
if(mysqli_num_rows($result2)>0){
    while($row2=mysqli_fetch_assoc($result2)){
        $group .= "
        <tr>
            <td>$k</td>
            <td>{$row2['g_name']}</td>
            <td>{$row2['g_type']}</td>
            <td>{$row2['gc_name']}</td>
            <td>{$row2['group_members']}</td>
        </tr>
        ";
        $k++;

    }
    echo "
            </table>
        ";
}

$sql3 = "SELECT * FROM `follow` ORDER BY `f_id` asc limit 15;";
$result3 = mysqli_query($conn,$sql3) or die("SQL Query error....!");
$followers ='
<table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
    <tr class="table-secondary border-primary text-center">
        <th>ID</th>
        <th>User_email</th>
        <th>Follower_email</th>
    </tr>
';
$l=1;
if(mysqli_num_rows($result3)>0){
    while($row3=mysqli_fetch_assoc($result3)){
        $followers .= "
        <tr>
            <td>$l</td>
            <td>{$row3['u_email']}</td>
            <td>{$row3['f_email']}</td>
        </tr>
        ";
        $l++;
    }
    echo "
            </table>
        ";
}


?>
<div class="col" style="background-color: #e3f2fd;">
    <span class="navbar navbar-light text-center p-3">
        <a class="navbar-brand text-center display-6"><span class='mission'>invalid</span> Report</a> 
        <a class='navbar-brand text-center display-6'>Date : <span class="date"></span> Time : <span class="time"></span></a> 
    </span>
</div>
<?php
// profile
if(isset($_POST['list_profile'])){
    if($_POST['list_profile']=='profile'){
        echo" 
            <script>
                $('.mission').text('Profile');
            </script>
            <nav>
                <div class='nav nav-tabs justify-content-end mt-2' id='nav-tab' role='tablist'>
                    <button class='nav-link active' id='nav-home-tab' data-bs-toggle='tab' data-bs-target='#nav-home' type='button' role='tab' aria-controls='nav-home' aria-selected='true'>Chart</button>
                    <button class='nav-link' id='nav-profile-tab' data-bs-toggle='tab' data-bs-target='#nav-profile' type='button' role='tab' aria-controls='nav-profile' aria-selected='false'>Data</button>
                    <button class='nav-link disabled' id='nav-contact-tab' data-bs-toggle='tab' data-bs-target='#nav-contact' type='button' role='tab' aria-controls='nav-contact' aria-selected='false'>Upcoming</button>
                </div>
            </nav>
            <div class='tab-content' id='nav-tabContent'>
                <div class='tab-pane fade show active' id='nav-home' role='tabpanel' aria-labelledby='nav-home-tab'>
                    <canvas id='chart_profile' aria-label='chart' role='img' width='1300' Height='700'></canvas>
                </div>
                <div class='tab-pane fade' id='nav-profile' role='tabpanel' aria-labelledby='nav-profile-tab'>
                    $profile
                    <table>
                        <tr>
                            <ul class='pagination justify-content-center'>
                                <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                                <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                                <li class='page-item'><a class='page-link' href='#'>2</a></li>
                                <li class='page-item'><a class='page-link' href='#'>3</a></li>
                                <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                            </ul>
                        </tr>
                    </table>
                </div>
            </div>
        ";
    }
}
// messages
if(isset($_POST['list_messages'])){
    if($_POST['list_messages']=='messages'){
        echo" 
            <script>
                $('.mission').text('Messages');
            </script>
            $messages
            <table>
                <tr>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                    </ul>
                </tr>
            </table>
        ";
    }
}
// group
if(isset($_POST['list_group'])){
    if($_POST['list_group']=='group'){
        echo" 
            <script>
                $('.mission').text('Group');
            </script>
            $group
            <table>
                <tr>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                    </ul>
                </tr>
            </table>
        ";
    }
}
// followers
if(isset($_POST['list_followers'])){
    if($_POST['list_followers']=='followers'){
        echo" 
            <script>
                $('.mission').text('Followers');
            </script>
            $followers
            <table>
                <tr>
                    <ul class='pagination justify-content-center'>
                        <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                        <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                        <li class='page-item'><a class='page-link' href='#'>2</a></li>
                        <li class='page-item'><a class='page-link' href='#'>3</a></li>
                        <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                    </ul>
                </tr>
            </table>
        ";
    }
}
// query
if(isset($_POST['list_query'])){
    if($_POST['list_query']=='query'){
        echo" 
            <script>
                $('.mission').text('Query');
            </script>
        ";
        $sql4 = "SELECT * FROM `query_feedback` WHERE `type`='query' ORDER BY `id` asc limit 15";
        $result4 = mysqli_query($conn,$sql4) or die("SQL Query error....!");
        $query  = '
            <table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
                <tr class="table-secondary border-primary text-center">
                    <th>ID</th>
                    <th>Email</th>
                    <th>Query</th>
                    <th>Answer</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                </tr>
        ';
        if(mysqli_num_rows($result4)>0){
            while($row4=mysqli_fetch_assoc($result4)){
                $query .= "
                <tr>
                    <td style='width: 20px;'>{$row4['id']}</td>
                    <td style='width: 100px;'>{$row4['sender_email']}</td>
                    <td style='width: 30%;'>{$row4['Query_Feedback']}</td>
                    <td>";
                    if($row4['Answer']==''){
                        $query .= "
                            <textarea class='form-control bg-transparent' id=''  rows='1' placeholder='Message'></textarea>
                        ";
                    }else{
                        $query .= "<textarea class='form-control bg-transparent' id='{$row4['id']}' rows='4'>{$row4['Answer']}</textarea>";
                    }
                    $query .= "</td>
                    <td style='width: 100px;'>{$row4['date']}</td>
                    <td style='width: 20px;'><button id='update' class='btn btn-success btn-sm update' value='{$row4['id']}'>Update</button></td>
                    <td style='width: 20px;'><button id='delete' class='btn btn-danger btn-sm delete' value='{$row4['id']}'>Delete</button></td>
                </tr>
                ";
            }
            echo "
                    </table>
                ";
        }

        echo $query;
        echo 
        "
        <table>
                        <tr>
                            <ul class='pagination justify-content-center'>
                                <li class='page-item disabled'><span class='page-link'>Previous</span></li>
                                <li class='page-item active'><a class='page-link' href='#'>1</a></li>
                                <li class='page-item'><a class='page-link' href='#'>2</a></li>
                                <li class='page-item'><a class='page-link' href='#'>3</a></li>
                                <li class='page-item'><a class='page-link' href='#'>Next</a></li>
                            </ul>
                        </tr>
                    </table>
        ";

    }
}
// feedback
if(isset($_POST['list_feedback'])){
    if($_POST['list_feedback']=='feedback'){
        echo" 
            <script>
                $('.mission').text('Feedback');
            </script>
        ";

        $sql4 = "SELECT * FROM `query_feedback` WHERE `type`='feedback' ORDER BY `id` asc limit 15";
        $result4 = mysqli_query($conn,$sql4) or die("SQL Query error....!");
        $feedback  = '
            <table class="table table-bordered border-primary mt-2 table-hover" id="list-table">
                <tr class="table-secondary border-primary text-center">
                    <th>ID</th>
                    <th>Email</th>
                    <th>feedback</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                </tr>
        ';
        if(mysqli_num_rows($result4)>0){
            while($row4=mysqli_fetch_assoc($result4)){
                $feedback .= "
                <tr>
                    <td style='width: 70px;'>{$row4['id']}</td>
                    <td style='width: 200px;'>{$row4['sender_email']}</td>
                    <td class='text-justify'>{$row4['Query_Feedback']}</td>
                    <td style='width: 100px;'>{$row4['date']}</td>
                    <td style='width: 20px;'><button id='delete{$row4['id']}' class='btn btn-danger btn-sm delete' value='{$row4['id']}'>Delete</button></td>
                </tr>
                ";
            }
            echo "
                    </table>
                ";
        }

        echo $feedback;

    }
}

?>

<script>
    var  today = new Date().toLocaleDateString();
    $('.date').text(today);
</script>



<script>
    var ctx = document.getElementById("chart_profile").getContext("2d");
    var myChart = new Chart(ctx,{
    type:"bar",
    data:{
        labels: [
            'Users',
            'Groups',
        ],
        datasets:[
            {
                data: [30,80],
                fill: false,
                label: "Online",
                backgroundColor:[
                    'rgb(255, 102, 140)',
                    'rgb(255, 102, 140)'
                ],
            },
            {
                data: [70,20],
                fill: false,
                label: "Offline",
                backgroundColor:[
                    'rgb(102, 179, 255)',
                    'rgb(102, 179, 255)'
                ],
            },
        ],
    },
    options:{
        responsive:false,
        layout:{
            padding:{
                left:50,
                top:50,
                right:50,
                maxWidth: 0,
                maxHeight: 0,
            }
        },
        legend:{
            display:true,
            position:"bottom",
        },
        animation:{
            duration:3000,
            easing:"easeInOutBounce",
        },
        scales: {
            y: {
                min: 0,
            }
        },
        elements: {
            line: {
                borderWidth: 3
            }
        },
    },
})
</script>

<script>
    
$( document ).ready(function() {

  $(".delete").on("click",function(event){
    var d_val = 'delete';
    var delete_val = $(this).val();
    console.log(delete_val);
    $.ajax({
      url : hostname+"/livechat/application/app/feedback.php",
      type:"POST",
      data :{d_val:d_val,delete_val:delete_val},
    });
    event.preventDefault();
  });


  $(".update").on("click",function(event){
    var u_val = 'update';
    var update_val = $(this).val();
    var answer_val = $("#"+update_val).val();
    console.log(answer_val);
    console.log(update_val);
    $.ajax({
      url : hostname+"/livechat/application/app/feedback.php",
      type:"POST",
      data :{u_val:u_val,update_val:update_val,answer_val:answer_val},
    });
    event.preventDefault();
  });

});

</script>
