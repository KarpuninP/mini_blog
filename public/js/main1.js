let emailCheck = '';
let passCheck = '';
let passOk ='';
$(document).ready(function (){
// modal window
    $('.modal-title').text('Authorization');
    $('.modal-text').html('<p>please login or register</p>');
    $('.button-modal').html('<button type="button" class="btn btn-primary" id="registration">Registration</button><button type="button" class="btn btn-primary" id="login">Sign In</button>');

    // Clicking on the register button opens the registration window
    $('#registration').click(function(){
        $('.modal-title').text('Registration');
        ajax('modal/signUp')
        $('.button-modal').html('<button type="button" class="btn btn-primary" id="send">Send</button>');
        $('#send').click(function() {
            let email = $('#email').val();
            let pass1 = $('#password1').val();
            let pass2 = $('#password2').val();

            // Email verification
            if(validateEmail(email)){
                // console.log('ok');
                $('.error-email').hide();
                emailCheck = email;
            }else {
                // console.log('no');
                $('.error-email').text('Your email does not match the format').show();
            }

            // Password check
            if(validatePass(pass1)){
                // console.log('ok');
                $('.error-pass1').hide();
                passOk = pass1;
            }else {
                // console.log('no');
                $('.error-pass1').text('Password must be greater than 4 and less than 12').show();
            }

            // Checking if passwords are the same
            if (pass1 === pass2) {
                // console.log('ok');
                $('.error-pass2').hide();
                passCheck = passOk;
            }else {
                $('.error-pass2').text('Passwords do not match').show();
                // console.log('no');
            }

            // If the password and soap are ok, then we send it to the server
            if (emailCheck !== '' && passCheck !== ''){
                // console.log(validateEmail(email));
                SignInUp('sign/signUp', emailCheck,  passCheck);
                $('.button-modal').hide();
            }
        });
    });

    // When you click on the login button, the logging window opens
    $('#login').click(function(){
        $('.modal-title').text('Log in');
        ajax('modal/signIn')
        $('.button-modal').html('<button type="button" class="btn btn-primary" id="send">Send</button>');
        $('#send').click(function() {
            let email = $('#email').val();
            let pass = $('#password1').val();

            // Email verification
            if(validateEmail(email)){
                // console.log('ok');
                $('.error-email').hide();
                emailCheck = email;
            }else {
                // console.log('no');
                $('.error-email').text('Your email does not match the format').show();
            }

            // Password check
            if(validatePass(pass)){
                // console.log('ok');
                $('.error-pass').hide();
                passCheck = pass;
            }else {
                // console.log('no');
                $('.error-pass').text('Password must be greater than 4 and less than 12').show();
            }

            // If the password and soap are ok, then we send it to the server
            if (emailCheck !== '' && passCheck !== ''){
                // console.log(validateEmail(email));
                SignInUp('sign/signIn', emailCheck,  passCheck);
                $('.button-modal').hide();
            }

        });
    });
    $('.close').click(function() {
        location.reload();
    });

});

// form connection via ajax
function ajax(url) {
    $.ajax({
        url: url,
        type: 'GET',
        success: function(res){
            $('.modal-text').html(res);
        },
        error: function(){
            alert('Error! Can\'t load login form');
        }
    });
}

// sending field data via ajax
 function SignInUp(url, email, pass) {
     $.ajax({
         url: url,
         data: {
             email: email,
             password: pass
         },
         type: 'POST',
         success: function(res){
             // console.log(res)
             $('.modal-text').html(res);
         },
         error: function(){
             alert('Error! Can\'t load login form');
         }
     });
 }

// Email validation
function validateEmail(email) {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}
// Password validation
function validatePass(pass) {
    if (pass.length > 4 && pass.length < 12) {
        return true;
    }
}

