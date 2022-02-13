<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controle $controle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $controle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $controle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Controle'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bancos'), ['controller' => 'Bancos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Banco'), ['controller' => 'Bancos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas'), ['controller' => 'Contas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conta'), ['controller' => 'Contas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="controle form large-9 medium-8 columns content">
    <?= $this->Form->create($controle) ?>
    <fieldset>
        <legend><?= __('Edit Controle') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('valor');
            echo $this->Form->control('data');
            echo $this->Form->control('bancos_id', ['options' => $bancos]);
            echo $this->Form->control('contas_id', ['options' => $contas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
