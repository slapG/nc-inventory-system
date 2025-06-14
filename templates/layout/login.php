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

$cakeDescription = 'NC INVENTORY SYSTEM';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        '/dist/css/adminlte.min.css',
        '/plugins/fontawesome-free/css/all.min.css',
        '/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
        '/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        '/plugins/sweetalert2/sweetalert2.min.css',
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>


<body class="hold-transition layout-top-nav">
    <main class="main">
        <?= $this->element('login/navbar')?>            
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>

    <?= $this->Html->script([
        '/plugins/jquery/jquery.min.js',
        '/plugins/bootstrap/js/bootstrap.bundle.min.js',
        '/dist/js/adminlte.min.js',
        '/plugins/sweetalert2/sweetalert2.min.js',
    ])?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/sweetalert2@11') ?>

        <?= $this->fetch('script') ?>

</body>
</html>