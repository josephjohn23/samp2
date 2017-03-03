function addNewMember() {
    var data = {
        id: $('#user_id').val(),
        leaders_id: $('#leaders_id').val(),
        member_id: $('#member_id').val(),
        acct_id: $('#acct_id').val(),
        password: $('#password').val(),
        last_name: $('#last_name').val(),
        first_name: $('#first_name').val(),
        middle_name: $('#middle_name').val(),
        date_of_birth: $('#date_of_birth').val(),
        gender: $('#gender').val(),
        mobile_number: $('#mobile_number').val(),
        email_add: $('#email_add').val(),
        home_add_no: $('#home_add_no').val(),
        home_add_street: $('#home_add_street').val(),
        home_add_brgy: $('#home_add_brgy').val(),
        home_add_subd: $('#home_add_subd').val(),
        home_add_city: $('#home_add_city').val(),
        home_add_province: $('#home_add_province').val()
    };
console.log(data);
    $.ajax({
        method: "POST",
        url: "/api/users",
        data: JSON.stringify(data),
        contentType: "application/json",
        timeout: 5000
    })
    .success(function (data) {
        $("html, body").animate({scrollTop: 1}, 1000);
        if (data == "Success"){
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
