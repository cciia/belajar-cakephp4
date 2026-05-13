<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Berita $berita
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Beritas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="beritas form content">
            <?= $this->Form->create($berita) ?>
            <fieldset>
                <legend><?= __('Add Berita') ?></legend>
                <?php
                    echo $this->Form->control('judul');
                    echo $this->Form->control('deskripsi');
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
