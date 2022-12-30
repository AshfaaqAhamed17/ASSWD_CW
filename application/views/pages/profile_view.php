<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<div class="container-fluid landing_cont px-0">

    <div class="container-fluid row mt-4 px-5">

        <div class="col-2">
            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 100%;">
                <img src="./../assets/images/user.png" class="img-fluid w-50">
            </div>
        </div>
        <div class="col-5">
            <p class="text-start fs-4 fw-bold m-0">USERNAME</p>
            <p class="text-start m-0">DESCRIPTION - Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="d-flex">
                <a class="btn btn-primary  mx-0"><i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit Profile</a>
                <a class="btn btn-outline-danger ms-2"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="col-5 ">
            <div class="row d-flex align-items-center justify-content-center" style="height: 100%;">
                <div class="col-4 ">
                    <p class="text-center fs-3 fw-bold landing_heading_1">07 <br />Posts</p>
                </div>
                <div class="col-4 ">
                    <p class="text-center fs-3 fw-bold landing_heading_1">07 <br />Followings</p>
                </div>
                <div class="col-4 ">
                    <p class="text-center fs-3 fw-bold landing_heading_1">07 <br />Followers</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mt-5">
        <div class="row row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-lg">
                    <img src="./../assets/images/logo.png" class="card-img-top ">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="./../assets/images/logo.png" class="card-img-top ">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="./../assets/images/logo.png" class="card-img-top ">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="./../assets/images/logo.png" class="card-img-top ">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="mt-5"></div>

<?php $this->load->view('templates/footer'); ?>