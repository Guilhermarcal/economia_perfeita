<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controle $controle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Controle'), ['action' => 'edit', $controle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Controle'), ['action' => 'delete', $controle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $controle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Controle'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Controle'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas'), ['controller' => 'Contas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conta'), ['controller' => 'Contas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="controle view large-9 medium-8 columns content">
    <h3><?= h($controle->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($controle->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Banco') ?></th>
            <td><?= $controle->has('banco') ? $this->Html->link($controle->banco->id, ['controller' => 'Bancos', 'action' => 'view', $controle->banco->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Conta') ?></th>
            <td><?= $controle->has('conta') ? $this->Html->link($controle->conta->id, ['controller' => 'Contas', 'action' => 'view', $controle->conta->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($controle->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= $this->Number->format($controle->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data') ?></th>
            <td><?= h($controle->data) ?></td>
        </tr>
    </table>
</div>
