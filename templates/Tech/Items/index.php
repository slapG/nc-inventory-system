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
                <h1>List of all Service Forms</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href ="<?= $this->Url->build(['prefix' => 'Tech', 'controller' => 'items', 'action' => 'add']) ?>" class="btn btn-outline-primary float-sm-right">Service Request</a>
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
                    <div class="card-body">
                        <div class="table-responsive" style="white-space: nowrap;">
                            <table class="table table-bordered table-hover" id="itemsTable" style="width: 100%;">
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Purchase Date</th>
                                    <th>Acquire Date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>User</th>
                                    <th>User Added</th>
                                    <th>User Modified</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                    <th class="text-center">Actions</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php foreach ($items as $item): ?>
                                <tr>
                                    <td><?= $this->Number->format($item->id) ?></td>
                                    <td><?= h($item->item_name) ?></td>
                                    <td><?= h($item->code) ?></td>
                                    <td><?= $this->Number->format($item->quantity) ?></td>
                                    <td><?= h($item->purchase_date) ?></td>
                                    <td><?= h($item->acquire_date) ?></td>

                                    <td><?= $item->has('status') ? h($item->status->status) : '' ?></td>
                                    
                                    <td><?= h($item->type) ?></td>

                                    <td><?= $item->has('user') ? h($item->user->id_number) : '' ?></td>

                                    <td><?= $item->user_added === null ? '' : h($item->added_user->firstname.' '. $item->added_user->middlename.' '.$item->added_user->lastname.' | '.$item->added_user->id_number ) ?></td>
                                    <td><?= $item->user_modified === null ? '' : $this->Number->format($item->user_modified) ?></td>
                                    <td><?= h($item->created) ?></td>
                                    <td><?= h($item->modified) ?></td>
                                    <td class="text-center">
                                        <?= $this->Html->link('<i class="fas fa-eye"></i>', ['action' => 'view', $item->id], [
                                            'class' => 'btn btn-sm btn-outline-primary mr-1',
                                            'escape' => false,
                                            'title' => 'View'
                                        ]) ?>
                                        <?= $this->Html->link('<i class="fas fa-edit"></i>', ['action' => 'edit', $item->id], [
                                            'class' => 'btn btn-sm btn-outline-secondary mr-1',
                                            'escape' => false,
                                            'title' => 'Edit'
                                        ]) ?>
                                        <?= $this->Form->postLink('<i class="fas fa-trash"></i>', ['action' => 'delete', $item->id], [
                                            'class' => 'btn btn-sm btn-outline-danger',
                                            'escape' => false,
                                            'title' => 'Delete',
                                            'confirm' => __('Are you sure you want to delete # {0}?', $item->id)
                                        ]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $('#itemsTable').DataTable({
        "order": [], // No initial sorting
        "pageLength": 10,
        "lengthMenu": [10, 25, 50, 100],
        "responsive": true
    });
});
</script>