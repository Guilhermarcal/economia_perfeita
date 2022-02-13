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
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldHeart"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Disponível Para Gastar</h6>
                                        <h6 class="font-extrabold mb-0">R$ <?php echo number_format($controle_geral['mes']['total_disponivel_para_gastar'], 2, ',', '.') ?></h6>
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
                                            <i class="iconly-boldLock"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Já Gastei</h6>
                                        <h6 class="font-extrabold mb-0">R$ <?php echo number_format($controle_geral['mes']['total_gasto_no_mes'], 2, ',', '.') ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldStar"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Status Conta</h6>
                                        <h6 class="font-extrabold mb-0"><?php echo $controle_geral['mes']['mensagem'] ?></h6>
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
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Saldo Bancos</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi" style="color: #435ebe" width="32" height="32" fill="blue"
                                        style="width:10px">
                                        <use
                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Banco do Brasil</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0"><?php echo number_format($controle_geral['mes']['bancoBrasil']['total'], 2, ',', '.')?></h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-europe"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi" style="color: #ED9F0E" width="32" height="32" fill="blue"
                                        style="width:10px">
                                        <use
                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Banco Itaú</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0"><?php echo number_format($controle_geral['mes']['bancoItau']['total'], 2, ',', '.')?></h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-america"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <svg class="bi" style="color: #9F44F9" width="32" height="32" fill="blue"
                                        style="width:10px">
                                        <use
                                            xlink:href="assets/vendors/bootstrap-icons/bootstrap-icons.svg#circle-fill" />
                                    </svg>
                                    <h5 class="mb-0 ms-3">Nubank</h5>
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="mb-0"><?php echo number_format($controle_geral['mes']['bancoNubank']['total'], 2, ',', '.')?></h5>
                            </div>
                            <div class="col-12">
                                <div id="chart-indonesia"></div>
                            </div>
                        </div>
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

    var brasiljaneiro = "<?php echo $controle_geral['mes']['bancoBrasil'][1] ?>";
    var brasilfevereiro = "<?php echo $controle_geral['mes']['bancoBrasil'][2] ?>";
    var brasilmarco = "<?php echo $controle_geral['mes']['bancoBrasil'][3] ?>";
    var brasilabril = "<?php echo $controle_geral['mes']['bancoBrasil'][4] ?>";
    var brasilmaio = "<?php echo $controle_geral['mes']['bancoBrasil'][5] ?>";
    var brasiljunho = "<?php echo $controle_geral['mes']['bancoBrasil'][6] ?>";
    var brasiljulho = "<?php echo $controle_geral['mes']['bancoBrasil'][7] ?>";
    var brasilagosto = "<?php echo $controle_geral['mes']['bancoBrasil'][8] ?>";
    var brasilsetembro = "<?php echo $controle_geral['mes']['bancoBrasil'][9] ?>";
    var brasiloutubro = "<?php echo $controle_geral['mes']['bancoBrasil'][10] ?>";
    var brasilnovembro = "<?php echo $controle_geral['mes']['bancoBrasil'][11] ?>";
    var brasildezembro = "<?php echo $controle_geral['mes']['bancoBrasil'][12] ?>";

    var itaujaneiro = "<?php echo $controle_geral['mes']['bancoItau'][1] ?>";
    var itaufevereiro = "<?php echo $controle_geral['mes']['bancoItau'][2] ?>";
    var itaumarco = "<?php echo $controle_geral['mes']['bancoItau'][3] ?>";
    var itauabril = "<?php echo $controle_geral['mes']['bancoItau'][4] ?>";
    var itaumaio = "<?php echo $controle_geral['mes']['bancoItau'][5] ?>";
    var itaujunho = "<?php echo $controle_geral['mes']['bancoItau'][6] ?>";
    var itaujulho = "<?php echo $controle_geral['mes']['bancoItau'][7] ?>";
    var itauagosto = "<?php echo $controle_geral['mes']['bancoItau'][8] ?>";
    var itausetembro = "<?php echo $controle_geral['mes']['bancoItau'][9] ?>";
    var itauoutubro = "<?php echo $controle_geral['mes']['bancoItau'][10] ?>";
    var itaunovembro = "<?php echo $controle_geral['mes']['bancoItau'][11] ?>";
    var itaudezembro = "<?php echo $controle_geral['mes']['bancoItau'][12] ?>";

    var nubankjaneiro = "<?php echo $controle_geral['mes']['bancoNubank'][1] ?>";
    var nubankfevereiro = "<?php echo $controle_geral['mes']['bancoNubank'][2] ?>";
    var nubankmarco = "<?php echo $controle_geral['mes']['bancoNubank'][3] ?>";
    var nubankabril = "<?php echo $controle_geral['mes']['bancoNubank'][4] ?>";
    var nubankmaio = "<?php echo $controle_geral['mes']['bancoNubank'][5] ?>";
    var nubankjunho = "<?php echo $controle_geral['mes']['bancoNubank'][6] ?>";
    var nubankjulho = "<?php echo $controle_geral['mes']['bancoNubank'][7] ?>";
    var nubankagosto = "<?php echo $controle_geral['mes']['bancoNubank'][8] ?>";
    var nubanksetembro = "<?php echo $controle_geral['mes']['bancoNubank'][9] ?>";
    var nubankoutubro = "<?php echo $controle_geral['mes']['bancoNubank'][10] ?>";
    var nubanknovembro = "<?php echo $controle_geral['mes']['bancoNubank'][11] ?>";
    var nubankdezembro = "<?php echo $controle_geral['mes']['bancoNubank'][12] ?>";

    var bancoBrasil = <?php echo $controle_geral['bancoBrasil'] ?>;
    var bancoItau = <?php echo $controle_geral['bancoItau'] ?>;
    var bancoNubank = <?php echo $controle_geral['bancoNubank'] ?>;

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
let optionsVisitorsProfile  = {
    series: [bancoBrasil, bancoItau, bancoNubank],
    labels: ['Banco do Brasil', 'Itaú', 'Nubank'],
    colors: ['#435ebe','#ED9F0E', '#9F44F9'],
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
}
var optionsEurope = {
    series: [{
        name: 'series1',
        data: [brasiljaneiro, brasilfevereiro, brasilmarco, brasilabril, brasilmaio, brasiljunho, brasiljulho, brasilagosto,brasilsetembro, brasiloutubro, brasilnovembro, brasildezembro]
    }],
    chart: {
        height: 80,
        type: 'area',
        toolbar: {
            show:false,
        },
    },
    colors: ['#435ebe'],
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

let optionsAmerica = {
    series: [{
        name: 'series1',
        data: [itaujaneiro, itaufevereiro, itaumarco, itauabril, itaumaio, itaujunho, itaujulho, itauagosto,itausetembro, itauoutubro, itaunovembro, itaudezembro]
    }],
    chart: {
        height: 80,
        type: 'area',
        toolbar: {
            show:false,
        },
    },
    colors: ['#ED9F0E'],
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
}
let optionsIndonesia = {
    series: [{
        name: 'series1',
        data: [nubankjaneiro, nubankfevereiro, nubankmarco, nubankabril, nubankmaio, nubankjunho, nubankjulho, nubankagosto,nubanksetembro, nubankoutubro, nubanknovembro, nubankdezembro]
    }],
    chart: {
        height: 80,
        type: 'area',
        toolbar: {
            show:false,
        },
    },
    colors: ['#9F44F9'],
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
}

var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
var chartEurope = new ApexCharts(document.querySelector("#chart-europe"), optionsEurope);
var chartAmerica = new ApexCharts(document.querySelector("#chart-america"), optionsAmerica);
var chartIndonesia = new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia);

chartIndonesia.render();
chartAmerica.render();
chartEurope.render();
chartProfileVisit.render();
chartVisitorsProfile.render();
</script>