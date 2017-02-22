<?php $view->extend('CornershortMLMappBundle:Layout:layout.html.php') ?>

<?php
  if(isset($menu_child_row['name'])){
    $headerName = $menu_child_row['name'];
    $title = $headerName;
  } else {
    $title = 'Menu Child';
  }
?>

<?php $view['slots']->set('PageTitle', $title) ?>
<?php $view['slots']->set('PageTitleSmall', '') ?>


<?php $view['slots']->start('page-toolbar') ?>
<div class="form-actions noborder">
    <button type="button" id="visor-form-submit" class="btn blue">Submit</button>
    <a type="button" href="<?php echo $view['router']->path('cornershort_menu_list_children', array()) ?>" class="btn default">Cancel</a>
</div>
<?php $view['slots']->stop() ?>


<?php $view['slots']->start('content') ?>

<form id="visor-form" method="post">
    <div class="form-body">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($menu_child_row['id'])) echo $menu_child_row['id']; ?>" readonly>
                    <label for="id">Id</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <select id="menu_parent_id" name="menu_parent_id" class="form-control">
                        <option value="">Select one</option>
                        <?php
                        foreach ($menu_parent_rows as $menu_parent_row) {
                            ?>
                            <option value="<?php echo $menu_parent_row['id']; ?>" <?php if (isset($menu_child_row['menu_parent_id']) && $menu_child_row['menu_parent_id'] == $menu_parent_row['id']) echo 'selected'; ?>><?php echo $menu_parent_row['name']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="menu_parent_id">Parent</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="name" name="name" value="<?php if (isset($menu_child_row['name'])) echo $menu_child_row['name']; ?>" placeholder="">
                    <label for="name">Name</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="text" class="form-control" id="route" name="route" value="<?php if (isset($menu_child_row['route'])) echo $menu_child_row['route']; ?>" placeholder="">
                    <label for=route">Route</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="number" class="form-control" id="access_level" name="access_level" min="0" max="100" value="<?php if (isset($menu_child_row['access_level'])) echo $menu_child_row['access_level']; ?>" placeholder="0-100">
                    <label for=access_level">Access Level</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-md-line-input">
                    <input type="number" class="form-control" id="sort_id" name="sort_id" value="<?php if (isset($menu_child_row['sort_id'])) echo $menu_child_row['sort_id']; ?>" placeholder="">
                    <label for=sort_id">Sort Id</label>
                </div>
            </div>
        </div>


    </div>

</form>

<?php $view['slots']->stop() ?>
