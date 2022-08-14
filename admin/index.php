<?php include_once($_SERVER['DOCUMENT_ROOT']."/livechat/application/links/index.php"); ?>

<div class="container"> 
    <div class="col-3 position-absolute top-50 start-50 translate-middle" id='view'>
        <div class="col border border-3 p-3 fw-light">
    
            <div class="col text-center text-secondary bg-light text-uppercase p-3 fw-bold" id="admin_panel">
                <span>Admin Panel</span>
            </div>

            <form action="" method="post">
                <div class="mb-3 mt-2">
                    <label for="username" class="form-label">User ID</label>
                    <input type="text" class="form-control" id="username">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox">
                    <label class="form-check-label" for="checkbox">Check me out</label>
                </div>

                <input type="submit" value="SUBMIT" class='btn btn-primary' id='submit'>
                <input type="reset" value="RESET" class="btn btn-danger" id="reset">

            </form>
            <div class="col" id='show'></div>
        </div>
    </div>
</div>
<?php 
    $hostname = getenv('HTTP_HOST');
    echo "
        <script src='http://$hostname/livechat/admin/script/java.js'></script>
    ";
?>

<div class="toast-container position-absolute top-0 end-0 p-3">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id='toast1'>
        <div class="toast-body">
            Username or Password is Wrong ...! 
            <div class="mt-2 pt-2 border-top">
                <button type="button" class="btn btn-primary btn-sm" id='sendemail'>Take action</button>
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="toast text-white bg-primary position-fixed top-0 end-0 bd-example-toasts" role="alert" aria-live="assertive" aria-atomic="true" id='toast2'>
  <div class="d-flex">
    <div class="toast-body">
        password reset link has been sent to your email
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 bg-transparent">
            <div class="offset-4 col-3 modal-body">
                <img src="<?php echo "http://$hostname/livechat/img/loding.gif";?>" class="d-block img-fluid rounded" alt="...">
            </div>
        </div>
    </div>
</div>
