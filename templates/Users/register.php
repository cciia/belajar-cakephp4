<div class="users form content">

<?= $this->Form->create($user, ['type' => 'file']) ?>

    <fieldset>
        <legend>Register</legend>

        <?=
        $this->Form->control('nama');

        echo $this->Form->control('email');

        echo $this->Form->control('password');
        
        echo $this->Form->control('foto', ['type' => 'file']);
        ?>
    </fieldset>

    <?= $this->Form->button('Register') ?>

    <?= $this->Form->end() ?>

</div>