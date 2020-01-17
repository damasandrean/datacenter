<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item active">
                <a class="nav-item-hold" href="<?php echo base_url() . index_page(); ?>dashboard">
                    <i class="nav-icon i-Bar-Chart"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" <?php if (\strpos(get_role()->role, '1') !== false) {
                                        echo 'style="display:block" ';
                                    } else {
                                        echo 'style="display:none"';
                                    } ?>>
                <a class="nav-item-hold" href="<?php echo base_url() . index_page(); ?>petugas">
                    <i class="nav-icon i-Add-User"></i>
                    <span class="nav-text">Petugas</span>
                </a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="kegiatan">
                <a class="nav-item-hold">
                    <i class="nav-icon i-Folder"></i>
                    <span class="nav-text">Kegiatan</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item" <?php if (\strpos(get_role()->role, '4') !== false) {
                                        echo 'style="display:block" ';
                                    } else {
                                        echo 'style="display:none"';
                                    } ?>>
                <a class="nav-item-hold" href="<?php echo base_url() . index_page(); ?>user">
                    <i class="nav-icon i-Checked-User"></i>
                    <span class="nav-text">User</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item" <?php if (\strpos(get_role()->role, '5') !== false) {
                                        echo 'style="display:block" ';
                                    } else {
                                        echo 'style="display:none"';
                                    } ?>>
                <a class="nav-item-hold" href="<?php echo base_url() . index_page(); ?>laporan">
                    <i class="nav-icon i-Shop"></i>
                    <span class="nav-text">Laporan</span>
                </a>
                <div class="triangle"></div>
            </li>

            <li class="nav-item" data-item="setting" <?php if (\strpos(get_role()->role, '6') !== false) {
                                                            echo 'style="display:block" ';
                                                        } else {
                                                            echo 'style="display:none"';
                                                        } ?>>
                <a class="nav-item-hold">
                    <i class="nav-icon i-Gear"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <div class="triangle"></div>
            </li>




        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <!-- Submenu Dashboards -->




        <ul class="childNav" data-parent="kegiatan">
            <li class="nav-item" <?php if (\strpos(get_role()->role, '2') !== false) {
                                        echo 'style="display:block" ';
                                    } else {
                                        echo 'style="display:none"';
                                    } ?>>
                <a href="<?php echo base_url() . index_page(); ?>kegiatan/kegiatan_today">
                    <i class="nav-icon i-ID-Card"></i>
                    <span class="item-name">Tambah Kegiatan Hari Ini</span>
                </a>
            </li>
            <li class="nav-item" <?php if (\strpos(get_role()->role, '3') !== false) {
                                        echo 'style="display:block" ';
                                    } else {
                                        echo 'style="display:none"';
                                    } ?>>
                <a href="<?php echo base_url() . index_page(); ?>kegiatan">
                    <i class="nav-icon i-ID-Card"></i>
                    <span class="item-name">Data Kegiatan</span>
                </a>
            </li>
        </ul>


        <ul class="childNav" data-parent="setting">
            <li class="nav-item">
                <a href="<?php echo base_url() . index_page(); ?>level">
                    <i class="nav-icon i-ID-Card"></i>
                    <span class="item-name">Tambah Level</span>
                </a>
            </li>
        </ul>




    </div>
    <div class="sidebar-overlay"></div>
</div>