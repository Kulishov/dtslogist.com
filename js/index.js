/**
 * Created by shumer on 8/25/16.
 */
$(function(){
    var nameInput = $('input[name=name]'),
        contactInput = $('input[name=contact]'),
        messageInput = $('textarea[name=message]');

    $('.flexslider').flexslider({
        animation: "slide",
        // slideshowSpeed: 3000,
        directionNav:false,
        // mousewheel:true,
        start: function(slider){

        }
    });

    $('#lang_list li').on('click', function(){
        var lang = $(this).data('lang');

        if(lang == 'en'){
            window.location.href = '/en/';
        } else {
            window.location.href = '/';
        }
    });

    $('#send-button').on('click', function(){

        var error = false;

        if(nameInput.val() == ''){
            nameInput.addClass('error');
            error = true;
        }

        if(contactInput.val() == ''){
            contactInput.addClass('error');
            error = true;
        }

        if(messageInput.val() == ''){
            messageInput.addClass('error');
            error = true;
        }

        if(!error){
            $('form').submit();
        } else {
            setTimeout(function(){
                nameInput.removeClass('error');
                contactInput.removeClass('error');
                messageInput.removeClass('error');
            }, 2000);
        }
    });
});