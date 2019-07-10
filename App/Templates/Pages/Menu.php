<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigasi
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-expanded <?=$active = isset($_GET['method']) ? "class='nav-active'" : "";?>">
                        <a href="main.php">
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php
                    $rs_menu_parrent = $Helper->menu_list("0", $ses_group_id);
                    while($arr_menu_parrent = $rs_menu_parrent->FetchRow()):
                    ?>
                    <?php
                    $rs_menu_child 	= $Helper->menu_list($arr_menu_parrent['menu_id'], $ses_group_id);
                        $array = array();
                        foreach ($rs_menu_child as $arr_menu_child):
                            $actives = "";
                            if($method != ''):
                                $array[] = $arr_menu_child['menu_method'];
                            endif;
                        endforeach;
                        if(in_array($method, $array)):
                            $selected = "nav-expanded nav-active";
                            if($method == $arr_menu_child['menu_method']):
                                $active = "nav-expanded nav-active";
                            endif;
                        else:
                            $selected = "";
                        endif;
                    ?>
                    <li class="nav-parent <?=$selected?>">
                        <a>
                            <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
                            <span><?=$arr_menu_parrent['menu_name']; ?></span>
                        </a>
                        <ul class="nav nav-children">
                        <?php $rs_menu_child 	= $Helper->menu_list($arr_menu_parrent['menu_id'], $ses_group_id); ?>
                        <?php foreach ($rs_menu_child as $arr_menu_child): ?>
                            <li <?=$active = ($method == $arr_menu_child['menu_method']) ? "class='nav-active'" : "";?>>
                                <a href="<?=$arr_menu_child['menu_link']; ?>">
                                    <?=$arr_menu_child ['menu_name']; ?>
                                </a>
                            </li>
                        <?php endforeach;?>
                        </ul>
                    </li>
                    <?php  endwhile; ?>
                </ul>
            </nav>
        </div>
    </div>
</aside>