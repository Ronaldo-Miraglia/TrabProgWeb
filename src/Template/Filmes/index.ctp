<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme[]|\Cake\Collection\CollectionInterface $filmes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Filme'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filmes index large-9 medium-8 columns content">
    <h3><?= __('Filmes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('preco') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme): ?>
            <tr>
                <td><?= $this->Number->format($filme->id) ?></td>
                <td><?= h($filme->nome) ?></td>
                <td><?= $this->Number->format($filme->preco) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $filme->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filme->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id)]) ?>
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
