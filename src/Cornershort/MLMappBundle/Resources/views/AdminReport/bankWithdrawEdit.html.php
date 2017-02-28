
<?php $view->extend('CornershortMLMappBundle:Layout:form.html.php') ?>

<?php $view['slots']->set('PageTitle', 'Edit Bank Withdrawal') ?>
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
                    <label for="description" class="control-label">Description</label>
                    <input type="text" class="form-control required" id="description" name="description" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_capacity">Transfer To Name</label>
                    <input type="text" class="form-control" id="transfer_to_name" name="transfer_to_name" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="membership_option">Membership Option</label>
                    <select class="form-control required" id="membership_option" name="membership_option" aria-required="true" aria-invalid="false" aria-describedby="membership_option-error">
                        <option value="">Select one</option>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Transfer By</label>
                    <input type="text" class="form-control" id="transfer_by" name="transfer_by" value="" placeholder="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <label for="batch_queue">Date Transfered</label>
                    <input type="text" class="form-control" id="date_transfered" name="date_transfered" value="" placeholder="">
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
