$(document).ready(function () {

    var sentData = {
        "email": localStorage.getItem('loginUserEmail'),
        "role": localStorage.getItem('loginUserRole')
    };

    $.ajax({
        type: 'POST',
        url: '../server.php',
        data: {getUserData: JSON.stringify(sentData)},
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                var html = '';
                html += '<tbody>\n' +
                    '                                    <tr>\n' +
                    '                                        <td>Full Name</td>\n' +
                    '                                        <td>' + data.name + '</td>\n' +
                    '                                    </tr>\n' +
                    '                                    <tr>\n' +
                    '                                        <td>Email Address</td>\n' +
                    '                                        <td>' + data.email + '</td>\n' +
                    '                                    </tr>\n' +
                    '                                    <tr>\n' +
                    '                                        <td>Contact Number</td>\n' +
                    '                                        <td>' + data.contact + '</td>\n' +
                    '                                    </tr>\n' +
                    '                                    <tr>\n' +
                    '                                        <td>Address</td>\n' +
                    '                                        <td>' + data.address + '</td>\n' +
                    '                                    </tr>\n' +
                    '                                    <tr>\n' +
                    '                                        <td>User Role</td>\n' +
                    '                                        <td>' + data.role + '</td>\n' +
                    '                                    </tr>\n' +
                    '                                    </tbody>';

                $('#userDetailsTable').html(html);

                return true;
            } else {
                commonErrorLog();
            }
        },
        complete: function () {
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log('ajax loading error...');
            return false;
        }
    });


    $.ajax({
        type: 'POST',
        url: '../server.php',
        data: {viewRoutes: JSON.stringify(sentData)},
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                var html = '';

                $.each(data.data, function (key, value) {
                    html += ' <tr>\n' +
                        '                                        <td>' + value.id + '</td>\n' +
                        '                                        <td>' + value.dep_date + '</td>\n' +
                        '                                        <td>' + value.dep_time + '</td>\n' +
                        '                                        <td>' + value.dep_from + '</td>\n' +
                        '                                        <td>' + value.dep_to + '</td>\n' +
                        '                                        <td>' + value.price + ' RM</td>\n' +
                        '                                        <td>' + value.totalAvailable + '</td>\n' +
                        '                                    </tr>';

                    $('#viewRoutes').html(html);

                });
                return true;
            } else {
                commonErrorLog();
            }
        },
        complete: function () {
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log('ajax loading error...');
            return false;
        }
    });


    $.ajax({
        type: 'POST',
        url: '../server.php',
        data: {viewUserList: JSON.stringify(sentData)},
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                var html = '';

                $.each(data.data, function (key, value) {
                    html += ' <tr>\n' +
                        '                                        <td>' + value.id + '</td>\n' +
                        '                                        <td>' + value.name + '</td>\n' +
                        '                                        <td>' + value.email + '</td>\n' +
                        '                                        <td>' + value.contact + '</td>\n' +
                        '                                        <td>' + value.address + '</td>\n' +
                        '                                        <td>' + value.role + '</td>\n' +
                        '                                        <td><button type="button" onclick="updateUserData(\'' + value.email + '\')" class="btn bg-deep-purple waves-effect"> <i class="material-icons">edit</i></button>' +
                        '                                        <button type="button" onclick="deleteUserData(\'' + value.email + '\')" class="btn bg-deep-purple waves-effect"> <i class="material-icons">delete</i></button></td>' +
                        '     </tr>';

                    $('#viewUserList').html(html);

                });
                return true;
            } else {
                commonErrorLog();
            }
        },
        complete: function () {
        },
        error: function (xhr, textStatus, errorThrown) {
            console.log('ajax loading error...');
            return false;
        }
    });
});


function setBookingVasel(id, bay) {
    $("#VasselID").val(id);
    $("#AvailableVassel").val(bay);

}

function commonErrorLog() {
    alert("ERROR !!! PLEASE CONTACT TO SYSTEM ADMINISTRATOR");
    window.location.href = "../index.php"
}


$.validator.addMethod("regexp", function (value, element) {
    return this.optional(element) || /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/.test(value);
}, 'Please enter a valid phone number.');


$(function () {
    $('#sign_up_Agent').validate({
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
            var Role = $('input[name=user]:checked').val();

            var sentData = {
                "name": Name,
                "email": Email,
                "password": Password,
                "contact": Contact,
                "address": Address,
                "role": Role
            };


            $.ajax({
                type: 'POST',
                url: '../server.php',
                data: {sign_up_Agent: JSON.stringify(sentData)},
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


$(function () {
    $('#UpdateBookingVassel').validate({
        rules: {},
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
            var bays = $("#bays").val();
            var Company = $("#Company").val();
            var VasselID = $("#VasselID").val();
            var availableVassel = $("#AvailableVassel").val();


            if (+bays > +availableVassel) {
                alert("Available vassel is less then your input vassel");
                return;
            }


            var sentData = {
                "bays": bays,
                "Company": Company,
                "VasselID": VasselID,
                "availableVassel": availableVassel
            };


            $.ajax({
                type: 'POST',
                url: '../server.php',
                data: {UpdateBookingVassel: JSON.stringify(sentData)},
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


$(function () {
    $('#update_user').validate({
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
            var Role = $('input[name=user]:checked').val();

            var sentData = {
                "name": Name,
                "email": Email,
                "password": Password,
                "contact": Contact,
                "address": Address,
                "role": Role
            };


            $.ajax({
                type: 'POST',
                url: '../server.php',
                data: {update_user: JSON.stringify(sentData)},
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


function updateUserData(userEmail) {
    window.location.href = "updateUser.php?userEmail=" + userEmail;
}

function deleteUserData(userEmail) {
    var sentData = {
        "email": userEmail
    };

    $.ajax({
        type: 'POST',
        url: '../server.php',
        data: {deleteUser: JSON.stringify(sentData)},
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                alert(data.text);
                window.location.href = 'viewUser.php';
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


