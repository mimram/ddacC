$(function () {
    $('#sign_in').validate({
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        },
        submitHandler: function (form) {
            var Email = $("#email").val();
            var Password = $("#password").val();
            var sentData = {
                "email": Email,
                "password": Password
            };

            $.ajax({
                type: 'POST',
                url: 'server.php',
                type: 'post',
                data: {loginUser: JSON.stringify(sentData)},
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success') {
                        localStorage.setItem('loginUserEmail', data.email);
                        localStorage.setItem('loginUserRole', data.role);
                        localStorage.setItem('loginUserName', data.name);
                        alert(data.text);
                        window.location.href = 'secure';
                        return true;
                    } else {
                        alert(data.text);
                        return false;
                    }
                },
                complete: function () {
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log('ajax loading error...');
                    return false;
                }
            });


        }
    });
});


