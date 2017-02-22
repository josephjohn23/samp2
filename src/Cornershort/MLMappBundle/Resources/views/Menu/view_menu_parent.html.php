<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php
  if(isset($menu_parent_row['name'])){
    $headerName = $menu_parent_row['name'];
    $title = $headerName;
  } else {
    $title = 'Menu Parent';
  }
?>

<?php $view['slots']->set('PageTitle', $title) ?>
<?php $view['slots']->set('PageTitleSmall', '') ?>


<?php $view['slots']->start('page-toolbar') ?>
<div class="form-actions noborder">
    <button type="button" id="visor-form-submit" class="btn blue">Submit</button>
    <a type="button" href="<?php echo $view['router']->path('cornershort_menu_list_parents', array()) ?>" class="btn default">Cancel</a>
</div>
<?php $view['slots']->stop() ?>


<?php $view['slots']->start('content') ?>

<form id="visor-form" method="post">
    <div class="form-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($menu_parent_row['id'])) echo $menu_parent_row['id']; ?>" readonly>
                    <label for="id">Id</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?php if (isset($menu_parent_row['icon'])) echo $menu_parent_row['icon']; ?>" placeholder="fa fa-bar-chart-o">
                    <label for="icon">Icon</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($menu_parent_row['name'])) echo $menu_parent_row['name']; ?>" placeholder="">
                    <label for="name">Name</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="category" name="category" value="<?php if (isset($menu_parent_row['category'])) echo $menu_parent_row['category']; ?>" placeholder="eg. User or Admin">
                    <label for="name">Category</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="route" name="route" value="<?php if (isset($menu_parent_row['route'])) echo $menu_parent_row['route']; ?>" placeholder="cornershort_coming_soon">
                    <label for="route">Route</label>
                </div>
            </div>
        </div>


    </div>

</form>

<?php $view['slots']->stop() ?>
