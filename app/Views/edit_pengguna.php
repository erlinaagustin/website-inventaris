<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>

<div class="container-fluid">
    <?= form_open('pengguna/update', ['method' => 'post']); ?>
        <input type="hidden" name="id" value="<?= $pengguna['id']; ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="<?= $pengguna['email'] ?>" required>
        </div>
        <div class="form-group">
            <label for="nomor_hp">Nomor HP</label>
            <input type="text" name="nomor_hp" class="form-control" value="<?= $pengguna['nomor_hp'] ?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" value="<?= $pengguna['username'] ?>" required>
        </div>
        <div class="form-group">
            <label for="password_hash">Password</label>
            <input type="password" name="password_hash" class="form-control">
            <i>*Isi jika ingin mengganti password</i>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <?= form_close(); ?>
</div>

<?php include('layouts/footer.php'); ?>