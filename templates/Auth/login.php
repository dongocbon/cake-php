<h1>Đăng nhập</h1>

<?= $this->Form->create() ?>
<?= $this->Form->control('email', ['label' => 'Email']) ?>
<?= $this->Form->control('password', ['label' => 'Mật khẩu']) ?>
<?= $this->Form->button('Đăng nhập') ?>
<?= $this->Form->end() ?>
