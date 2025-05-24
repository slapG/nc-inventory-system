<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Item> $items
 */
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>List of all Items</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href ="<?= $this->Url->build(['prefix' => 'Admin', 'controller' => 'Items', 'action' => 'add']) ?>" class="btn btn-outline-primary float-sm-right">Add User</a>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <div class="card-body">
                        <table id="itemsTable" class="table table-bordered table-hover table-responsive" style="width: 100%; height: 350px; white-space: nowrap;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Purchase Date</th>
                                    <th>Count</th>
                                    <th>Is Active</th>
                                    <th>Added By</th>
                                    <th>Created</th>    
                                    <th>Modified</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
