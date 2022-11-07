// alert('kldzfjgh');

// https://itchief.ru/bootstrap/modal
// --------------------------------------
// Модальное окно!
// Все действие после полной загрузкой
let emailCheck = '';
let passCheck = '';
let passOk ='';
$(document).ready(function (){
// модальное окно
    // оглавление
    $('.modal-title').text('Авторизация');
    // тело
    $('.modal-text').html('<p>пожалуста войдите в систему или зарегестрируйтесь</p>');
    // кнопки
    $('.button-modal').html('<button type="button" class="btn btn-primary" id="registration">Регистрация</button><button type="button" class="btn btn-primary" id="login">Войти</button>');

    // при нажатие на кнопку регистрацию открывается окно регистрации
    $('#registration').click(function(){
        $('.modal-title').text('Регистрация');
        ajax('modal/signUp')
        $('.button-modal').html('<button type="button" class="btn btn-primary" id="send">Отправить</button>');
        // При нажатие на кнопку отправить запускается функция
        $('#send').click(function() {
            // Необходимые переменные
            let email = $('#email').val();
            let pass1 = $('#password1').val();
            let pass2 = $('#password2').val();

            // Проверка email
            if(validateEmail(email)){
                // console.log('ok');
                $('.error-email').hide();
                emailCheck = email;
            }else {
                // console.log('no');
                $('.error-email').text('Ваш email несоответствует формату').show();
            }

            // Проверка пароля1
            if(validatePass(pass1)){
                // console.log('ok');
                $('.error-pass1').hide();
                passOk = pass1;
            }else {
                // console.log('no');
                $('.error-pass1').text('Пароль должен быть больше 4 и меньше 12').show();
            }

            // Проверка одинаковые ли пароли
            if (pass1 === pass2) {
                // console.log('ok');
                $('.error-pass2').hide();
                passCheck = passOk;
            }else {
                $('.error-pass2').text('Пароли не совпадают').show();
                // console.log('no');
            }

            // Если пароль и мыло ок, то тогда отправляем на сервер
            if (emailCheck !== '' && passCheck !== ''){
                // console.log(validateEmail(email));
                SignInUp('sign/signUp', emailCheck,  passCheck);
                // Скрыть кнопку отправить
                $('.button-modal').hide();
            }
        });
    });

    // при нажатие на кнопку вход открывается окно логирование
    $('#login').click(function(){
        $('.modal-title').text('Вход');
        ajax('modal/signIn')
        $('.button-modal').html('<button type="button" class="btn btn-primary" id="send">Отправить</button>');
        // При нажатие на кнопку отправить запускается функция
        $('#send').click(function() {
            // обновляется страничка
            let email = $('#email').val();
            let pass = $('#password1').val();

            // Проверка email
            if(validateEmail(email)){
                // console.log('ok');
                $('.error-email').hide();
                emailCheck = email;
            }else {
                // console.log('no');
                $('.error-email').text('Ваш email несоответствует формату').show();
            }

            // Проверка пароля
            if(validatePass(pass)){
                // console.log('ok');
                $('.error-pass').hide();
                passCheck = pass;
            }else {
                // console.log('no');
                $('.error-pass').text('Пароль должен быть больше 4 и меньше 12').show();
            }

            // Если пароль и мыло ок, то тогда отправляем на сервер
            if (emailCheck !== '' && passCheck !== ''){
                // console.log(validateEmail(email));
                SignInUp('sign/signIn', emailCheck,  passCheck);
                // Скрыть кнопку отправить
                $('.button-modal').hide();
            }

        });
    });
    // при нажатие на кнопку закрыть (выбор по классу)
    $('.close').click(function() {
        // обновляется страничка
        location.reload();
    });

});


//
function ajax(url) {
    $.ajax({
        // куда мы будем отправлять запрос (путь должен идти от корня)
        url: url,
        // метод передачи данных
        type: 'GET',
        //  метод который мы будем принимать (запрос дошол)
        success: function(res){

            // обновляем модальное окно
            $('.modal-text').html(res);
        },
        // запрос не дошол то выводим ошибку альтом ( она может произойти что когда товар уберту, но у пользователя страница не обновлена. Любо пользователь специально отправит id товара которого нет)
        error: function(){
            alert('Ошибка! Не могу загрузить форму для входа');
        }
    });
}

//
 function SignInUp(url, email, pass) {
     $.ajax({
         // куда мы будем отправлять запрос (путь должен идти от корня)
         url: url,
         // какие данные отправляем
         data: {
             email: email,
             password: pass
         },
         // метод передачи данных
         type: 'POST',
         //  метод который мы будем принимать (запрос дошол)
         success: function(res){
             console.log(res)
             // обновляем модальное окно
             $('.modal-text').html(res);
         },
         // запрос не дошол то выводим ошибку альтом ( она может произойти что когда товар уберту, но у пользователя страница не обновлена. Любо пользователь специально отправит id товара которого нет)
         error: function(){
             alert('Ошибка! Не могу загрузить форму для входа');
         }
     });
 }

// Валидация эмейла
function validateEmail(email) {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}
// Валидация пароля
function validatePass(pass) {
    if (pass.length > 4 && pass.length < 12) {
        return true;
    }
}

