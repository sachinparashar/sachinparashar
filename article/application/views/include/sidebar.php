<!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expand="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="start <?php if(strstr($_SERVER['REQUEST_URI'],"dashboard")) echo 'active'; ?>">
                        <a href="<?= base_url()?>user/dashboard">
                        <i class="far fa-desktop"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        </a>
                    </li>
                    <li class="<?php if(strstr($_SERVER['REQUEST_URI'],"articles")) echo 'start active'; ?>">
                        <a href="<?= base_url()?>user/articles">
                        <i class="icon-users"></i>
                        <span class="title">My Articles</span>
                        <?php if(strstr($_SERVER['REQUEST_URI'],"articles")) ?><span class="selected"></span> 
                        </a>
                    </li>
                    
                    <li class="start <?php if(strstr($_SERVER['REQUEST_URI'],"statistics")) echo 'active'; ?>">
                        <a href="<?= base_url()?>user/statistics">
                        <i class="icon-bar-chart"></i>
                        <span class="title">Statistics</span>
                        <span class="selected"></span>
                        </a>
                    </li>
                    <li class="<?php if(strstr($_SERVER['REQUEST_URI'],"settings")) echo 'start active'; ?>">
                        <a href="<?= base_url()?>user/settings">
                        <i class="icon-settings"></i>
                        <span class="title">Settings</span>
                        <span class="arrow "></span>
                        <?php if(strstr($_SERVER['REQUEST_URI'],"settings")) ?><span class="selected"></span>
                        </a>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
        </div>
        <!-- END SIDEBAR -->