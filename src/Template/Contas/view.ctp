<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Conta $conta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Conta'), ['action' => 'edit', $conta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conta'), ['action' => 'delete', $conta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conta'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contas view large-9 medium-8 columns content">
    <h3><?= h($conta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tipo Pessoa') ?></th>
            <td><?= h($conta->tipo_pessoa) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo Conta') ?></th>
            <td><?= h($conta->tipo_conta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($conta->id) ?></td>
        </tr>
    </table>
</div>
