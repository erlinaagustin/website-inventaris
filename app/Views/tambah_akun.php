<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('pengguna/simpan', ['method' => 'post']); ?>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" name="nomor_hp" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password_hash">Password</label>
            <input type="password" name="password_hash" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    <?= form_close(); ?>
</div>


<?php include('layouts/footer.php'); ?>
