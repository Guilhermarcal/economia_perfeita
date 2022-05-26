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
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="nome">Nome da Ação</label>
                                <select class="form-select" name="nome[]" id="nome" onchange="alteraExibicaoTransferencia(this.id)">
                                    <option value=""></option>
                                    <option value="Deposito">Deposito</option>
                                    <option value="Saque">Saque</option>
                                    <option value="Transferencia">Transferência</option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <div class="row" id="primeira_linha">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <input type="text" name="descricao[]" class="form-control round" placeholder="Informe a Descrição">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="imagem">Valor</label>
                                    <input type="text" name="valor[]" class="form-control round" placeholder="Informe o valor">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?php echo $this->Form->control('pessoas_id[]', ['options' => $pessoas, 'class' => 'form-control', 'label' => 'Nome Pessoa']); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?php echo $this->Form->control('contas_id', ['options' => $contas, 'class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="segunda_linha" style="display: none;">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <select class="form-select" name="descricao[]" id="descricao">
                                        <option value=""></option>
                                        <option value="Pix">Pix</option>
                                        <option value="Ted">Ted</option>
                                        <option value="Outra">Outra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="imagem">Valor</label>
                                    <input type="text" name="valor[]" class="form-control round" placeholder="Informe o valor">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <?php echo $this->Form->control('pessoas_id[]', ['options' => $pessoas, 'class' => 'form-control', 'label' => 'De quem sai']); ?>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Quem recebe</label>
                                    <select name="pessoa_dois" class="form-control">
                                        <?php $i = 1; foreach ($pessoas as $key) { ?>
                                            <option value="<?php echo $i++; ?>"><?php echo $key ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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
<script type="text/javascript">
    
    function alteraExibicaoTransferencia(id){

        var select = document.getElementById(id);
        var value = select.options[select.selectedIndex].value;

        if(value == 'Transferencia'){

            document.getElementById("primeira_linha").style.display = "none";
            document.getElementById("segunda_linha").style.display = "flex";

        }else{

            document.getElementById("primeira_linha").style.display = "flex";
            document.getElementById("segunda_linha").style.display = "none";

        }
    }

</script>