$(document).ready(function(){

    $('.popup-window .fa-times').on('click', function(){
        $(this).parent().parent().removeClass('active');
        $('body').removeClass('popup');
    });

    $('header .auth a').on('click', function(){
        var toggle = $(this).attr('data-popup');
        if(!toggle)
            return;
        toggle = '.popup-window' + toggle;
        $(toggle).addClass('active');
        $('body').addClass('popup');
    });

    $('.header-openmenu').on('click', function(){
        $('body').toggleClass('focus');
    });
    $('.functional .block').on('click', function(){
        if($(this).hasClass('active'))
            return false;

        $(this).siblings().removeClass('active');
        $('.items .item').siblings().removeClass('active');

        var item_id = $(this).attr('data-item');
        var item = $('.items').find('[data-item="' + item_id + '"]');

        $(this).addClass('active');
        item.addClass('active');

    });

    $("#auth").submit(function(){
        var button = $(this).find('button');
        if(button.hasClass('stop'))
            return false;
        button.addClass('stop');


        var login       = $(this).find('.login').val();
        var password    = $(this).find('.password').val();
        var recaptcha   = $(this).find('.g-recaptcha').attr('data-widget-id');
        var response    = grecaptcha.getResponse(recaptcha);

        var sendData = { login: login , password: password, captcha: response};

        $.ajax ({
            type: 'POST',
            url: "/auth/login/",
            data: sendData,
            dataType: 'json',
            success: function(data)
                {
                    setTimeout(function(){
                        button.removeClass('stop');
                    }, 500);
                    if(data['status'] == 1){
                        sendAlert(true, data['message']);
                        setTimeout(function(){
                            window.location.reload();
                            //window.location.href = "/profile/";
                        }, 1000);
                    }else{
                        grecaptcha.reset(recaptcha);
                        sendAlert(false, data['message']);
                    }
                }
        });
        return false;
    });
    $("#reg").submit(function(){
        var button = $(this).find('button');
        if(button.hasClass('stop'))
            return false;
        button.addClass('stop');


        var login       = $(this).find('.login').val();
        var email       = $(this).find('.email').val();
        var password    = $(this).find('.password').val();
        var password2   = $(this).find('.password2').val();
        var recaptcha   = $(this).find('.g-recaptcha').attr('data-widget-id');
        var response    = grecaptcha.getResponse(recaptcha);

        var sendData = {
            login:      login,
            email:      email,
            password:   password,
            password2:  password2,
            captcha:    response,
        };

        $.ajax ({
            type: 'POST',
            url: "/auth/register/",
            data: sendData,
            dataType: 'json',
            success: function(data)
                {
                    setTimeout(function(){
                        button.removeClass('stop');
                    }, 500);
                    if(data['status'] == 1){
                        sendAlert(true, data['message']);
                        setTimeout(function(){
                            window.location.reload();
                            //window.location.href = "/profile/";
                        }, 1000);
                    }else{
                        grecaptcha.reset(recaptcha);
                        sendAlert(false, data['message']);
                    }
                }
        });
        return false;
    });
});
$('form input').on('input' , function(){
    var input = $(this).val().length;

    if(input > 0){
        $(this).addClass('active');
    }else{
        $(this).removeClass('active');
    }
});
function sendAlert(type, message){
    switch (type) {
        case false: type = 'danger';   break;
        case true:  type = 'success';  break;
        default:    type = 'error';    break;
    }

    $(".alerts").append(
        "<div class='alert " + type + "' role='alert'>" +
            "<i class='far fa-times-circle'></i>" +
            "<p>" + message + "</p>" +
        "</div>"
    );
    removeAlert();
}
function removeAlert(){
    var GetLastAlert = $('.alerts .alert').last();
    setTimeout(function(){GetLastAlert.slideUp(500);}, 4000);
    setTimeout(function(){GetLastAlert.remove();}, 4500);

}
