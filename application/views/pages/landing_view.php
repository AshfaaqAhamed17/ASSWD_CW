<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar-outside'); ?>

<div class="container-fluid landing_cont px-0 mb-5 pb-5">
    <img src="./../assets/images/login.webp" class="landing_img" />
    <div class="landing_img_txt fs-1 text-center" style="font-weight:bold">Welcome to 
            <img src="http://localhost/codeigniter-cw/assets/images/logo2.png" class="img-fluid mb-2" style="height:85px">
    </div>

    <div class="my-5">
        <p class="text-center fs-1 fw-bold landing_heading_1">Explore our explicit contents.</p>
        <p class="text-center landing_heading_2">Please Login or Signup to explore more!</p>
    </div>


    <div class="container text-center">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-lg">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTMoEt2rfhOCSA_EGB4U3RO93aFHyr1GMKX-A&usqp=CAU" class="card-img" style="height: 300px;" >
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="https://images.unsplash.com/photo-1484950763426-56b5bf172dbb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjB8fGNvdmVyJTIwcGhvdG98ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" class="card-img" style="height: 300px;">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="https://images.unsplash.com/photo-1623627484632-f041d1fb366d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8Y292ZXIlMjBwaG90b3xlbnwwfHwwfHw%3D&w=1000&q=80" class="card-img" style="height: 300px;">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="https://images.pexels.com/photos/1323206/pexels-photo-1323206.jpeg?cs=srgb&dl=pexels-mixu-1323206.jpg&fm=jpg" class="card-img" style="height: 300px;">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="https://images.unsplash.com/photo-1528465424850-54d22f092f9d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y292ZXIlMjBwaG90b3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" class="card-img" style="height: 300px;">
                </div>
            </div>

            <div class="col">
                <div class="card shadow-lg">
                    <img src="https://images.unsplash.com/photo-1444703686981-a3abbc4d4fe3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8Y292ZXIlMjBwaG90b3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" class="card-img" style="height: 300px;">
                </div>
            </div>
        </div>
    </div>
</div>



<?php 
$this->load->view('templates/footer'); 
?>