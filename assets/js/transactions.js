$(document).ready(function() {
    // переменные для доступа к кнопке и к блоку вывода сообщения 
    var blocks = $('.message');
    var button = $('.button-ajax');

    // изначально прячем пустое сообщение
    if (blocks.data('vis') == 'hidden') blocks.find('.panel-group').hide();

    //обработка нажатия кнопки
    button.click(function() {
        //формируем урл запроса в соответствии с форматом апи: transaction/{email}/{amount}/{token}
        var create_url = blocks.data('create-url')+$('#email').val()+'/'+$('#amount').val()+'/'+$('#token').val();

        $.ajax({
            type: "POST", //делаем пост запрос
            dataType: 'json',  // в ответе ожидаем json
            url: create_url,
            success: function(response) {

                //если возвращен обьект то разбираем, если нет то сообщаем об ошибке
                if ($.isPlainObject(response)) { 
                    //очищаем блок
                    blocks.find('.panel-body').empty();
                    //выводим тексты в соответсвующие блоки
                    blocks.find('.panel-heading').html(response.status);                    
                    if (typeof response.id !=="undefined") {
                        blocks.find('.panel-body').html('ID операции: '+response.id);
                    } else {
                        blocks.find('.panel-body').html(response.error_message);
                    }
                    blocks.unbind();                    
                } else  {
                    blocks.find('.panel-body').html('Responce Error');
                }  

                blocks.find('.panel-group').show();              
            },
            error : function(e) {
                blocks.find('.panel-body').html('Unknown Error');

            }
        });
    });

});