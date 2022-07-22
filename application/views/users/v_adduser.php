<?php 

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('user/add'),' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Pengguna</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Pengguna" name="name" value="<?= set_value('name') ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Email</label>
    <div class="col-md-5">
        <input type="email" class="form-control"  placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Username</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Username" name="username" value="<?= set_value('username') ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Password</label>
    <div class="col-md-5">
        <input type="password" class="form-control"  placeholder="Password" name="password" value="<?= set_value('password') ?>" required>
    </div>
</div>

<!-- <div class="form-group row">
    <label class="col-md-2 col-form-label">Level Hak Akses</label>
    <div class="col-md-5">
        <select name="role" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
    </div>
</div> -->

<div class="form-group row">
    <label class="col-md-2 col-form-label">Level Hak Akses</label>
    <div class="col-md-5">
    
        <select name="role" class="form-control">
            
        <?php
            $roleusers = $this->m_roleuser->listing();
            foreach($roleusers as $results){ ?>
                <option value="<?= $results->id_roleuser;?>"><?= $results->role_name;?></option>                               
                
            <?php };?>
        </select>
    </div>
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"></label>
    <div class="col-md-5">
       <button class="btn btn-success btn-lg" name="submit" type="submit">
           <i class="fa fa-save"></i> Simpan
       </button>
       <button class="btn btn-primary btn-lg" name="reset" type="reset">
           <i class="fa fa-times"></i> Reset
       </button>
    </div>
</div>
<?php echo form_close(); ?>