<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<div class="container-fluid py-3 " id="explore_page">
    <div class="helo">

    </div>
    <div class="row">
        <div class="col-9">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" id="searchBtn">Search</button>
            </form>

            <!-- POST IMAGES ARE DISPLAYED -->
            <div class="container text-center mt-5" id="all_user_posts">
                    <div class="row row-cols-md-4 g-3" id="post_imgs">
                    </div>
                </div>
        
        </div>


        <div class="col-3">
            <div class="w-100 explore_usercover_img d-flex align-items-center justify-content-center">
                <img src="./../assets/images/user.png" class="img-fluid w-50">
            </div>
            <div class="text-center" id="uDetail">

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

<div class="modal fade bd-example-modal-xl" id="postModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center">
                    <img src="./../assets/images/user.png" class="post_card_userimg">
                    <div class="ms-4 mt-2" id="postUname">
                        <h5 class="mb-0" id="post_username"></h5>
                        <p id="postCreatedTime"></p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <img src="" class="img-fluid" id="post_img" style="height: 500px">
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
                        <h5 id="post_cap"></h5>
                        <div>#123 #123 Lorem ipsum.</div>
                        <div class="bg-light mt-4 px-4 py-1 landing_card_txt" style="height: 400px;">
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
                        <div>
                        <form class="d-flex mt-3">
                            <input class="form-control me-2" placeholder="Comment...">
                            <button class="btn btn-primary" id="searchBtn">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    //block user from routing to other pages
    document.addEventListener("DOMContentLoaded", function(event) {
       console.log("DOM fully loaded and parsed");
       if(localStorage.getItem("token") == null){   
           window.location.href = '<?php echo base_url() ?>Login';
       }
   });

    var user_id = localStorage.getItem("userID");
    var user_name = localStorage.getItem("username");
    var userDescription = localStorage.getItem("userDescription") ? localStorage.getItem("userDescription") : "My bio...";
    console.log("local -- ",user_id, user_name);


    $(document).on('click', '.postid_img', function() {
        var img_src = $(this).attr('src');
        var img_cap = $(this).attr('data-caption');
        var img_time = $(this).attr('data-cTime');
        var img_uname = $(this).attr('data-uName');

        console.log( "133  --  ",$(this).attr('src'));
        console.log( "134  --  ",$(this).attr('data-caption'));
        
        $('#post_img').attr('src', img_src);
        $('#post_cap').text(img_cap);
        $('#postCreatedTime').text(img_time);
        $('#post_username').text(img_uname);
        
        $('#postModal').modal('show');
    });

    var ProfilePostModel = Backbone.Model.extend({
        url: "<?php echo base_url() ?>api/Post/",
        defaults: {
            caption: "",
            createdTime: "",
            image: "",
            location: "",
            postID: null,
            userID: 1
        },
        initialize: function() {
            console.log("Profile Post Model Initialized", this.attributes.data);
        }
    });

    var ProfilePostCollection = Backbone.Collection.extend({
        model: ProfilePostModel,
        url: "<?php echo base_url() ?>api/Post/",
    });

    var allUserPosts = new ProfilePostCollection();
    allUserPosts.fetch({async: false}).done(() => {
        console.log("Profile Post Collection Fetched", allUserPosts);
    });

    var ProfilePostView = Backbone.View.extend({
        el: "#explore_page",
        initialize: function() {
            this.render();
            console.log("Profile Post View Initialized");
        },
        render: function() {
            if (allUserPosts.length == 0) {            
                $('#all_user_posts').append("<h1 class='py-5' style='color:#0066cc'>No posts uploaded yet!</h1>");
            }else{
                var posts = allUserPosts['models'][0]['attributes']['data'];
                console.log("Post: ", posts);
                console.log("105 -- Posts: ", posts.length);

                for (var i = 0; i < posts.length; i++) {
                    var post = posts[i];
                    var postImg = post['image'];
                    var postCaption = post['caption'];
                    var postLocation = post['location'];
                    var postCreatedTime = post['createdTime'];
                    var postID = post['postID'];
                    var userID = post['userID'];
                    var uName = post['userName'];
                    
                    var postCard = `
                    <div class="col">
                    <div class="card shadow-lg">
                    <img src="http://localhost/codeigniter-cw/uploads/${postImg}" class="card-img-top postid_img" height=350 
                        id="${postID}" data-caption="${postCaption}" data-cTime="${postCreatedTime}" data-uname="${uName}">
                    </div>
                    </div>
                    `;
                    $('#post_imgs').append(postCard);
                }

                $('#uDetail').append(`
                <h5 class="mb-0">${user_name}</h5>
                <a href="Profile">
                    <button class="btn btn-primary mt-1">View Profile</button>
                </a>
                `);
            }
        }
    });

    var profilePostView = new ProfilePostView();


</script>

<?php
$this->load->view('templates/footer');
?>