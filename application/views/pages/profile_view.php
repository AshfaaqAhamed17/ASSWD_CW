<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/navbar'); ?>

<div class="container-fluid landing_cont px-0" id="profile_div">

    <div class="container-fluid row mt-4 px-5">

        <div class="col-2">
            <div class="d-flex align-items-center justify-content-center rounded-circle" style="overflow: hidden; background-color: black; width:150px; height:150px">
                <img src="" class="img-fluid" style="height:100%" id="main_prof_pic">
            </div>
        </div>
        <div class="col-5" id="uname_desc">
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

<!-- popup view to display image after onlick -->
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
                    <div class="col-4 text-center">
                        <img src="" class="img-fluid rounded" id="post_img" style="height: 500px;">
                        <div class="d-flex mt-2 px-2 justify-content-around">
                            <a href="#" class="me-3 text-dark">
                                <i class="fa fa-heart fs-2" style="color:red" aria-hidden="true"></i>
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
                        <div>#HASHTAGS 123 #123 Lorem ipsum.</div>
                        <div class="bg-light mt-4 px-4 py-1 landing_card_txt" id="comSec" style="height: 400px;">
                            <div class="d-flex align-items-start my-3">
                            </div>
                        </div>
                        <div>
                        <form class="d-flex mt-3" id="cmmntSec">
                            <input class="form-control me-2" placeholder="Comment..." id="inputComment">
                            <button type="button" class="btn btn-primary" id="commentBtn">Comment</button>
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

<!-- modal popup view to edit profile -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <!-- <div class="mb-3">
                        <label for="uname" class="col-form-label">Username:</label>
                        <input type="text" class="form-control" id="uname">
                    </div> -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ufname" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ulname" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="udesc" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="uaddress" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="utelnum" placeholder="Telephone No">
                    </div>
                    <div class="mb-3">
                        <label for="profile_img" class="col-form-label">Profile Image:</label>
                        <input type="file" class="form-control" id="profile_img">
                    </div>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateProfile">Save changes</button>
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
    var userDescription = localStorage.getItem("userDescription") !== 'null' ? localStorage.getItem("userDescription") : "My Bio...";
    var userAddress = localStorage.getItem("userAddress") !== 'null' ? localStorage.getItem("userAddress") : "";
    var userTelNo = localStorage.getItem("userTelNo") !== 'null' ? localStorage.getItem("userTelNo") : 0000000000;
    var userFirstName = localStorage.getItem("userFirstName") !== 'null' ? localStorage.getItem("userFirstName") : "";
    var userLastName = localStorage.getItem("userLastName") !== 'null' ? localStorage.getItem("userLastName") : "";
    var profileImage = localStorage.getItem("profileImage") !== 'null' ? localStorage.getItem("profileImage") : "default.jpg";
   
    console.log("local -- ",user_id, " | ", user_name, " | ", userDescription);

    // OPEN POPUP FOR EDITING PROFILE
    $(document).on('click', '#edit_btn', function() {
        $('#editProfileModal').modal('show');
        $('#uname').val(user_name);
        $('#ufname').val(userFirstName);
        $('#ulname').val(userLastName);
        $('#utelnum').val(userTelNo);
        $('#uaddress').val(userAddress);
        $('#udesc').val(userDescription);
    });

    // EDIT USER DETAILS
    $(document).on('click', '#updateProfile', function() {
        var uname = $('#uname').val();
        var ufname = $('#ufname').val();
        var ulname = $('#ulname').val();
        var utelnum = $('#utelnum').val();
        var uaddress = $('#uaddress').val();
        var udesc = $('#udesc').val();

        var formData = new FormData();
        formData.append('userID', user_id);
        formData.append('userName', uname);
        formData.append('fName', ufname);
        formData.append('lName', ulname);
        formData.append('telNum', utelnum);
        formData.append('uAddress', uaddress);
        formData.append('uDesc', udesc);
        formData.append('profileImg', $('#profile_img')[0].files[0]);

        $.ajax({
            url: '<?php echo base_url() ?>api/Auth/updateProfile',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
        }).done(function(data) {
            console.log("data -- ",data);
            if(data.status = true){
                console.log(data);
                console.log("data Desc-- ",data.data.userDescription);
                alert("Profile updated successfully");

                // CLOSE THE POPUP
                $('#editProfileModal').modal('hide');

                localStorage.setItem('userDescription', data.data.userDescription);
                localStorage.setItem('userAddress', data.data.userAddress);
                localStorage.setItem('userTelNo', data.data.userTelNo);
                localStorage.setItem('userFirstName', data.data.userFirstName);
                localStorage.setItem('userLastName', data.data.userLastName);
                localStorage.setItem('profileImage', data.data.profileImage);
                
                window.location.reload();

                // window.location.href = '<?php echo base_url() ?>Profile';
            }else{
                alert("Profile update failed");
            }
        }).fail(function(data) {
            console.log("error -- ",data);
        });
    });

    // INSERT A COMMENT TO A POST
    function insertComment(postID, e) {
        $(document).on('click', '#commentBtn', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var comment = $('#inputComment').val();
            // var post_id = $('.postid_img').attr('data-postid');
            console.log("comment to insert -- ",comment);
            console.log("comments post id -- ",postID);
            
            $.ajax({
                url: '<?php echo base_url() ?>api/Comment/insertComment',
                type: 'POST',
                data: {
                    'postID': postID,
                    'comment': comment,
                    'userID': user_id
                },
            }).done(function(data) {
                if(data.status = true){
                    console.log(data);
                    alert("Comment added successfully");
                    // CLOSE THE POPUP
                    $('#editProfileModal').modal('hide');
                    window.location.reload();
                    // $('#postModal').modal('hide');
                    
                    // window.location.href = '<?php echo base_url() ?>Profile';
                }else{
                    alert("Comment adding failed");
                }
            });
        });
    }
    
    
    // OPEN POSTS POPUP AND LOAD POST AND COMMENTS
    $(document).on('click', '.postid_img', function openPostPopup() {
        var img_src = $(this).attr('src');
        var img_cap = $(this).attr('data-caption');
        var img_time = $(this).attr('data-cTime');
        var post_id = $(this).attr('id');
        insertComment(post_id);
        console.log( "140  --  ",post_id);
        console.log( "141  --  ",$(this).attr('src'));
        console.log( "142  --  ",$(this).attr('data-caption'));

        $('#comSec').text("");
        $('#post_img').attr('src', img_src);
        $('#post_cap').text(img_cap);
        $('#postCreatedTime').text(img_time);
        $('#post_username').text(user_name);
        
        $.ajax({
            url: '<?php echo base_url() ?>api/Comment/' + post_id,
            type: 'GET',
            data: {
                postID : post_id
            }
        }).done(function(response) {
            if(response.status == true){
                console.log("yes comments -- ",response['data']);
                for(var i=0; i<response['data'].length; i++){
                    console.log("yes comments -- ",response['data'][i].comment);
                    $('#comSec').append(`
                        
                    <div class="d-flex align-items-start my-3">
                        <img src="./../assets/images/user.png" class="post_card_comment_userimg">
                        <div class="ms-3 w-100" >
                            <div class="d-flex justify-content-between align-items-center">
                                <h6>`+response['data'][i].userName+`</h6>
                                <h6>`+response['data'][i].createdTime+`</h6>
                            </div>
                            <p>`+response['data'][i].comment+`</p>
                        </div>
                    </div>
                        `);
                }
            }else{
                console.log("no comments -- ",response);
                $('#comSec').append(`   
                    <p class="text-center my-5">`+ response['message'] +`</p>
                `);
            }
        }).fail(function(response) {
            console.log("no  -- ",response);
           
        })

        $('#postModal').modal('show');
    });

    // GET USERS POSTS AND DISPLAY IN CARDS. {PROFILE PAGE - model & collection to get posts}
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
    allUserPosts.fetch({async: false})

    // DISPLAY THE POSTS. {PROFILE PAGE - view to display posts}
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
                        <button class="btn btn-primary  mx-0" id="edit_btn"><i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit Profile</button>
                        <button class="btn btn-outline-danger ms-2" id="logout"><i class="fa fa-sign-out"></i></button>
                    </div>
                    `
                );
                $("#main_prof_pic").attr('src', "http://localhost/codeigniter-cw/uploads/profiles/default.jpg"); 
                // + profileImage);
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
                    <img src="http://localhost/codeigniter-cw/uploads/${postImg}" class="card-img-top postid_img" height=350 
                        id="${postID}" data-caption="${postCaption}" data-cTime="${postCreatedTime}" data-postid="${postID}">
                    </div>
                    </div>
                    `;
                    $('#post_imgs').append(postCard);
                    
                }
                $("#main_prof_pic").attr('src', "http://localhost/codeigniter-cw/uploads/profiles/" + profileImage);
                $('#stats_posts').append("<p class='text-center fs-3 fw-bold landing_heading_1' >"+posts.length+" <br />Posts</p>");
                $("#uname_desc").append(`
                    <p class='text-start fs-4 fw-bold m-0'>${user_name}</p>
                    <p class="text-start m-0">${userDescription}</p>
                    <div class="d-flex">
                        <button class="btn btn-primary  mx-0" id="edit_btn"><i class="fa fa-pencil me-2" aria-hidden="true"></i>Edit Profile</button>
                        <button class="btn btn-outline-danger ms-2" id="logout"><i class="fa fa-sign-out"></i></button>
                    </div>
                    `
                );
                
            }
        }
    });

    var profilePostView = new ProfilePostView();

    // LOGOUT USER
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

</script>

<?php $this->load->view('templates/footer'); ?>