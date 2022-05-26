<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\pessoa $pessoa
 */
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\pessoa $pessoa
 */
?>
<?= $this->Form->create($pessoa, ['type' => 'file']) ?>
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
                        <h4>Editar Pessoa - <?php echo $pessoa['nome'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control round" placeholder="Nome da pessoa" value="<?php echo $pessoa['nome'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <input type="text" name="saldo" id="saldo" class="form-control round" placeholder="Saldo da pessoa" value="<?php echo $pessoa['saldo'] ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="imagem">Imagem</label>
                                <input type="file" name="file" id="imagem" class="form-control round">
                                <?php echo $this->Html->image('/img/pessoas/'.$pessoa->id.'.jpg', [
                                    "alt" => "user",
                                    "width" => "32px",
                                    "heigth" => "32px",
                                ]); ?>
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