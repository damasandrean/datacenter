<!-- Admin modal Side -->

<div id="edit-petugas" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2>Edit Data Petugas</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama</label>
                    <input type="text" name="" id='edit_nama_petugas' class="form-control" placeholder="Masukkan Nama disini">
                </div>

                <div style="display: none">
                    <label>Nama</label>
                    <input type="text" name="" id='edit_id_petugas' class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div style="margin-top: 3%"></div>


                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_edit_admin()">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="add-petugas" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2 class="text-popins">Tambah Petugas</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama Petugas</label>
                    <input type="text" name="" id="nama_petugas" class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_add_admin()">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end admin modal side -->


<!-- Admin modal Side -->

<div id="edit-user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2>Edit Data User</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Username</label>
                    <input type="text" name="" id='edit_username' class="form-control" placeholder="Masukkan Nama disini">
                </div>

                <div style="margin-top: 3%"></div>
                <div>
                    <label>Password</label>
                    <input type="text" name="" id='edit_password' class="form-control" placeholder="Masukkan Nama disini">
                </div>

                <div style="display: none">
                    <label>Nama</label>
                    <input type="text" name="" id='edit_id_user' class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div style="margin-top: 3%"></div>

                <div style="margin-top: 3%"></div>
                <div>
                    <label>Hak Akses</label>
                    <select class="form-control" id="edit_select_level"></select>
                </div>


                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_edit_user()">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="add-user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2 class="text-popins">Tambah User</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Username</label>
                    <input type="text" name="" id='username' class="form-control" placeholder="Masukkan Nama disini">
                </div>

                <div style="margin-top: 3%"></div>
                <div>
                    <label>Password</label>
                    <input type="text" name="" id='password' class="form-control" placeholder="Masukkan Nama disini">
                </div>

                <div style="margin-top: 3%"></div>
                <div>
                    <label>Hak Akses</label>
                    <select class="form-control" id="select_level"></select>
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_add_user()">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end admin modal side -->


<!-- Admin modal Side -->

<div id="edit-kegiatan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2>Edit Data Kegiatan</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama</label>
                    <input type="text" name="" id='edit_kegiatan' class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div style="display: none">
                    <label>Nama</label>
                    <input type="text" name="" id='edit_id_kegiatan' class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_edit_kegiatan()">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="add-kegiatan" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2 class="text-popins">Tambah Kegiatan</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama kegiatan</label>
                    <input type="text" name="" id='nama_kegiatan' class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_add_kegiatan()">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end admin modal side -->


<div id="add-level" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2 class="text-popins">Tambah Level</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama level</label>
                    <input type="text" name="" id="name_level" class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Akses</label>
                    <div>
                        <table class="table table-bordered" id="list_menu">
                        </table>
                    </div>
                </div>
                <div style="display: none">
                    <input type="text" name="" id="akses" name="akses">
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_add_level()">Tambah Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div id="edit-level" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2 class="text-popins">Edit Level</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama level</label>
                    <input type="text" name="" id="edit_name_level" class="form-control" placeholder="Masukkan Nama disini">
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Akses</label>
                    <div>
                        <table class="table table-bordered" id="edit_list_menu">
                        </table>
                    </div>
                </div>
                <div style="display: none">
                    <input type="text" name="" class="form-control" id="edit_akses" name="edit_akses">
                    <input type="text" name="" class="form-control" id="edit_id_level" name="edit_id_level">
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="ajax_action_edit_level()">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="add-kegiatan-show" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="padding: 3%">
                <div>
                    <center>
                        <h2 class="text-popins">Laporan Kegiatan</h2>
                    </center>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama Petugas 1</label>
                    <select class="form-control" id="petugas_satu"></select>
                </div>

                <div style="margin-top: 3%"></div>
                <div>
                    <label>Nama Petugas 2</label>
                    <input type="text" class="form-control" id="petugas_dua">
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Kegiatan</label>
                    <div>
                        <table class="table table-bordered" id="list_kegiatan">
                        </table>
                    </div>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <label>Keterangan</label>
                    <textarea id="keterangan" class="form-control"></textarea>
                </div>
                <div style="margin-top: 3%"></div>
                <div>
                    <div class="row">
                        <div class="col-12" style="text-align: right;">
                            <button class="btn btn-primary " onclick="action_simpan_kegiatan()">Laporkan Kegiatan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>