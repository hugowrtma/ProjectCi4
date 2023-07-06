<!-- View: edit_user.php -->
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2>Edit User</h2>
    <form action="<?= base_url('kelola-user/update/' . $user['id']) ?>" method="POST" class="form">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" name="role" id="role" class="form-control" value="<?= $user['role'] ?>" required>
        </div>
        <!-- Add other fields as needed -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?= $this->endSection() ?>
