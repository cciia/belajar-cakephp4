<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Berita $berita
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Berita'), ['action' => 'edit', $berita->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Berita'), ['action' => 'delete', $berita->id], ['confirm' => __('Are you sure you want to delete # {0}?', $berita->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Beritas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Berita'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="beritas view content">
            <h3><?= h($berita->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Judul') ?></th>
                    <td><?= h($berita->judul) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $berita->has('user') ? $this->Html->link($berita->user->id, ['controller' => 'Users', 'action' => 'view', $berita->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($berita->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($berita->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($berita->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Deskripsi') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($berita->deskripsi)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
