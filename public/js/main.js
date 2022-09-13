//
// $( document ).ready(function() {
//     $("#btn").click(
//         function(){
//             sendAjaxForm('result_form', 'ajax_send');
//             return false;
//         }
//     );
// });
//
// function sendAjaxForm(result_form, ajax_send) {
//     $.ajax({
//         url:     'add/start',
//         type:     "POST", //метод отправки
//
//         data: $("#"+ajax_form).serialize(),  // Сеарилизуем объект
//         // принимаем ответ
//         success: function(response) { //Данные отправлены успешно
//             alert('ok');
//             // result = $.parseJSON(response);
//             // $('#result_form').html('Имя: '+result.name+'<br>Телефон: '+result.phonenumber);
//         },
//         error: function(response) { // Данные не отправлены
//             $('#result_form').html('Ошибка. Данные не отправлены.');
//         }
//     });
// }

// https://itchief.ru/bootstrap/modal
// --------------------------------------
$('#staticBackdrop .modal-body').on('click', '#modal', function(e){
    e.preventDefault();

    var id = 1,
        qty = 2;
    // теперь бросаем это все на сервер , отправляем стандартный аякс запрос
    $.ajax({
        // куда мы будем отпровлять запрос (путь должен идти от корня)
        url: 'modal',
        // передаем данные которые будут отправлять на сервер
        data: {id: id, qty: qty},
        // метод передачи данных
        type: 'GET',
        //  метод который мы будем принимать (запрос дошол)
        success: function(res){
            // обновляем модальное окно
            showCart(res);

            //$('.modal-body').text('all ok');
        },
        // запрос не дошол то выводим ошибку альтом ( она может произойти что когда товар уберту, но у пользователя страница не обновлена. Любо пользователь специально отправит id товара которого нет)
        error: function(){
            alert('Ошибка! Попробуйте позже');
        }
    });

});


function showCart(cart){
    // изменение то что есть на текст
    $('.modal-body').html(cart);
   // console.log(cart);
}


/// остановился на выводе то что пришло