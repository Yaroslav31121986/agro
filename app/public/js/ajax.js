$(document).ready(function () {
    $('#message').hide();
    $('#button').click(function(){
        let name = $('#name').val();
        let email = $('#email').val();
        let fail = [];
        let message = '';
        let myRe = new RegExp("^([a-z0-9_-]+\\.)*[a-z0-9_-]+@[a-z0-9_-]+(\\.[a-z0-9_-]+)*\\.[a-z]{2,6}$");

        if (name.length < 1) {
            fail.push('Введите ваше Имя');
        }
        if (email.length < 1) {
            fail.push('Введите ваш email');
        } else if (!myRe.test(email)) {
            fail.push('Ваш email не корректен');
        }

        if (fail.length > 0) {
            $('#message').html ("");
            message += '<ul>';
            fail.forEach(element => message += '<li>'+element+'</li>');
            message += '</ul>';
            $('#message').html (message);
            $('#message').show();
        } else {
            $.ajax({
                url: 'http://agro/ajax',
                type: 'POST',
                cache: false,
                data: {
                    'name': name,
                    'email': email,
                },
                dataType: 'html',
                success: function(data)
                {
                    $('#message').html ("");
                    $('#message').html (data);
                    $('#message').show();
                },
            });
        }
    });
});