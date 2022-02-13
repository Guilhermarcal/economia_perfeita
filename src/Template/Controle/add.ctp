<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Controle $controle
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Banco $banco
 */
?>
<?= $this->Form->create($controle) ?>
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
                        <h4>Realizar Ação</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <select class="form-select" name="nome">
                                    <option value=""></option>
                                    <option value="Deposito">Deposito</option>
                                    <option value="Saque">Saque</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="imagem">Valor</label>
                                <input type="text" name="valor" class="form-control round" placeholder="Informe o valor">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('bancos_id', ['options' => $bancos, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <?php echo $this->Form->control('contas_id', ['options' => $contas, 'class' => 'form-control']); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-primary me-1 mb-1']) ?>
                            <?= $this->Html->link(__('Voltar'), ['action' => '/index'],['class' => 'btn btn-light-danger me-1 mb-1']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<?= $this->Html->script('/webroot/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>
<?= $this->Html->script('/webroot/assets/js/bootstrap.bundle.min.js'); ?>
<?= $this->Html->script('/webroot/assets/vendors/apexcharts/apexcharts.js'); ?>
<?= $this->Html->script('/webroot/assets/js/pages/dashboard.js'); ?>
<?= $this->Html->script('/webroot/assets/js/mazer.js'); ?>