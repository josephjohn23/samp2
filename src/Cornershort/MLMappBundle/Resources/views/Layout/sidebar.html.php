                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse" data-auto-scroll="false">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200">


                            <?php
                            $r = 1;

                            foreach ($menu_parent as $parent_row) {
                                $has_child = false;
                                if (isset($menu_child[$parent_row['id']]) || $parent_row['route']) {

                                    $liClass = 'nav-item';

                                    if ($parent_row['route'] && $parent_row['route'] == $route) {
                                        $liClass = 'start active open';
                                    }

                                    if (isset($menu_child[$parent_row['id']])) {
                                        foreach ($menu_child[$parent_row['id']] as $child_row) {
                                            if ($child_row['route'] == $route) {
                                                $liClass = 'start active open';
                                            }
                                        }
                                    }

                                    if ($parent_row['route'] && !isset($menu_child[$parent_row['id']])) {
                                        $parentHref = $view['router']->path($parent_row['route']);
                                        $parentClass = 'nav-toggle';
                                    } else {
                                        $parentHref = 'javascript:;';
                                        $parentClass = 'nav-toggle';
                                    }
                                    ?>
                                    <?php
                                    if(isset($menu_child[$parent_row['id']])){
                                        foreach ($menu_child[$parent_row['id']] as $child_row) {
                                            if ($user_accesslevel >= $child_row['access_level']) {
                                                $has_child = true;
                                            }
                                        }
                                    } elseif($parent_row['route'] != "") {
                                      $has_child = true;
                                    } else {
                                      $has_child = false;
                                    }
                                    ?>
                                    <?php
                                    if ($has_child) {
                                        ?>
                                        <li class="<?php echo $liClass; ?>">
                                            <a class="nav-link <?php echo $parentClass; ?>" href="<?php echo $parentHref; ?>">
                                                <i class="<?php echo $parent_row['icon'] ?>"></i>
                                                <span class="title"><?php echo $parent_row['name'] ?></span>
                                                <span class="selected"></span>
                                                <?php
                                                if ($parent_row['route'] == '' && isset($menu_child[$parent_row['id']])) {
                                                    ?>
                                                    <span class="arrow open"></span>
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                            <?php
                                            if (isset($menu_child[$parent_row['id']])) {
                                                ?>
                                                <ul class="sub-menu">
                                                    <?php
                                                    foreach ($menu_child[$parent_row['id']] as $child_row) {
                                                        ?>
                                                        <?php
                                                        if ($user_accesslevel >= $child_row['access_level']) {
                                                            ?>
                                                            <li <?php if ($child_row['route'] == $route) echo 'class="nav-link active"'; ?>><a href="<?php echo $view['router']->path($child_row['route']) ?>"><?php echo $child_row['name']; ?></a></li>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                    }
                                                    ?>
                                                </ul>
                                                <?php
                                            }
                                            ?>
                                        </li>
                                        <?php
                                    }
                                }
                                $r+=1;
                            }
                            ?>
                            <li ><a href="<?php echo $view['router']->path('fos_user_security_logout') ?>"><i class="<?php echo 'fa fa fa-sign-out' ?>"></i><span class="title"><?php echo 'Logout' ?></span></a></li>


                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
