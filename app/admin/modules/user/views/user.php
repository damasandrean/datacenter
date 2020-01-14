<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1>Admin</h1>
        <ul>
            <li><a href="">Karyawan</a></li>
            <li>Table</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="row mb-4">

        <div class="col-md-12 mb-3">
            <div class="card text-left">
                <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h4 class="card-title mb-3">Admin Table</h4> 
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#add-user">Tambah User</button>
                    </div>
                </div>
                   <div style="margin-top: 3%"></div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="list_admin">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                      <th scope="col">Action</th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- end of col-->

       
        <!-- end of col-->

    </div>

    <?= $this->load->view('js/js')?>