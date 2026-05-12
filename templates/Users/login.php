<div class="users form content">

    <?= $this->Form->create() ?>

    <fieldset>

        <legend>Login</legend>

        <?=
        $this->Form->control('email');

        echo $this->Form->control('password');
        ?>

    </fieldset>

    <?= $this->Form->button('Login') ?>

    <?= $this->Form->end() ?>

    <p>Belum punya akun?
        <?= $this->Html->link
        ('Register di sini', [ 'action' => 'register']) ?>
    </p>

</div>