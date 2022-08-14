<?php include_once($_SERVER['DOCUMENT_ROOT']."/livechat/application/links/index.php"); ?>
<div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="position-fixed position-absolute top-0 end-0 p-3">
                <!-- all fields are required  -->
                <div class='toast' id='liveToast7'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        All Fields are Required....
                    </div>
                </div>
        </div>
    </div>
<body>
    <div class="container img-radius">
        <div class="row" id='slider'>
            <nav class="navbar navbar-expand-lg">
                <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" alt="fav-icon" class='img-fluid rounded'>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="nav" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active teraclass1 text-secondary" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"  role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link teraclass1 text-secondary" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">About</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link teraclass1 text-secondary" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"  role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link teraclass1 text-secondary" id="pills-Blog-tab" data-bs-toggle="pill" data-bs-target="#pills-blog"  role="tab" aria-controls="pills-blog" aria-selected="false">Blog</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- slider page -->
            <div class="col-lg-6">
                <div id="carouselExampleDark" class="carousel  carousel-fade " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item" data-bs-interval="5000">
                            <img src="<?php echo "http://$hostname/livechat/img/slider/1.png";?>" class="d-block w-100 img-fluid rounded" alt="...">
                        </div>
                        <div class="carousel-item " data-bs-interval="5000">
                            <img src="<?php echo "http://$hostname/livechat/img/slider/5.png";?>" class="d-block w-100 img-fluid rounded" alt="...">
                        </div>
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="<?php echo "http://$hostname/livechat/img/slider/3.png";?>" class="d-block w-100 img-fluid rounded" alt="...">
                        </div>        
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <!-- login page -->
                        <div class="col mt-5">
                            <div class="col-md-9 offset-md-3 border p-5  border-3 rounded-2 text-dark">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                        <div class="col rounded text-center g-0 p-2 "><hr>
                                            <span class='h4 text-center'>Log in</span><hr>
                                        </div>
                                            <div class="mb-3">
                                                <label for="email text-dark" class="form-label">Email address</label>
                                                <input type="email" class="form-control  bg-transparent" id="email" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control  bg-transparent" id="password">
                                            </div>

                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input bg-transparent" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Keep me logged in (for up to 365 days)</label>
                                            </div>

                                            <div class="nav m-2" id="nav-tab" role="tablist">

                                            <div class="col text-start">
                                                    <a class="link text-start" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Forget Password → </a>
                                            </div>

                                            <div class="col text-end">
                                                    <a class="link text-end" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">New Registration</a>
                                            </div>

                                            </div>

                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-secondary  text-center" value='login' onclick='login();'>Log in</button>
                                            </div>
                                    </div>

                                    <!-- Forget Password -->

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                        <div class="col rounded text-center g-0 p-2 "><hr>
                                            <span class='h4 text-center'>Forget Password</span><hr>
                                        </div>
                                            <div class="col-md-">
                                                <label for="inputEmail4" class="form-label">Email</label>
                                                <input type="email" class="form-control  bg-transparent" id="inputEmail4">
                                            </div>
                                            <div class="d-grid gap-2 mt-2">
                                                <button type="submit" class="btn btn-secondary" onclick='forget();'>Reset Password</button>
                                            </div>
                                            <a class='nav-link back_to_login rg-right'>&#8592; Back To Login</a>
                                    </div>


                                    <!-- Sign in -->


                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="col rounded text-center g-0 p-2 "><hr>
                                            <span class='h4 text-center'>Sign in</span><hr>
                                        </div>
                                            <div class="mb-3">
                                                <label for="emailid" class="form-label">Email address</label>
                                                <input type="email" class="form-control  bg-transparent" id="emailid" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">User Name</label>
                                                <input type="text" class="form-control  bg-transparent" id="username" aria-describedby="emailHelp">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cpassword" class="form-label">Password</label>
                                                <input type="password" class="form-control  bg-transparent" id="cpassword">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ccpassword" class="form-label">Confim Password</label>
                                                <input type="password" class="form-control  bg-transparent" id="ccpassword">
                                            </div>  
                                            <span id='invalidmsg'></span>
                                            <a class='nav-link back_to_login rg-right'>&#8592; Back To Login</a>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input  bg-transparent" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Agree T&C</label>
                                            </div>
                                            <div class="d-grid gap-2 ">
                                            <button type="submit" class="btn btn-secondary" onclick='reg()'>Sign UP</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- about us -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col text-center">
                        <p class='display-6'>Welcome to About page</p>
                        <h3 class='text-info fw-light'>Live Chat</h3>
                        <h5 class='mt-2 fw-light'>We are the team of talented developer making websites</h5>
                        <button class='mt-2 btn btn-outline-primary '>Contact Now</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <!-- <form method="post"> -->
                            <div class="col-md-9 offset-md-2 reset">
                                <div class="mb-3 text-center">
                                <p class='display-6'>Contact Us</p>
                                </div>
                                <div class="mb-3">
                                    <label for="fname" class="form-label fw-light">Full Name</label>
                                    <input type="text" class="form-control bg-transparent" id="fname" placeholder="Full Name">
                                </div>
                                <div class="mb-3">
                                    <label for="femail" class="form-label fw-light">Email Address</label>
                                    <input type="text" class="form-control bg-transparent" id="femail" placeholder="Email Address">
                                </div>
                                <div class="mb-3">
                                    <label for="fselect" class="form-label fw-light">Select</label>
                                    <select class="form-select bg-transparent" aria-label="Default select example" id='fselect'>
                                        <option value="feedback">Feedback</option>
                                        <option value="Query">Query</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="fmessage" class="form-label fw-light">Message</label>
                                    <textarea class="form-control bg-transparent" id="fmessage" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="text-start">
                                    <input type="submit" value="SUBMIT" class="btn btn-outline-primary" id="feedback">
                                </div>
                            </div>
                        <!-- </form> -->
                    </div>
                    <div class="tab-pane fade" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">
                        <div class="col text-center">
                            <p class='display-6'>Welcome to Blog Page</p>
                            <h3 class='text-info fw-light'>Here Answer of Users Query</h3>
                                <span class='m-5' id="answer"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <span>Copyright &copy; 2021 LiveChat&reg; All Rights Reserved</span>
    </div>

    <div class="col">
        <span id='log_msg'></span>
        <span id='registration_msg'></span>
        <span id='forget_msg'></span>
    </div>

    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="position-fixed position-absolute top-0 end-0 p-3">
                <!-- Then Username Or Password is Wrong -->
                <div class="toast" id='liveToast3'>
                    <div class="toast-header">
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class="rounded me-2" alt="tost">
                        <strong class="me-auto">LiveChat</strong>
                        <small>&#128162;</small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class="toast-body">
                        Username Or Password is Wrong....&#x1F44E;
                    </div>
                </div>
                  <!-- Then Username Already Exits -->
                  <div class='toast' id='liveToast5'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class=
                        'btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Username Already Exits....&#x1F44E;
                    </div>
                </div>
                <!-- Then Record Inserted Successfully -->
                <div class='toast' id='liveToast4'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Record Inserted Successfully....&#128077;
                    </div>
                </div>
                <!-- Password Send to Registed Email Id -->
                <div class='toast' id='liveToast6'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Password Send to Registed Email Id....&#128077;
                    </div>
                </div>
                <!-- all fields are required  -->
                <div class='toast' id='liveToast7'>
                    <div class='toast-header'>
                        <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;' class='rounded me-2' alt='tost'>
                        <strong class='me-auto'>LiveChat</strong>
                        <small></small>
                        <button type='button'  class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        All Fields are Required....&#128077;
                    </div>
                </div>
                <!-- Instert any one here-->
        </div>
    </div>
    <div aria-live="polite" aria-atomic="true" class="position-relative">
        <div class="toast-container position-absolute position-fixed bottom-0 end-0 p-3">

            <div id="liveToast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;'class="rounded me-2" alt="...">
                    <strong class="me-auto"></strong>
                    <small class='timemsg'>11 seconds ago </small>
                    <button type="button"  class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Any Help Releted LiveChat Plz contact or feedback....!
                </div>
            </div>
            
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="<?php echo "http://$hostname/livechat/img/fav-icon.png";?>" style='height:20px; width:30px;'class="rounded me-2" alt="...">
                    <strong class="me-auto"></strong>
                    <small class='timemsg'>1 seconds ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Welcome to LiveChat..!
                </div>
            </div>
        </div>
    </div>
</body>

<script>
$(document).ready(function(){
        function msg(){
            $('#liveToast').toast('show');
        }setTimeout(msg, 2000);

        function msg1(){
            $('#liveToast1').toast('show');
        }setTimeout(msg1, 10000); 

        $('.back_to_login').on('click',function(){
            window.location.reload(true);
        })
        
    $.ajax({
        url : hostname+"/livechat/application/app/answer.php",
        success : function(data){
            $("#answer").html(data);   
        }
    });

});
</script>
