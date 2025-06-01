<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="card py-4">
<div class="container-fluid py-4">
    <div class="row">
        <!-- Details Card -->
        <div class="col-lg-3 mb-4">
            <div class="card shadow">
                <div class="card-header text-black">
                    <h5 class="mb-0"><strong>User Details</strong></h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mb-0" style="height: 500px;">
                        <tr>
                            <th>Full Name</th>
                            <td><?= h($user->firstname. ' '. $user->middlename. ' '. $user->lastname) ?></td>
                        <tr>
                            <th>ID Number</th>
                            <td><?= h($user->id_number) ?></td>
                        </tr>
                        <tr>
                            <th>Position</th>
                            <td><?= $user->has('position') ? h($user->position->position_name) : 'No Position' ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?= $user->has('department') ? h($user->department->department_name) : 'No Department' ?></td>
                        <tr>
                            <th>Birthdate</th>
                            <td><?= h($user->birthdate) ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?= h($user->cpe_address) ?></td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td><?= h($user->cpe_contact) ?></td>
                        </tr>   
                            <th>Created</th>
                            <td><?= h($user->created) ?></td>
                        </tr>
                        <tr>
                            <th>Modified</th>
                            <td><?= h($user->modified) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-9 mb-4">
            <div class="card shadow">
                <div class="card-header  text-black">
                    <h5 class="mb-0"><strong>Equipments</strong></h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($user->items)) : ?>
                        <div class="table-responsive" style="height: 500px;">
                            <table class="table table-bordered table-hover table-sm mb-0" style="width: 100%; max-height: 500px; white-space: nowrap;">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Code</th>
                                        <th>Quantity</th>
                                        <th>Purchase Date</th>
                                        <th>Acquired Date</th>
                                        <th>Type</th>
                                        <th>Count</th>
                                        <th>Is Active</th>
                                        <th>User Added</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user->items as $items) : ?>
                                    <tr>
                                        <td><?= h($items->item_name) ?></td>
                                        <td><?= h($items->code) ?></td>
                                        <td><?= h($items->quantity) ?></td>
                                        <td><?= h($items->purchase_date) ?></td>
                                        <td><?= h($items->acquire_date) ?></td>
                                        <td><?= h($items->type) ?></td>
                                        <td><?= h($items->count) ?></td>
                                        <td><?= $items->is_active ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-secondary">No</span>' ?></td>
                                        <td><?= h($items->user_added) ?></td>
                                        <td><?= h($items->created) ?></td>
                                        <td><?= h($items->modified) ?></td>
                                        <td>
                                            <?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Items', 'action' => 'view', $items->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary']) ?>
                                            <?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'Items', 'action' => 'edit', $items->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-secondary']) ?>
                                            <?= $this->Form->postLink('<i class="fas fa-trash"></i>', ['controller' => 'Items', 'action' => 'delete', $items->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-3 text-muted">No items found.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Tables -->
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-black">
                    <h5 class="mb-0">Related Feedback Forms</h5>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($user->feedback_forms)) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>User Pos</th>
                                        <th>User Dept</th>
                                        <th>Description</th>
                                        <th>User Endorsed</th>
                                        <th>User Enpos</th>
                                        <th>Status</th>
                                        <th>Is Active</th>
                                        <th>User Actioned</th>
                                        <th>Repair Form ID</th>
                                        <th>Service Form ID</th>
                                        <th>Item ID</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user->feedback_forms as $feedbackForms) : ?>
                                    <tr>
                                        <td><?= h($feedbackForms->id) ?></td>
                                        <td><?= h($feedbackForms->user_id) ?></td>
                                        <td><?= h($feedbackForms->user_pos) ?></td>
                                        <td><?= h($feedbackForms->user_dept) ?></td>
                                        <td><?= h($feedbackForms->description) ?></td>
                                        <td><?= h($feedbackForms->user_endorsed) ?></td>
                                        <td><?= h($feedbackForms->user_enpos) ?></td>
                                        <td><?= h($feedbackForms->status) ?></td>
                                        <td><?= $feedbackForms->is_active ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-secondary">No</span>' ?></td>
                                        <td><?= h($feedbackForms->user_actioned) ?></td>
                                        <td><?= h($feedbackForms->repair_form_id) ?></td>
                                        <td><?= h($feedbackForms->service_form_id) ?></td>
                                        <td><?= h($feedbackForms->item_id) ?></td>
                                        <td><?= h($feedbackForms->created) ?></td>
                                        <td><?= h($feedbackForms->modified) ?></td>
                                        <td>
                                            <?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'FeedbackForms', 'action' => 'view', $feedbackForms->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary']) ?>
                                            <?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'FeedbackForms', 'action' => 'edit', $feedbackForms->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-secondary']) ?>
                                            <?= $this->Form->postLink('<i class="fas fa-trash"></i>', ['controller' => 'FeedbackForms', 'action' => 'delete', $feedbackForms->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $feedbackForms->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-3 text-muted">No feedback forms found.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Related Service Forms</h5>
                </div>
                <div class="card-body p-0">
                    <?php if (!empty($user->service_forms)) : ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>User ID</th>
                                        <th>User Pos</th>
                                        <th>User Dept</th>
                                        <th>Photo</th>
                                        <th>Description</th>
                                        <th>User Endorsed</th>
                                        <th>User Enpos</th>
                                        <th>Status ID</th>
                                        <th>Is Active</th>
                                        <th>User Actioned</th>
                                        <th>Created</th>
                                        <th>Modified</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user->service_forms as $serviceForms) : ?>
                                    <tr>
                                        <td><?= h($serviceForms->id) ?></td>
                                        <td><?= h($serviceForms->user_id) ?></td>
                                        <td><?= h($serviceForms->user_pos) ?></td>
                                        <td><?= h($serviceForms->user_dept) ?></td>
                                        <td>
                                            <?php if ($serviceForms->photo): ?>
                                                <img src="/nc-inventory-system/<?= h($serviceForms->photo) ?>" alt="Photo" style="max-width: 60px; max-height: 60px;">
                                            <?php endif; ?>
                                        </td>
                                        <td><?= h($serviceForms->description) ?></td>
                                        <td><?= h($serviceForms->user_endorsed) ?></td>
                                        <td><?= h($serviceForms->user_enpos) ?></td>
                                        <td><?= h($serviceForms->status_id) ?></td>
                                        <td><?= $serviceForms->is_active ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-secondary">No</span>' ?></td>
                                        <td><?= h($serviceForms->user_actioned) ?></td>
                                        <td><?= h($serviceForms->created) ?></td>
                                        <td><?= h($serviceForms->modified) ?></td>
                                        <td>
                                            <?= $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'ServiceForms', 'action' => 'view', $serviceForms->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary']) ?>
                                            <?= $this->Html->link('<i class="fas fa-edit"></i>', ['controller' => 'ServiceForms', 'action' => 'edit', $serviceForms->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-secondary']) ?>
                                            <?= $this->Form->postLink('<i class="fas fa-trash"></i>', ['controller' => 'ServiceForms', 'action' => 'delete', $serviceForms->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $serviceForms->id)]) ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="p-3 text-muted">No service forms found.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>