<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersFilme[]|\Cake\Collection\CollectionInterface $usersFilmes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Users Filme'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Filmes'), ['controller' => 'Filmes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Filme'), ['controller' => 'Filmes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usersFilmes index large-9 medium-8 columns content">
    <h3><?= __('Users Filmes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('filme_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usersFilmes as $usersFilme): ?>
            <tr>
                <td><?= $this->Number->format($usersFilme->id) ?></td>
                <td><?= $usersFilme->has('user') ? $this->Html->link($usersFilme->user->id, ['controller' => 'Users', 'action' => 'view', $usersFilme->user->id]) : '' ?></td>
                <td><?= $usersFilme->has('filme') ? $this->Html->link($usersFilme->filme->id, ['controller' => 'Filmes', 'action' => 'view', $usersFilme->filme->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $usersFilme->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $usersFilme->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $usersFilme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersFilme->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
