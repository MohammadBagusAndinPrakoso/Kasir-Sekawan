<div class="container-fluid pt-4" style="display:none;" id="form-data">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="form-user" autocomplete="off" method="post" enctype="multipart/form-data" action="javascript:save();">
                        <div class="form-group row">
                            <label for="Nama" class="col-2 col-form-label">Name</label>
                            <div class="col-10">
                                <input type="hidden" name="user_id" value="">
                                <input type="text" class="form-control" id="Name" name="Name" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="Role" name="Role" value="">
                                <option value="">Pilih</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                </select> 
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Username" name="Username" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="Password" name="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="Foto" name="Foto">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input type="hidden" name="fotolama" value="">
                            </div>
                        </div>

                        <div class="offset-lg-10">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                            <a class="btn btn-danger btn-block" href="javascript:;" onclick="onBack()">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>