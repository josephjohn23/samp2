
<?php $view->extend('CornershortMLMappBundle:Layout:form.html.php') ?>

<?php $view['slots']->set('PageTitle', 'Edit My Account') ?>
<?php $view['slots']->set('PageTitleSmall', '') ?>

<?php $view['slots']->start('page-toolbar') ?>
<div class="form-actions noborder">
    <button type="button" id="visor-form-submit" class="btn blue">Submit</button>
    <a type="button" href="<?php echo $view['router']->path('cornershort_mlmapp_homepage', array()) ?>" class="btn default">Cancel</a>
</div>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('visor-form-body') ?>
<div class="tab-content">
    <div id="message_success" class="alert alert-success" style="display:none;">
        <span id="message_success"></span>
    </div>

    <div id="message_danger" class="alert alert-danger" style="display:none;">
        <span id="message_danger"></span>
    </div>

    <div class="pane">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="user_id">ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" value="<?php if(isset($member_info['id'])){ echo $member_info['id']; } ?>" placeholder="" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="leader_id" class="control-label">Leader's ID</label>
                    <input type="text" class="form-control required" id="leader_id" name="leader_id" value="<?php if(isset($member_info['leader_id'])){ echo $member_info['leader_id']; } ?>" placeholder="" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="member_id">Member's ID</label>
                    <input type="text" class="form-control" id="member_id" name="member_id" value="<?php if(isset($member_info['member_id'])){ echo $member_info['member_id']; } ?>" placeholder="" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="acct_id">Account ID</label>
                    <input type="text" class="form-control" id="acct_id" name="acct_id" value="<?php if(isset($member_info['acct_id'])){ echo $member_info['acct_id']; } ?>" placeholder="" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_quelast_nameue">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?php if(isset($member_info['last_name'])){ echo $member_info['last_name']; } ?>" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="<?php if(isset($member_info['first_name'])){ echo $member_info['first_name']; } ?>" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="<?php if(isset($member_info['date_of_birth'])){ echo $member_info['date_of_birth']; } ?>" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="gender">Gender</label>
                    <select class="form-control required" id="gender" name="gender" aria-required="true" aria-invalid="false" aria-describedby="gender-error">
                        <option value="">Select one</option>
                        <option value="m">Male</option>
                        <option value="f">Female</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="<?php if(isset($member_info['mobile_number'])){ echo $member_info['mobile_number']; } ?>" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="email">Email Address</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php if(isset($member_info['email'])){ echo $member_info['email']; } ?>" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Home Address</label>
                    <input type="text" class="form-control" id="home_add_house_no" name="home_add_house_no" value="<?php if(isset($member_info['home_add_house_no'])){ echo $member_info['home_add_house_no']; } ?>" placeholder="No">
                    <input type="text" class="form-control" id="home_addr_street" name="home_addr_street" value="<?php if(isset($member_info['home_addr_street'])){ echo $member_info['home_addr_street']; } ?>" placeholder="Street">
                    <input type="text" class="form-control" id="home_addr_brgy" name="home_addr_brgy" value="<?php if(isset($member_info['home_addr_brgy'])){ echo $member_info['home_addr_brgy']; } ?>" placeholder="Brgy.">
                    <input type="text" class="form-control" id="home_addr_subd" name="home_addr_subd" value="<?php if(isset($member_info['home_addr_subd'])){ echo $member_info['home_addr_subd']; } ?>" placeholder="Village / Subdivision">
                    <input type="text" class="form-control" id="home_addr_city" name="home_addr_city" value="<?php if(isset($member_info['home_addr_city'])){ echo $member_info['home_addr_city']; } ?>" placeholder="City">
                    <input type="text" class="form-control" id="home_addr_province" name="home_addr_province" value="<?php if(isset($member_info['home_addr_province'])){ echo $member_info['home_addr_province']; } ?>" placeholder="Province">
                </div>
            </div>
        </div>

    </div>
</div>

<div class="btn-group">
    <div class="button-container">
        <button type="button" id="edit-member-form-submit" onClick="editMyAccount()" class="btn btn-lg btn-success">Submit</button>
        <button type="button" id="edit-member-form-cancel" onclick="window.history.back();" class="btn btn-lg red">Cancel</button>
    </div>
</div>

<?php $view['slots']->stop() ?>

<?php $view['slots']->start('page_js') ?>
<script type="text/javascript">
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
        //url: "/api/users/edits/accounts",
        url: Routing.generate('api_post_user_edit_account'),
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
</script>
<?php $view['slots']->stop() ?>
