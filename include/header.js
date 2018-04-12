$(function () {

    if (!localStorage.getItem('loginUserEmail') || !localStorage.getItem('loginUserName') || !localStorage.getItem('loginUserRole')) {
        window.location.href = "../";
        return;
    }


    var userEmail = localStorage.getItem('loginUserEmail');
    var userName = localStorage.getItem('loginUserName');
    var userRole = localStorage.getItem('loginUserRole');

    $('.name').text(userName+ ' - ('+userRole+')');
    $('.email').text(userEmail);

    var navObj = [
        {
            "userType": "admin",
            "navigation": [{
                "id": 1,
                "icon": "card_travel",
                "text": "View Route",
                "ref": "viewRoute.php"
            }, {

                "id": 2,
                "icon": "text_fields",
                "text": "Add Agent/ Admin",
                "ref": "addAgent.php"
            }, {
                "id": 3,
                "icon": "layers",
                "text": "View/ Edit User",
                "ref": "viewUser.php"
            }, {
                "id": 4,
                "icon": "map",
                "text": "View Booking",
                "ref": "ViewBooking.php"
            }]
        },
        {
            "userType": "agent",
            "navigation": [{
                "id": 1,
                "icon": "card_travel",
                "text": "View Booking",
                "ref": "ViewBooking.php"
            }, {

                "id": 2,
                "icon": "text_fields",
                "text": "Book Container",
                "ref": "bookContainer.php"
            }, {
                "id": 3,
                "icon": "layers",
                "text": "Register Customer",
                "ref": "registerCustomer.php"
            }]

        },
        {
            "userType": "customer",
            "navigation": [{
                "id": 1,
                "icon": "card_travel",
                "text": "View Booking",
                "ref": "ViewBooking.php"
            }]

        }
    ];


    var nav = navObj.find(function (el) {
        return (el.userType === userRole);
    });

    var html = '';
    $.each(nav.navigation, function (key, value) {
        html += '<li class="active">';
        html += '<a href="'+value.ref+'">';
        html += '<i class="material-icons">'+value.icon+'</i>';
        html += '<span>'+value.text+'</span>';
        html += '</a>';
        html += '</li>';
    });
    $('#navId').html(html);

});



$(document).ready(function(){
    $('#viewProfile').click(function(){
        window.location.href = "index.php"
    });
});




$(document).ready(function(){
    $('#logout').click(function(){
        localStorage.clear();
        window.location.href = "../index.php"
    });
});



