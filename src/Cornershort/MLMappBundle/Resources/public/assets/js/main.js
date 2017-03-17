function messageAlert(data, type) {
    $("#message_" + type).show();
    $("#message_" + type).html(data);

    setTimeout(function () {
        $("#message_" + type).hide();
        // window.location = window.location;
    }, 5000);
}
