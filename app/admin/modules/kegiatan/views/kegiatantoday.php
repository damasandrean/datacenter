<div class="main-content-wrap sidenav-open d-flex flex-column">
    <div class="breadcrumb">
        <h1>Tabel Kegiatan Petugas</h1>
        <ul>
            <li><a href="">System</a></li>
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
                        <h4 class="card-title mb-3">Silahkan Isi</h4> 
                    </div>
                    

                </div>
                   <div style="margin-top: 3%"></div>
                    <div class="table-responsive">
                        <table class="table" id="list_admin">
                            <thead>
                            	<form>
      								<div class="form-row">
       								<div class="form-group col-md-6">
         								<label for="petugas1">Nama Petugas 1</label>
          								<input type="text" class="form-control" id="petugas1">
        							</div>
       								<div class="form-group col-md-6">
          								<label for="petugas2">Nama Petugas 2</label>
          								<input type="text" class="form-control" id="petugas2">
        							</div>
     								</div>
     							</form>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kegiatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                               	
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        						<div class="form-group col-md-6">
          							<label for="keterangan">Keterangan</label>
          							<input type="text" class="form-control" id="keterangan">
        						</div>
        <!-- end of col-->

       
        <!-- end of col-->

    </div>

    <?php $this->load->view("js/js")?>