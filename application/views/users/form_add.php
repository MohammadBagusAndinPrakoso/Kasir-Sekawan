<?php

if ($message != "") {
    echo '<script type="text/javascript">';
    echo ' alert("'.$message.'")';  //not showing an alert box.
    echo '</script>';
}

?>

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('index.php/user/actionAdd') ?>" method="post" id="addUser" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="Nama" class="col-2 col-form-label">Name</label>
                            <div class="col-10">
                                <input type="text" class="form-control" id="Name" name="Name" value="<?= set_value('Name') ?>">
                                <small class="text-danger">
                                    <?php echo form_error('Name') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Role" class="col-sm-2 col-form-label">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="Role" name="Role" value="<?= set_value('Role') ?>" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                </select>
                                <small class="text-danger">
                                    <?php echo form_error('Role') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="Username" name="Username" value="<?= set_value('Username') ?>">
                                <small class="text-danger">
                                    <?php echo form_error('Username') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="Password" name="Password" value="<?= set_value('Password') ?>">
                                <small class="text-danger">
                                    <?php echo form_error('Password') ?>
                                </small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Foto" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="Foto" name="Foto" value="<?= set_value('Foto') ?>">
                                <small class="text-danger">
                                    <?php echo form_error('Foto') ?>
                                </small>
                            </div>
                        </div>

                        <div class="offset-lg-10">
                            <button type="submit" class="btn btn-success btn-block">Simpan</button>
                            <a class="btn btn-danger btn-block" href="<?= base_url('index.php/user')?>">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>