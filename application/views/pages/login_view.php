<?php $this->load->view('templates/header'); ?>

<div class="container-fluid auth-cont">
    <div class="row h-100">
        <div class="col-7 my-auto text-center">
            <img src="./../assets/images/login.webp" class="login_img" />
        </div>
        <div class="col-5 px-5 form_sec">
            <div class="text-center mt-5 pt-4 logo">
                <img src="./../assets/images/logo.png" class="logo_img" />
            </div>

            <form class="px-4">
                <div class="pt-4 pb-3 fw-bold login_name">Log In</div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="inputUserName" placeholder="Enter Username">
                </div>
                
                <div class="mb-3 input-group" id="show_hide_password">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                    <div class="input-group-addon" style="background-color:#a3a3a3; border-radius: 0 10px 10px 0; padding: 5px">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="d-md-flex justify-content-md-end">
                    <button class="btn btn-primary" type="button" id="login">Login</button>
                </div>
            </form>
            <p class="no_acc mt-4 text-center">Don't have an account? <a href="Signup" class="no_acc_signup">Sign Up</a></p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
// backbone js model and view
        
    var LoginModel = Backbone.Model.extend({
        defaults: {
            userName: '',
            password: ''
        }
    });
    
    var LoginView = Backbone.View.extend({
        el: '.form_sec',
        events: {
            'click #login': 'login'
        },
        initialize: function() {
            this.model = new LoginModel();
            this.listenTo(this.model, 'change', this.render);
        },
        render: function() {
            this.$el.find('#inputUserName').val(this.model.get('userName'));
            this.$el.find('#inputPassword').val(this.model.get('password'));
        },
        login: function() {
            this.model.set({
                userName: this.$el.find('#inputUserName').val(),
                password: this.$el.find('#inputPassword').val()
            });
            if(this.model.get('userName') == "" ){
                alert('Please enter username');
                // Show an error message or take other necessary action
            }
            else if(this.model.get('password') == "" ){
                alert('Please enter password');
                // Show an error message or take other necessary action
            }else{

                console.log(" LINE 76 ", this.model.toJSON());
                $.ajax({
                    url: '<?php echo base_url() ?>api/Auth',
                    type: 'POST',
                    data: this.model.toJSON(),
                    
                }).done(function(response) {
                    console.log(" LINE 83 ", response);
                    alert('User Logged In Successfully');
                    window.location.href = '<?php echo base_url() ?>Profile';
                }).fail(function(response) {
                    console.log(" LINE 87 ", response.responseJSON.message);
                    alert(response.responseJSON.message);
                });
            }
        }
        
    });
    
    var loginView = new LoginView();
</script>
<?php
// $this->load->view('templates/footer');
?>