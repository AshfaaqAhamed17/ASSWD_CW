<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<div class="container-fluid py-3 ">
    <div class="helo">

    </div>
    <div class="row">
        <div class="col-9">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" id="searchBtn">Search</button>
            </form>

            <div class="card mt-3 px-3 py-1 shadow-lg border-0" id="explore">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="./../assets/images/user.png" class="post_card_userimg">
                        <div class="ms-4 mt-2">
                            <h5 class="mb-0" id="post_username"></h5>
                            <p>Today</p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                    </button>
                </div>

                <div class="row">
                    <div class="col-4">
                        <img src="./../assets/images/login.webp" class="img-fluid">
                        <div class="d-flex mt-2 justify-content-between">
                            <a href="#" class="me-3 text-dark">
                                <i class="fa fa-heart-o fs-2" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="me-3 text-dark">
                                <i class="fa fa-comment-o fs-2" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="me-3 text-dark">
                                <i class="fa fa-share-square-o fs-2" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-8">
                        <h5>Caption Lorem ipsum dolor sit amet.</h5>
                        <div>#123 #123 Lorem ipsum.</div>
                        <div class="bg-light mt-4 px-4 py-1 landing_card_txt" style="height: 200px;">
                            <div class="d-flex align-items-start my-3">
                                <img src="./../assets/images/user.png" class="post_card_comment_userimg">
                                <div class="ms-3 w-100">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Username</h6>
                                        <h6>Today</h6>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>

                            <div class="d-flex align-items-start my-3">
                                <img src="./../assets/images/user.png" class="post_card_comment_userimg">
                                <div class="ms-3 w-100">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6>Username</h6>
                                        <h6>Today</h6>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-3">
            <div class="w-100 explore_usercover_img d-flex align-items-center justify-content-center">
                <img src="./../assets/images/user.png" class="img-fluid w-50">
            </div>
            <div class="text-center">
                <h5 class="mb-0">
                    Username
                </h5>
                <p class="mb-0">Description</p>
                <a href="#">
                    <button class="btn btn-primary">View Profile</button>
                </a>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide mt-4" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./../assets/images/login.webp" class="d-block w-100" style="height: 200px;" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://as2.ftcdn.net/v2/jpg/02/88/31/61/1000_F_288316108_qEHo10DffYyauk9fQhOv1XcDfC7r7C8o.jpg" class="d-block w-100" style="height: 200px;" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="./../assets/images/logo.png" class="d-block w-100" style="height: 200px;" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
</div>

<?php
$this->load->view('templates/footer');
?>