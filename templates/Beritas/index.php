<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Berita> $beritas
 */
?>
<div class="beritas index content">
    <?= $this->Html->link(__('New Berita'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Beritas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('judul') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($beritas as $berita): ?>
                <tr>
                    <td><?= $this->Number->format($berita->id) ?></td>
                    <td><?= h($berita->judul) ?></td>
                    <td><?= $berita->has('user') ? $this->Html->link($berita->user->id, ['controller' => 'Users', 'action' => 'view', $berita->user->id]) : '' ?></td>
                    <td><?= h($berita->created) ?></td>
                    <td><?= h($berita->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $berita->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $berita->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $berita->id], ['confirm' => __('Are you sure you want to delete # {0}?', $berita->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
