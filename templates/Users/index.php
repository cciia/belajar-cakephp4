<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="users index content">

    <?= $this->Form->postLink(
        'Logout',
        ['action' => 'logout'],
        [
            'class' => 'button float-right',
            'style' => 'margin-left:10px;'
        ]
    ) ?>

    <?= $this->Html->link(
        __('New User'),
        ['action' => 'add'],
        ['class' => 'button float-right']
    ) ?>
    <div style="display:flex; align-items:center; gap:15px; margin-bottom:20px;">

        <?php if (!empty($identity->foto)): ?>

            <?= $this->Html->image($identity->foto, [
                'width' => '70',
                'style' => 'border-radius:50%; object-fit:cover;'
            ]) ?>

        <?php endif; ?>

        <div>
            <h4 style="margin:0;">
                Halo, <?= h($identity->nama) ?> 👋
            </h4>

            <small>
                <?= h($identity->email) ?>
            </small>

            <small>
                Role: <?= h($identity->role) ?>
            </small>
        </div>

    </div>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('nama') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th>Foto</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->nama) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                  <td>
            <?php if (!empty($user->foto)): ?>
                <img 
                    src="<?= $this->Url->image($user->foto) ?>" 
                    width="60"
                    style="cursor:pointer;"
                    onclick="openImage(this.src)"
                >
            <?php else: ?>
                <span>Tidak ada foto</span>
            <?php endif; ?>
        </td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fas fa-eye"></i>',
                        ['action' => 'view', $user->id], ['escape' => false, 'title' => 'View']) ?>
                        
                        <?= $this->Html->link('<i class="fas fa-edit"></i>', 
                        ['action' => 'edit', $user->id], ['escape' => false, 'title' => 'Edit']) ?>
                        
                        <?php if ($isAdmin): ?>

                        <?= $this->Form->postLink(
                            '<i class="fas fa-trash"></i>',
                            ['action' => 'delete', $user->id],
                            [
                                'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                                'escape' => false,
                                'title' => 'Delete',
                                'class' => 'delete-icon'
                            ]
                        ) ?>

                    <?php endif; ?>
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
    <div id="imgModal" style="
        display:none;
        position:fixed;
        top:0; left:0;
        width:100%; height:100%;
        background:rgba(0,0,0,0.9);
        justify-content:center;
        align-items:center;
        z-index:9999;
    ">

        <span onclick="closeImage()" 
            style="position:absolute; top:20px; right:30px;
            color:white; font-size:35px; cursor:pointer;">
            &times;
        </span>

        <img id="modalImg" style="max-width:90%; max-height:90%;">
    </div>
    
    .delete-icon {
    background: none;
    border: none;
    padding: 0;
    color: red;
    cursor: pointer;
    font-size: 16px;
    }
    
    <script>
    function openImage(src) {
        document.getElementById('modalImg').src = src;
        document.getElementById('imgModal').style.display = 'flex';
    }

    function closeImage() {
        document.getElementById('imgModal').style.display = 'none';
    }
    </script>