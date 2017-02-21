var FormValidation = function () {

    // validation using icons
    var handleValidation = function () {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

        var var_visor_form_validation_form = $('#visor-form');
        var var_visor_form_validation_error = $('.alert-danger', var_visor_form_validation_form);
        var var_visor_form_validation_success = $('.alert-success', var_visor_form_validation_form);

        var_visor_form_validation_form.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "", // validate all fields including form hidden input
            rules: {
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                stores: {
                    required: true,
                    minlength: 1,
                    maxlength: 9999
                },
                company_id: {
                    required: true
                },
                time_inc: {
                    required: true
                },
                format: {
                    required: true
                },
                version: {
                    required: true
                },
            },
            invalidHandler: function (event, validator) { //display error alert on form submit
                var_visor_form_validation_success.hide();
                var_visor_form_validation_error.show();
                Metronic.scrollTo(var_visor_form_validation_error, -200);
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },
            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight

            },
            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },
            submitHandler: function (form) {
                var_visor_form_validation_success.show();
                var_visor_form_validation_error.hide();
                var_visor_form_validation_form[0].submit(); // submit the form
            }
        });


    }

    return {
        //main function to initiate the module
        init: function () {
            handleValidation();
        }
    };

}();
