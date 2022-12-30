<?php $this->load->view('templates/header'); ?>

<div class="container-fluid auth-cont">
    <div class="row h-100">
        <div class="col-7 my-auto text-center">
            <img src="./../assets/images/login.webp" class="login_img" />
        </div>
        <div class="col-5 px-5 form_sec">
            <div class="text-center mt-5 logo">
                <img src="./../assets/images/logo.png" class="logo_img" />
            </div>

            <form class="px-4">
                <div class="pt-4 pb-3 fw-bold login_name">Sign Up</div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password">
                </div>
                <div class="d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button">Signup</button>
                </div>
            </form>
            <p class="no_acc mt-4 text-center">Already have an account? <a href="#" class="no_acc_signup">Log In</a></p>
        </div>
    </div>
</div>
<?php
// $this->load->view('templates/footer');
?>