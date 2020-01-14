<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large clearfix">
        <div class="main-header">
            <div class="logo" style="text-align: center;">
                <div class="text-logo" style="font-size: 20px">
                <div class="primary-color popins" style="font-weight: bold;">DATA CENTER</div>
                </div>
            </div>

            <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">
                <!-- Full screen toggle -->
                <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div class="user colalign-self-end">
                        <img src="http://gull-laravel.ui-lib.com/assets/images/faces/1.jpg" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item popins" href="<?php echo base_url().index_page(); ?>/login/ajax_action_logout">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>