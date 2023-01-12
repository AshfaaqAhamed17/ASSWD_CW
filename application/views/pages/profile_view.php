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
                <a href="login" class="btn btn-outline-danger ms-2"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
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

    <!-- POST IMAGES ARE DISPLAYED -->
    <div class="container text-center mt-5" id="all_user_posts">
        <div class="row row-cols-md-4 g-3" id="post_imgs">
        </div>
    </div>
</div>
<div class="mt-5"></div>

<script>

    var ProfilePostModel = Backbone.Model.extend({
        url: "<?php echo base_url() ?>api/Post/12",
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
        url: "<?php echo base_url() ?>api/Post/12",
    });

    var allUserPosts = new ProfilePostCollection();
    allUserPosts.fetch({async: false}).done(() => {
        console.log("Profile Post Collection Fetched", allUserPosts);
    });

    var ProfilePostView = Backbone.View.extend({
        el: "#post_imgs",
        initialize: function() {
            this.render();
            console.log("Profile Post View Initialized");
        },
        render: function() {
            var posts = allUserPosts['models'][0]['attributes']['data'];
            console.log("Post: ", posts);
            
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
                            <img src="http://localhost/codeigniter-cw/uploads/${postImg}" class="card-img-top ">
                            <div class="card-body">
                                <p class="card-text">${postCaption}</p>
                                <p class="card-text"><small class="text-muted">${postLocation}</small></p>
                                <p class="card-text"><small class="text-muted">${postCreatedTime}</small></p>
                            </div>
                        </div>
                    </div>
                `;

                this.$el.append(postCard);
            }
        }
    });

    var profilePostView = new ProfilePostView();
</script>

<?php $this->load->view('templates/footer'); ?>