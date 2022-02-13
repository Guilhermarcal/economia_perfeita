<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <?= $this->Html->css('/assets/css/bootstrap.css') ?>
    <?= $this->Html->css('/assets/vendors/iconly/bold.css') ?>
    <?= $this->Html->css('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>
    <?= $this->Html->css('/assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>
    <?= $this->Html->css('/assets/css/app.css') ?>
    <?= $this->Html->css('/assets/css/bootstrap.css') ?>

    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">


    <style type="text/css">
        .sidebar-wrapper .sidebar-header img {
            height: 5.2rem;
        }
    </style>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="index">
                            <?php echo $this->Html->image('/assets/images/logo/logo.png', [
                                "alt" => "user",
                            ]); ?>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <!-- REDIRECT PARA O MENU  -->

                    <li class="sidebar-item active">
                        <?= $this->Html->link(
                            '<span class="sidebar-link"><i class="bi bi-grid-fill"></i><span>' . h('Painel') . '</span>', 
                            ['controller' => 'Controle', 'action' => 'menu', '_full' => true],
                            [
                                'escape' => false
                            ]
                        ) ?>
                    </li>

                    <!-- REDIRECT PARA O BANCO  -->

                    <!-- <li class="sidebar-item active">
                        <?= $this->Html->link(
                            '<span class="sidebar-link"><i class="bi bi-wallet2"></i><span>' . h('Bancos') . '</span>', 
                            ['controller' => 'Bancos', 'action' => 'index', '_full' => true],
                            [
                                'escape' => false
                            ]
                        ) ?>
                    </li> -->

                    <li class="sidebar-item  has-sub">
                        <?= $this->Html->link(
                            '<span class="sidebar-link"><i class="bi bi-wallet2"></i><span>' . h('Bancos') . '</span>', 
                            'javascript:void(0)',
                            [
                                'escape' => false
                            ]
                        ) ?>
                        <ul class="submenu">
                            <li class="submenu-item">
                                <?= $this->Html->link(
                                    '<span class="sidebar-link"><span>' . h('Listar Bancos') . '</span>', 
                                    ['controller' => 'Bancos', 'action' => 'index', '_full' => true],
                                    [
                                        'escape' => false
                                    ]
                                ) ?>
                            </li>
                            <li class="submenu-item">
                                <?= $this->Html->link(
                                    '<span class="sidebar-link"><span>' . h('Ações') . '</span>', 
                                    ['controller' => 'Controle', 'action' => 'add', '_full' => true],
                                    [
                                        'escape' => false
                                    ]
                                ) ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
</div>
<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>
<footer>
</footer>
</body>
</html>
