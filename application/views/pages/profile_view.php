<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<div class="container-fluid landing_cont px-0" id="profile_div">

    <div class="container-fluid row mt-4 px-5">

        <div class="col-2">
            <div class="w-100 d-flex align-items-center justify-content-center" style="height: 100%;">
                <img src="./../assets/images/user.png" class="img-fluid w-50">
            </div>
        </div>
        <div class="col-5" id="uname_desc">
            <!-- <p class="text-start fs-4 fw-bold m-0" id="profile_uname"></p> -->
            <!-- <p class="text-start m-0">DESCRIPTION - Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
            <!-- <div class="d-flex">
                <button class="btn btn-primary  mx-0"><i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit Profile</button>
                <button class="btn btn-outline-danger ms-2" id="logout"><i class="fa fa-sign-out"></i></button>
            </div> -->
        </div>
        <div class="col-5 ">
            <div class="row d-flex align-items-center justify-content-center" id="profile_stats" style="height: 100%;">
                <div class="col-4 " id="stats_posts">
                </div>
                <div class="col-4 " id="stats_following">
                    <p class="text-center fs-3 fw-bold landing_heading_1" >07 <br />Followings</p>
                </div>
                <div class="col-4 " id="stats_followers">
                    <p class="text-center fs-3 fw-bold landing_heading_1" >07 <br />Followers</p>
                </div>
            </div>
        </div>
    </div>

    <!-- POST IMAGES ARE DISPLAYED -->
    <div class="container text-center mt-5" id="all_user_posts">
    <div class="row row-cols-md-4 g-3" id="post_imgs">
        </div>
    </div>
</div>
<div class="mt-5"></div>

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

    var LogoutView = Backbone.View.extend({
        el: "#profile_div",
        events: {
            'click #logout': 'logout'
        },
        logout: function(){
            localStorage.clear();
            window.location.href = '<?php echo base_url() ?>Login';
        }
    });

    var logoutView = new LogoutView();

    var ProfilePostModel = Backbone.Model.extend({
        url: "<?php echo base_url() ?>api/Post/"+user_id,
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
        url: "<?php echo base_url() ?>api/Post/"+user_id,
    });

    var allUserPosts = new ProfilePostCollection();
    allUserPosts.fetch({async: false}).done(() => {
        console.log("Profile Post Collection Fetched", allUserPosts);
    });

    var ProfilePostView = Backbone.View.extend({
        el: "#profile_div",
        initialize: function() {
            this.render();
            console.log("Profile Post View Initialized");
        },
        render: function() {
            if (allUserPosts.length == 0) {            
                $('#all_user_posts').append("<h1 class='py-5' style='color:#0066cc'>No posts uploaded yet!</h1>");
                $('#stats_posts').append("<p class='text-center fs-3 fw-bold landing_heading_1' > 0 <br />Posts</p>");
                $("#uname_desc").append(`
                    <p class='text-start fs-4 fw-bold m-0'>${user_name}</p>
                    <p class="text-start m-0">${userDescription}</p>
                    <div class="d-flex">
                        <button class="btn btn-primary  mx-0"><i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit Profile</button>
                        <button class="btn btn-outline-danger ms-2" id="logout"><i class="fa fa-sign-out"></i></button>
                    </div>
                    `
                );
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
                    
                    var postCard = `
                    <div class="col">
                    <div class="card shadow-lg">
                    <img src="http://localhost/codeigniter-cw/uploads/${postImg}" class="card-img-top" height=350>
                    </div>
                    </div>
                    `;
                    $('#post_imgs').append(postCard);
                }
                $('#stats_posts').append("<p class='text-center fs-3 fw-bold landing_heading_1' >"+posts.length+" <br />Posts</p>");
                $("#uname_desc").append(`
                    <p class='text-start fs-4 fw-bold m-0'>${user_name}</p>
                    <p class="text-start m-0">${userDescription}</p>
                    <div class="d-flex">
                        <button class="btn btn-primary  mx-0"><i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit Profile</button>
                        <button class="btn btn-outline-danger ms-2" id="logout"><i class="fa fa-sign-out"></i></button>
                    </div>
                    `
                );
            }
        }
    });

    var profilePostView = new ProfilePostView();

</script>

<?php $this->load->view('templates/footer'); ?>