<?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/livechat/application/links/index.php"); 
    $hostname = getenv('HTTP_HOST');
    echo "
        <link rel='stylesheet' href='http://$hostname/livechat/admin/css/style.css'>
        <script src='http://$hostname/livechat/admin/script/java.js'></script>
        <script src='http://$hostname/livechat/admin/script/Chart.js'></script>
    ";
    foreach($conn->query("SELECT COUNT(*) FROM msg") as $row) {
        $m = $row['COUNT(*)'];
    }
    foreach($conn->query("SELECT COUNT(*) FROM follow") as $row) {
        $f = $row['COUNT(*)'];
    }

    foreach($conn->query("SELECT COUNT(*) FROM users") as $row) {
        $u = $row['COUNT(*)'];
    }
    foreach($conn->query("SELECT COUNT(*) FROM `group`") as $row) {
        $g = $row['COUNT(*)'];
    }



?>

<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <span class="spinner-grow spinner-grow-sm text-primary"></span>
                    <span class='text-white'>Live Chat</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
                    </ul>
                    <span class="navbar-text text-white">
                        Live Chat Private Limited
                    </span>
                    <span class="navbar-text" onclick='homepage();' >
                        <?php echo" <img src='http://$hostname/livechat/img/svg/logout.svg' class='dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>";?>
                    </span>
                </div>
            </div>
        </nav>
        <div class="col-md-2 mt-2">
            <div class="row">
                <div class="col">
                    <div class="list-group bg-dark p-3" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-dark active mt-3" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home"> <img src="<?php echo "http://$hostname/livechat/img/svg/speedometer2.svg";?>" alt="Home"> Dashboard</a>
                        <a class="list-group-item list-group-item-dark mt-3" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile"> <img src="<?php echo "http://$hostname/livechat/img/svg/person-fill.svg";?>" alt="Home"> User Profile's</a>
                        <a class="list-group-item list-group-item-dark mt-3" id="list-messages-list" data-bs-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages"> <img src="<?php echo "http://$hostname/livechat/img/svg/chat-right-dots.svg";?>" alt="Home"> Messages</a>
                        <a class="list-group-item list-group-item-dark mt-3" id="list-group-list" data-bs-toggle="list" href="#list-group" role="tab" aria-controls="list-settings"> <img src="<?php echo "http://$hostname/livechat/img/svg/people.svg";?>" alt="Home"> Groups</a>
                        <a class="list-group-item list-group-item-dark mt-3" id="list-followers-list" data-bs-toggle="list" href="#list-followers" role="tab" aria-controls="list-settings"> <img src="<?php echo "http://$hostname/livechat/img/svg/person-plus.svg";?>" alt="Home"> Followers</a>
                        <a class="list-group-item list-group-item-dark mt-3" id="list-query-list" data-bs-toggle="list" href="#list-query" role="tab" aria-controls="list-settings"> <img src="<?php echo "http://$hostname/livechat/img/svg/question-circle-fill.svg";?>" alt="Home">User Query</a>
                        <a class="list-group-item list-group-item-dark mt-3" id="list-feedback-list" data-bs-toggle="list" href="#list-feedback" role="tab" aria-controls="list-settings"> <img src="<?php echo "http://$hostname/livechat/img/svg/creative-commons-by-brands.svg";?>" alt="Home">Feedback</a>
                        <a class="list-group-item list-group-item-dark" id="userinfo" data-bs-toggle="list" href="#list-admin" role="tab" aria-controls="list-settings"><img src="<?php echo "http://$hostname/livechat/img/profile_img/user.png";?>" class="rounded-circle" alt="...">Saurabh Sapkal</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 mt-2">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            <div class="row row-col-2 ml-2">
                            <canvas id='pie_chart' aria-label='chart' role='img' width='1000' Height='800'></canvas>

                                <div class="col mt-5">
                                    <div class="card-deck">
                                        <div class="card text-white bg-info mb-3"  id="to-pay">
                                            <div class="card-body text-center">
                                                <p class="display-1"><span id="buy_pay"><?php echo $u;?></span><sup>+</sup></p>
                                                <p class="card-text mt-4 text-uppercase"><i class="far fa-money-bill-alt"></i> TOTAL Users </p>
                                            </div>
                                        </div>
                                        <div class="card text-white bg-warning mb-3"  id="payed">
                                            <div class="card-body text-center">
                                                <p class="display-1"><span id="users"><?php echo $f;?></span><sup>+</sup></p>
                                                <p class="card-text mt-4 text-uppercase"><i class="fas fa-shopping-bag"></i> TOTAL Followers </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-deck">
                                        <div class="card text-white bg-primary mb-3" id="products">
                                            <div class="card-body text-center">
                                                <p class="display-1"><span id="product_counter"><?php echo $g;?></span><sup>+</sup></p>
                                                <p class="card-text mt-4 text-uppercase"><i class="fas fa-store"></i> TOTAL Groups </p>
                                            </div>
                                        </div>
                                        <div class="card text-white bg-danger mb-3"  id="add-cart">
                                            <div class="card-body text-center">
                                                <p class="display-1"><span id="cart_counter"><?php echo $m;?></span><sup>+</sup></p>
                                                <p class="card-text mt-4 text-uppercase"><i class="fas fa-cart-plus"></i> TOTAL Messages </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">1</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">2</div>
                    <div class="tab-pane fade" id="list-group" role="tabpanel" aria-labelledby="list-settings-list">3</div>
                    <div class="tab-pane fade" id="list-followers" role="tabpanel" aria-labelledby="list-settings-list">4</div>
                    <div class="tab-pane fade" id="list-query" role="tabpanel" aria-labelledby="list-settings-list">5</div>
                    <div class="tab-pane fade" id="list-feedback" role="tabpanel" aria-labelledby="list-settings-list">6</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById("pie_chart").getContext("2d");
    var myChart = new Chart(ctx,{
    type:"polarArea",
    data:{
        labels: [
            'Users',
            'Groups',
            'Followers'
        ],
        datasets:[
            {
                data: [100, 50, 80],
                fill: true,
                label: "Graph",
                backgroundColor:[
                    'rgb(102, 204, 255)',
                    'rgb(102, 0, 255)',
                    'rgb(255, 204, 0)'
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