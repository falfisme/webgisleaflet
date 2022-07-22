<?php 

//Notifikasi Error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open(base_url('user/edit/'.$user->id_user),' class="form-horizontal"');

?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Nama Pengguna</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Nama Pengguna" name="name" value="<?= $user->name ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Email</label>
    <div class="col-md-5">
        <input type="email" class="form-control"  placeholder="Email" name="email" value="<?= $user->email ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Username</label>
    <div class="col-md-5">
        <input type="text" class="form-control"  placeholder="Username" name="username" value="<?= $user->username ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Password</label>
    <div class="col-md-5">
        <input type="password" class="form-control"  placeholder="Password" name="password" value="<?= $user->password ?>" readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Level Hak Akses</label>
    <div class="col-md-5">
        <!-- <select name="role" class="form-control">
            <option value="Admin">Admin</option>
            <option value="User" <?php if($user->role=="User") {echo "selected";} ?>>User</option>
        </select> -->

        <select name="role" class="form-control">   
        <?php
            $roleusers = $this->m_roleuser->listing();
            foreach($roleusers as $results){ ?>
                <option value="<?= $results->id_roleuser;?>" <?php if($user->role==$results->id_roleuser) {echo "selected";} ?> > <?= $results->role_name;?> </option>                               
                
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