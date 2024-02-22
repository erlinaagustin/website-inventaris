<?php include('layouts/header.php'); ?>
<?php include('layouts/sidebar.php'); ?>
<?php include('layouts/topbar.php'); ?>



<div class="container-fluid">
<?= form_open('pengguna/simpan', ['method' => 'post']); ?>

<div class="form-group mb-3">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" value = "<?= $pengguna['email'] ?>">
</div>

<div class="form-group mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" value = "<?= $pengguna['username'] ?>">
</div>

<?= form_close(); ?>

</div>


<?php include('layouts/footer.php'); ?>

