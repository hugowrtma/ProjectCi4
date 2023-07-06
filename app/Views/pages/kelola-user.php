<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2>Kelola User</h2>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['role'] ?></td>
                    <td><?= $user['is_aktif'] ? 'Aktif' : 'Non-Aktif' ?></td>
                    <td>
                        <a href="<?= base_url('kelola-user/edit/' . $user['id']) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= base_url('kelola-user/delete/' . $user['id']) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Delete</a>

                        <?php if ($user['is_aktif']) : ?>
                            <a href="<?= base_url('kelola-user/deactivate/' . $user['id']) ?>" class="btn btn-warning">Deactivate</a>
                        <?php else : ?>
                            <a href="<?= base_url('kelola-user/activate/' . $user['id']) ?>" class="btn btn-success">Activate</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
