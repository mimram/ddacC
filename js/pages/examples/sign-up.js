$.validator.addMethod("regexp", function (value, element) {
    return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
}, 'Please enter a valid phone number.');


$(function () {
    $('#sign_up').validate({
        rules: {
            'terms': {
                required: true
            },
            'confirm': {
                equalTo: '[name="password"]'
            },
            'contact': {regexp: true, minlength: 9, maxlength: 12}
        },
        highlight: function (input) {
            // console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        },
        submitHandler: function (form) {
            var Name = $("#name").val();
            var Email = $("#email").val();
            var Password = $("#password").val();
            var Contact = $("#contact").val();
            var Address = $("#address").val();


            var sentData = {
                "name": Name,
                "email": Email,
                "password": Password,
                "contact": Contact,
                "address": Address
            };

            $.ajax({
                type: 'POST',
                url: 'server.php',
                type: 'post',
                data: {registerUser: JSON.stringify(sentData)},
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success') {
                        alert(data.text);
                        window.location.href = 'index.php';
                        return true;
                    } else {
                        alert(data.text)
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



