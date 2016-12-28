$(document).ready(function() {
    // Variables to access the button and the unit output messages
    var blocks = $('.message');
    var button = $('.button-ajax');

    // hide block if not post or no data to output
    if (blocks.data('vis') == 'hidden') blocks.find('.panel-group').hide();

    // make click
    button.click(function() {
        //make utl: transaction/{email}/{amount}/{token}
        var create_url = blocks.data('create-url')+$('#email').val()+'/'+$('#amount').val()+'/'+$('#token').val();

        $.ajax({
            type: "POST", 
            dataType: 'json',  
            url: create_url,
            success: function(response) {


                if ($.isPlainObject(response)) { 

                    blocks.find('.panel-body').empty();

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