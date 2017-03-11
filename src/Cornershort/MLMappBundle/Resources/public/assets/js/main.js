function upgradeMember(myId, memberId) {
    var data = {
        leader_id: myId,
        member_id: memberId,
        type: 'level'
    }

    $.ajax({
        method: "POST",
        url: "/api/memberpaymenthistories/upgrades/members",
        data: JSON.stringify(data),
        contentType: "application/json"
    })
    .success(function (result) {
        $("html, body").animate({scrollTop: 1}, 1000);
        if (result == "Success"){
            messageAlert('Your member was successfullt upgraded!', 'success');
        } else {
            messageAlert('Unable to upgrade your member!', 'danger');
        }
    });
}

function editMyAccount() {
    var data = {
        id: $('#user_id').val(),
        password: $('#password').val(),
        last_name: $('#last_name').val(),
        first_name: $('#first_name').val(),
        date_of_birth: $('#date_of_birth').val(),
        gender: $('#gender').val(),
        mobile_number: $('#mobile_number').val(),
        email: $('#email').val(),
        home_add_house_no: $('#home_add_house_no').val(),
        home_addr_street: $('#home_addr_street').val(),
        home_addr_brgy: $('#home_addr_brgy').val(),
        home_addr_subd: $('#home_addr_subd').val(),
        home_addr_city: $('#home_addr_city').val(),
        home_addr_province: $('#home_addr_province').val(),
        username: $('#email').val(),
        username_canonical: $('#email').val(),
        email_canonical: $('#email').val(),
    };

    $.ajax({
        method: "POST",
        url: "/api/users/edits/accounts",
        data: JSON.stringify(data),
        contentType: "application/json",
        timeout: 5000
    })
    .success(function (result) {
        $("html, body").animate({scrollTop: 1}, 1000);
        if (result == "Success"){
            messageAlert('Successfully Updated!', 'success');
        } else {
            messageAlert('Unable to update your info!', 'danger');
        }
    });
}

function messageAlert(data, type) {
    $("#message_" + type).show();
    $("#message_" + type).html(data);

    setTimeout(function () {
        $("#message_" + type).hide();
        // window.location = window.location;
    }, 5000);
}
