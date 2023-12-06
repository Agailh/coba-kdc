<!-- User/edit.php (View) -->
<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit My profile</h1>

    <!-- Display validation errors if any -->
    <?php if (isset($validation)) : ?>
        <?= \Config\Services::validation()->listErrors(); ?>
    <?php endif; ?>

    <form action="<?= base_url('user/edit'); ?>" method="post">
        <?= csrf_field(); ?>

        <div class="mb-3">
            <label for="fullname" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= user()->username; ?>">
        </div>
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= user()->fullname; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</div>

<?= $this->endSection(); ?>