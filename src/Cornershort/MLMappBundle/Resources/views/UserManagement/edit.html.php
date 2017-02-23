
<?php $view->extend('CornershortMLMappBundle:Layout:form.html.php') ?>

<?php $view['slots']->set('PageTitle', 'Edit User') ?>
<?php $view['slots']->set('PageTitleSmall', '') ?>

<?php $view['slots']->start('page-toolbar') ?>
<div class="form-actions noborder">
    <button type="button" id="visor-form-submit" class="btn blue">Submit</button>
    <a type="button" href="<?php echo $view['router']->path('cornershort_mlmapp_homepage', array()) ?>" class="btn default">Cancel</a>
</div>
<?php $view['slots']->stop() ?>

<?php $view['slots']->start('visor-form-body') ?>
<div class="tab-content">
    <div class="pane">

      <?php if(isset($notification['success'])): ?>
          <?php foreach($notification['success'] as $notif): ?>
              <div class="note note-success">
                <p> <?php echo $notif; ?> </p>
              </div>
          <?php endforeach; ?>
      <?php endif; ?>

      <?php if(isset($notification['error'])): ?>
          <?php foreach($notification['error'] as $notif): ?>
              <div class="note note-danger">
                <p> <?php echo $notif; ?> </p>
              </div>
          <?php endforeach; ?>
      <?php endif; ?>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="equipment_id">ID</label>
                    <input type="text" class="form-control" id="equipment_id" name="equipment_id" value="" placeholder="" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="description" class="control-label">Leader's ID</label>
                    <input type="text" class="form-control required" id="leader_id" name="leader_id" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_capacity">Member's ID</label>
                    <input type="text" class="form-control" id="member_id" name="member_id" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Account ID</label>
                    <input type="text" class="form-control" id="acct_id" name="acct_id" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Middle Name</label>
                    <input type="text" class="form-control" id="middle_name" name="middle_name" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Date of Birth</label>
                    <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="" placeholder="">
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
                    <label for="batch_queue">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Email Address</label>
                    <input type="text" class="form-control" id="email_add" name="email_add" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Home Address</label>
                    <input type="text" class="form-control" id="home_add_no" name="home_add_no" value="" placeholder="No">
                    <input type="text" class="form-control" id="home_add_street" name="home_add_street" value="" placeholder="Street">
                    <input type="text" class="form-control" id="home_add_brgy" name="home_add_brgy" value="" placeholder="Brgy.">
                    <input type="text" class="form-control" id="home_add_subd" name="home_add_subd" value="" placeholder="Village / Subdivision">
                    <input type="text" class="form-control" id="home_add_city" name="home_add_city" value="" placeholder="City">
                    <input type="text" class="form-control" id="home_add_province" name="home_add_province" value="" placeholder="Province">
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        document.getElementById("visor-form-cancel").addEventListener("click", myFunction);
        function myFunction() {
            window.history.back();
        }
    })
</script>

<?php $view['slots']->stop() ?>
