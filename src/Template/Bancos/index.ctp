<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banco[]|\Cake\Collection\CollectionInterface $bancos
 */
?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
            
    <div class="page-heading">
        <h3>Economia Perfeita</h3>
    </div>

    <div class="page-content">
        <section class="row">
            <div class="card">
                <div class="col-12 col-lg-12">
                    <div class="card-header">
                        <h4>Histórico de Transação</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($bancos as $banco): ?>
                                    <tr>
                                        <td>
                                            <?php echo $this->Html->image('/img/bancos/'.$banco->id.'.jpg', [
                                                "alt" => "user",
                                                "width" => "32px",
                                                "heigth" => "32px",
                                            ]); ?>
                                        </td>
                                        <td><?= h($banco->nome) ?></td>
                                        <td class="actions">
                                            <?= $this->Html->link(
                                                '<i class="iconly-boldEdit" aria-hidden="true" title="Editar"></i>',
                                                ['action' => 'edit', $banco->id],
                                                ['escape' => false, 'class' => 'btn btn-success']
                                            ) ?>

                                            <?= $this->Form->postLink(
                                                '<i class="iconly-boldDelete" aria-hidden="true" title="Deletar"></i>',
                                                ['action' => 'delete', $banco->id],
                                                ['escape' => false, 'confirm' => __('Você quer deletar # {0}?', $banco->id), 'class' => 'btn btn-danger']
                                            ) ?>

                                            <?= $this->Html->link(
                                                '<i class="iconly-boldShow" aria-hidden="true" title="View"></i>',
                                                ['action' => 'view', $banco->id],
                                                ['escape' => false, 'class' => 'btn btn-warning']
                                            ) ?>

                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="paginator2">
                                <ul class="pagination2">
                                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                    <?= $this->Paginator->numbers() ?>
                                    <?= $this->Paginator->next(__('next') . ' >') ?>
                                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                                </ul>
                                <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?></p>
                            </div>
                        </div>
                        <div class="fab">
                            <?= $this->Html->link(__(''), ['action' => 'add'],['class' => 'main', 'style' => 'color: white;font-size: 25px;']) ?>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
<?= $this->Html->script('/webroot/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>
<?= $this->Html->script('/webroot/assets/js/bootstrap.bundle.min.js'); ?>
<?= $this->Html->script('/webroot/assets/vendors/apexcharts/apexcharts.js'); ?>
<?= $this->Html->script('/webroot/assets/js/pages/dashboard.js'); ?>
<?= $this->Html->script('/webroot/assets/js/mazer.js'); ?>