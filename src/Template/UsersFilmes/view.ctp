<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UsersFilme $usersFilme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Filme'), ['action' => 'edit', $usersFilme->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Filme'), ['action' => 'delete', $usersFilme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersFilme->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Filmes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Filme'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Filmes'), ['controller' => 'Filmes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filme'), ['controller' => 'Filmes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersFilmes view large-9 medium-8 columns content">
    <h3><?= h($usersFilme->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersFilme->has('user') ? $this->Html->link($usersFilme->user->id, ['controller' => 'Users', 'action' => 'view', $usersFilme->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Filme') ?></th>
            <td><?= $usersFilme->has('filme') ? $this->Html->link($usersFilme->filme->id, ['controller' => 'Filmes', 'action' => 'view', $usersFilme->filme->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersFilme->id) ?></td>
        </tr>
    </table>
</div>
