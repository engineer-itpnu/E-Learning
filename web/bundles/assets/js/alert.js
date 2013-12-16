var form = null;
$(document).ready(function () {
    $('a.YesNoMessage').click(function (e) {
        e.preventDefault();
        PopuptopOpen($(this).attr('header'), $(this).attr('message'), $(this).attr('href'));
    });
    $('form.YesNoMessage').submit(function (e) {
        if (form == null) {
            e.preventDefault();
            form = $(this);
            PopuptopOpen($(this).attr('header'), $(this).attr('message'), 'javascript:$(form).submit();');
        }
    });
});

function PopuptopOpen(header, message, action) {
    var body =   '<div style="border: 1px solid #aaaaaa;width: 50%;margin: 10% auto;background-color: #ffffff">'
                    +'<div class="headerpopup" style="background: #A50101;height: 36px;">'
                        +'<span style="color: #fff; font-size: 14px;float: right;margin: 8px 8px;">'
                            +'<a href="" class=" icon-th-large"></a><a href="" class="icon-chevron-left"></a>'
                            +'<b>' + header + '</b>'
                        +'</span>'
                        +'<span style="color: #fff; font-size: 20px;float: left;margin: 5px 5px;">'
                            +'<button type="button" class="close" onclick="PopuptopClose(event)">×</button>'
                        +'</span>'
                    +'</div>'
                    +'<div class="" style="display: block;padding: 25px 15px;">'
                        + message + '<br/><br/>'
                        + '<a href="' + action + '" style="min-width: 50px" class="btn btn-primary">بلی</a> '
                        + '<a style="min-width: 50px" class="btn" onclick="PopuptopClose(event);" >خیر</a> '
                    +'</div>'
                +'</div>';

    $('.popupshow').html(body);
    $('.bodypopup').hide();
    $('.popupshow').fadeIn();
    $('.bodypopup').slideDown();
}

function PopuptopClose(e) {
    e.preventDefault();
    $('.popupshow').fadeOut('fast', function () {
        $('.popupshow').html('');
        $('.popupshow').removeAttr('id');
        form = null;
    });
}