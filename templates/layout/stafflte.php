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
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

    <?= $this->Html->css([
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        '/dist/css/adminlte.min.css',
        '/plugins/fontawesome-free/css/all.min.css',
        '/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
        '/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
        ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?= $this->element('staff/navbar') ?>
        <?= $this->element('staff/sidebar') ?>
        <div class="content-wrapper">
            <?= $this->fetch('content') ?>
        </div>
        <?= $this->element('staff/footer') ?>
    </div>
    <?= $this->Html->script([
    '/plugins/jquery/jquery.min.js',
    'staff/service-forms.js',
    'staff/history-service-forms.js',
    '/plugins/bootstrap/js/bootstrap.bundle.min.js',
    '/dist/js/adminlte.min.js',
    '/plugins/datatables/jquery.dataTables.min.js',
    '/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    '/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    '/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    
    ],['defer' => true])?>
    <?= $this->fetch('script') ?>
</body>
</html>
