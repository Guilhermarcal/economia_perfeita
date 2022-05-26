<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\pessoa $pessoa
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
                        <h4>Ver Pessoa - <?php echo $pessoa['nome'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" name="nome" id="nome" class="form-control round" placeholder="Nome da Pessoa" value="<?php echo $pessoa['nome'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="saldo">Saldo</label>
                                <input type="text" name="saldo" id="saldo" class="form-control round" placeholder="Saldo da Pessoa" value="<?php echo $pessoa['saldo'] ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <?php echo $this->Html->image('/img/pessoas/'.$pessoa->id.'.jpg', [
                                    "alt" => "user",
                                    "width" => "64px",
                                    "heigth" => "64px",
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-sm-12 d-flex justify-content-end">
                            <?= $this->Html->link(__('Voltar'), ['action' => '/index'],['class' => 'btn btn-light-danger me-1 mb-1']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>