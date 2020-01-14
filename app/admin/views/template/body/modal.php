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



