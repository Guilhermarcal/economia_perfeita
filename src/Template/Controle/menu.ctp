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
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldWallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Saldo</h6>
                                        <h6 class="font-extrabold mb-0">R$ <?php echo number_format($controle_geral['saldo_total'], 2, ',', '.') ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldCalendar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Saldo Mês Atual</h6>
                                        <h6 class="font-extrabold mb-0">R$ <?php echo number_format($controle_geral['saldo_total_mes'], 2, ',', '.') ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldPaper-Upload"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Entrada</h6>
                                        <h6 class="font-extrabold mb-0">R$ <?php echo number_format($controle_geral['saldo_entrada'], 2, ',', '.') ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldPaper-Download"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Total Saida</h6>
                                        <h6 class="font-extrabold mb-0">R$ <?php echo number_format($controle_geral['saldo_saida'], 2, ',', '.') ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Histórico Anual</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/8.jpg" alt="Face 8">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Guilherme Marçal</h5>
                                <h6 class="text-muted mb-0">@guilhermarcal</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Carteira</h4>
                    </div>
                    <div class="card-body">
                        <div id="carteiraPessoas"></div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Lucro Pessoas</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($pessoas as $key) { ?>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <svg class="bi" style="color: <?php echo $controle_geral['cor'][$key]?>" width="32" height="32" fill="blue"
                                            style="width:10px">
                                            <use
                                                xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                        </svg>
                                        <h5 class="mb-0 ms-3"><?php echo $key ?></h5>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="mb-0"><?php echo number_format($controle_geral['mes'][$key]['total'], 2, ',', '.')?></h5>
                                </div>
                                <div class="col-12">
                                    <div id="<?php echo 'lucro'.$key ?>"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Histórico de Transação</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-lg">
                                <thead>
                                    <tr>
                                        <th>Banco</th>
                                        <th>Descrição</th>
                                        <th>Tipo</th>
                                        <th>Conta</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($controle as $key) { 
                                        if($key->nome == 'Deposito'){ ?>
                                            <tr style="background-color: #5ddab4;color: black;">
                                        <?php } else { ?>
                                            <tr style="background-color: #ff7976;color: black;">
                                        <?php } ?>
                                            <td class="col-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-md">
                                                        <img src="img/bancos/<?php echo $key->banco['id'] ?>.jpg">
                                                    </div>
                                                    <p class="font-bold ms-3 mb-0"><?php echo $key->banco['nome'] ?></p>
                                                </div>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"><?php echo $key->descricao ?></p>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"><?php echo $key->nome ?></p>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0"><?php echo $key->conta->tipo_conta ?></p>
                                            </td>
                                            <td class="col-auto">
                                                <p class=" mb-0">R$ <?php echo number_format($key->valor, 2, ',', '.') ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Economia Perfeita</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://ahmadsaugi.com">Guilherme Marçal</a></p>
            </div>
        </div>
    </footer>
</div>
<?= $this->Html->script('/webroot/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>
    <?= $this->Html->script('/webroot/assets/js/bootstrap.bundle.min.js'); ?>
    <?= $this->Html->script('/webroot/assets/vendors/apexcharts/apexcharts.js'); ?>

    <?= $this->Html->script('/webroot/assets/js/mazer.js'); ?>

<script type="text/javascript">

    var ano = ['janeiro', 'fevereiro', 'marco', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];

    var janeiro = "<?php echo $controle_geral['mes'][1] ?>";
    var fevereiro = "<?php echo $controle_geral['mes'][2] ?>";
    var marco = "<?php echo $controle_geral['mes'][3] ?>";
    var abril = "<?php echo $controle_geral['mes'][4] ?>";
    var maio = "<?php echo $controle_geral['mes'][5] ?>";
    var junho = "<?php echo $controle_geral['mes'][6] ?>";
    var julho = "<?php echo $controle_geral['mes'][7] ?>";
    var agosto = "<?php echo $controle_geral['mes'][8] ?>";
    var setembro = "<?php echo $controle_geral['mes'][9] ?>";
    var outubro = "<?php echo $controle_geral['mes'][10] ?>";
    var novembro = "<?php echo $controle_geral['mes'][11] ?>";
    var dezembro = "<?php echo $controle_geral['mes'][12] ?>";

    <?php $aux = 1; foreach ($pessoas as $key):
        
        for ($i = 0; $i < 12; $i++) {  ?>
            
            var <?php echo $key.$aux; ?> = <?php echo $controle_geral['mes'][$key][$aux++];?>;

        <?php } $aux = 1; ?>
    
        var <?php echo 'banco'.$key; ?> = <?php echo $controle_geral[$key] ?>;

    <?php endforeach ?>

    var optionsProfileVisit = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled:false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity:1
    },
    plotOptions: {
    },
    series: [{
        name: 'sales',
        data: [janeiro,fevereiro,marco,abril,maio,junho,julho,agosto,setembro,outubro,novembro,dezembro]
    }],
    colors: '#435ebe',
    xaxis: {
        categories: ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"],
    },
}

var seriesCateira = [];
var labelsCateira = [];
var colorsCateira = [];

<?php foreach ($pessoas as $key) { ?>

    seriesCateira.push(<?php echo 'banco'.$key ?>);
    labelsCateira.push('<?php echo $key ?>');
    colorsCateira.push('<?php echo $controle_geral['cor'][$key]  ?>');

<?php } ?>

var carteiraPessoas  = {

    series: seriesCateira,
    labels: labelsCateira,
    colors: colorsCateira,
    chart: {
        type: 'donut',
        width: '100%',
        height:'350px'
    },
    legend: {
        position: 'bottom'
    },
    plotOptions: {
        pie: {
            donut: {
                size: '30%'
            }
        }
    }
};

var dataLucro = [];
var colorsLucro = [];

<?php foreach ($pessoas as $key) {

    for ($i = 1; $i <= 12; $i++) { ?>
        
        dataLucro.push(<?php echo $key.$i;?>);
        colorsLucro.push('<?php echo $controle_geral['cor'][$key]  ?>');

    <?php } ?>

    let <?php echo 'lucroPessoas'.$key ?> = {
        series: [{
            name: 'series1',
            data: dataLucro
        }],
        chart: {
            height: 80,
            type: 'area',
            toolbar: {
                show:false,
            },
        },
        colors: colorsLucro,
        stroke: {
            width: 2,
        },
        grid: {
            show:false,
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            type: 'text',
            categories: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
            axisBorder: {
                show:false
            },
            axisTicks: {
                show:false
            },
            labels: {
                show:false,
            }
        },
        show:false,
        yaxis: {
            labels: {
                show:false,
            },
        },
        tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
        },
    };

    var <?php echo 'lucro'.$key ?> = new ApexCharts(document.querySelector("#lucro<?php echo $key; ?>"), <?php echo 'lucroPessoas'.$key ?>);
    
    <?php echo 'lucro'.$key ?>.render();
    dataLucro = [];
    colorsLucro = [];
<?php } ?>

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var carteiraPessoasTotal = new ApexCharts(document.getElementById('carteiraPessoas'), carteiraPessoas);

chartProfileVisit.render();
carteiraPessoasTotal.render();

</script>