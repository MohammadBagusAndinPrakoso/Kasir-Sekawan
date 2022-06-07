<div class="container-fluid" id="load-data">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        
    </div>

    <div class="row">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <a class="btn btn-primary mb-2" href="javascript:;" onclick="showForm()">Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-user" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="10%">No.</th>
                                    <th width="10%">Foto</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Role</th>
                                    <th width="20%">Username</th>
                                    <th width="20%">Program</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
<?php $this->load->view('users/form'); ?>
<?php $this->load->view('users/javascript'); ?>