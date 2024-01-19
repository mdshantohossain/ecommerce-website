function nameFieldValidation(){
    let nameValue = $('#name').val();
    let nameRegx = /^([a-zA-Z ]){2,30}$/;

    if (nameValue !== ''){
        if (nameValue.length >= 2){
            if (nameValue.length <= 22){
                if (nameRegx.test(nameValue)){
                    $('#nameErrors').text('');
                    return true;
                }else{
                    $('#nameErrors').text('Invalid name');
                    return false;
                }
            }else{
                $('#nameErrors').text('max character should be 22 words');
                return false;
            }
        }else{
            $('#nameErrors').text('character should be 2 words');
            return false;
        }
    }else{
        $('#nameErrors').text('name field is required *');
        return false;
    }
}

function emailFieldValidation(){
    let emailValue = $('#email').val();
    let emailRegx = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}/;

    if (emailValue !== ''){
        if (emailRegx.test(emailValue)){
            $('#emailErrors').text('');
            return true;
        }else{
            $('#emailErrors').text('Invalid email address');
            return false;
        }
    }else{
        $('#emailErrors').text('email field is required *');
        return false;
    }
}

function passwordFieldValidation(){
    var passwordValue = $('#password').val();

    if (passwordValue !== ''){
        if (passwordValue.length >= 8){
            if (passwordValue.length <= 16){
                $('#passwordErrors').text('');
                return true;
            }else{
                $('#passwordErrors').text('max character should be 16 words');
                return false;
            }
        }else{
            $('#passwordErrors').text('min character should be 8 words');
            return false;
        }
    }else{
        $('#passwordErrors').text('password field is required *');
        return false;
    }
}

function confirmPasswordCheck(){
    var password = $('#password').val();
    var confirm_password = $('#confirm_password').val();

    if (password === confirm_password){
        $('#confirmPasswordErrors').text('');
        return true;
    }else{
        $('#confirmPasswordErrors').text("Those password aren't match");
        return false;
    }
}

$('#name').keyup(function (){
    nameFieldValidation();
});

$('#email').keyup(function (){
    emailFieldValidation()
});

$('#password').keyup(function (){
    passwordFieldValidation()
});

$('#confirm_password').keyup(function (){
    confirmPasswordCheck();
});

$('#showPassword').click(function (){
    let password = $('#password');
    let confirmPassword = $('#confirm_password');

    if ($(this).is(':checked')){
        password.attr('type', 'text');
        confirmPassword.attr('type', 'text');
        $('#hidePassword').text('Hide Password');
    }else{
        password.attr('type', 'password');
        confirmPassword.attr('type', 'password');
        $('#hidePassword').text('Show Password');
    }
});

$('#regForm').submit(function (){
    if (nameFieldValidation() && emailFieldValidation() && passwordFieldValidation() && confirmPasswordCheck()){
        return true;
    }else{
        return false;
    }
});

$('#regBtn').click(function (){
    if ($('#name').val() === ''){
        $('#nameErrors').text('name field is required *');
    }

    if ($('#email').val() === ''){
        $('#emailErrors').text('email field is required *');
    }

    if ($('#password').val() === ''){
        $('#passwordErrors').text('password field is required *');
    }

    if ($('#confirm_password').val() === ''){
        $('#confirmPasswordErrors').text('confirm password field is required *');
    }
});


// LOGIN FORM VALIDATION

function loginEmailValidation(){
    let email = $('#loginEmail').val();
    let emailRegx = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}/;

    if (email !== ''){
        if (emailRegx.test(email)){
            $('#loginEmailErrors').text('');
            return true;
        }else{
            $('#loginEmailErrors').text('Invalid email address');
            return false;
        }
    }else{
        $('#loginEmailErrors').text('email field is required *');
        return false;
    }
}

$('#loginEmail').keyup(function (){
    loginEmailValidation();
});

$('#loginForm').submit(function (){

    if (loginEmailValidation())
    {
        return true;
    }else{
        return false;
    }
});

$('#checkbox2').click(function (){
    var password = $('#loginPassword');

    if ($(this).is(':checked')){
        password.attr('type', 'text');
        $('#hidePassword2').text('Hide password');
    }else{
        password.attr('type', 'password');
        $('#hidePassword2').text('Show Password');
    }
});

$('#loginBtn').click(function (){
   if ($('#loginEmail').val() === '')
   {
       $('#loginEmailErrors').text('email field is required *');
   }

   if ($('#loginPassword').val() === ''){
       $('#loginPasswordErrors').text('password field is required *');
   }
});
