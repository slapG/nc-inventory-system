<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $positions
 */
?>
<div class="container py-5">
    <div class="row justify-content-left">
        <div class="col-lg-9">
            <div class="card shadow-sm" style="height: 450px;">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-user-edit mr-2"></i>Edit User Information</h4>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($user, ['class' => 'row g-3']) ?>
                    <div class="row ">
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('firstname', ['type' => 'text','class' => 'form-control', 'label' => 'First Name']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('middlename', ['type' => 'text','class' => 'form-control', 'label' => 'Middle Name']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('lastname', ['type' => 'text','class' => 'form-control', 'label' => 'Last Name']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('cpe_address', ['type' => 'text','class' => 'form-control', 'label' => 'Address']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('cpe_contact', ['type' => 'text','class' => 'form-control', 'label' => 'Contact Number']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('pagibig_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('philhealth_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('sss_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('tin_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('birthdate', ['type' => 'text','class' => 'form-control', 'empty' => true]) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('cpe_name', ['type' => 'text','class' => 'form-control']) ?>
                        </div>                        
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-lg-3">
            <div class="card shadow-sm" style="height: 450px;">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-user-edit mr-2"></i>Edit Role</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <?= $this->Form->control('department_id', [
                                'options' => $departments,
                                'label' => 'Department',
                                'class' => 'form-control'
                            ]) ?>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                            <?= $this->Form->control('position_id', [
                                'options' => $positions,
                                'label' => 'Position',
                                'class' => 'form-control'
                            ]) ?>
                        </div>
                    <div class="col-12 mb-3">
                            <label class="mb-2"><strong>User Role</strong></label>
                            <div class="row">
                                <div class="d-flex flex-wrap">
                                    <?php
                                    $roles = [
                                        'is_admin' => 'Admin',
                                        'is_staff' => 'Staff',
                                        'is_employee' => 'Employee',
                                        'is_teacher' => 'Teacher',
                                        'is_tech' => 'Tech Support'
                                    ];
                                    foreach ($roles as $value => $label) : ?>
                                        <div class="form-check mr-4 mb-2">
                                        <?= $this->Form->radio('user_role', [
                                            ['value' => $value, 'text' => $label, 'class' => 'form-check-input']
                                        ], [
                                            'label' => ['class' => 'form-check-label'],
                                            'hiddenField' => false
                                        ]) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mt-4">
                <div class="d-flex flex-wrap justify-content-end">
                    <?= $this->Html->link(
                        '<i class="fas fa-arrow-left"></i> Back',
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary btn-sm me-2 mr-2', 'escape' => false]
                    ) ?>
                    <?= $this->Form->button(
                        '<i class="fas fa-key"></i> Change Password',
                        ['class' => 'btn btn-warning btn-sm me-2 mr-2', 'escapeTitle' => false]
                    ) ?>
                    <?= $this->Form->button(
                        '<i class="fas fa-save"></i> Save',
                        ['class' => 'btn btn-primary btn-sm', 'escapeTitle' => false]
                    ) ?>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
