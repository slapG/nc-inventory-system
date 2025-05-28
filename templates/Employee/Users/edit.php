<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $positions
 */
?>
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-user-edit mr-2"></i>Edit User</h4>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($user, ['class' => 'row g-3']) ?>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('firstname', ['type' => 'text','class' => 'form-control', 'type' => 'text','label' => 'First Name']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('middlename', ['type' => 'text','class' => 'form-control', 'label' => 'Middle Name']) ?>
                        </div>
                        <div class="col-md-4 mb-3">
                            <?= $this->Form->control('lastname', ['type' => 'text','class' => 'form-control', 'label' => 'Last Name']) ?>
                        </div>

                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('pagibig_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('philhealth_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('sss_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('tin_number', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('birthdate', ['type' => 'text','class' => 'form-control', 'empty' => true]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('cpe_name', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('cpe_address', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('cpe_contact', ['type' => 'text','class' => 'form-control']) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('department_id', [
                                'options' => $departments,
                                'type' => 'text','class' => 'form-control',
                                'label' => 'Department'
                            ]) ?>
                        </div>
                        <div class="col-md-6 mb-3">
                            <?= $this->Form->control('position_id', [
                                'options' => $positions,
                                'type' => 'text','class' => 'form-control',
                                'label' => 'Position'
                            ]) ?>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="row">
                                <div class="col">
                                    <?= $this->Form->control('is_active', ['label' => 'Active', 'class' => 'form-check-input']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('is_admin', ['label' => 'Admin', 'class' => 'form-check-input']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('is_staff', ['label' => 'Staff', 'class' => 'form-check-input']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('is_employee', ['label' => 'Employee', 'class' => 'form-check-input']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('is_tech', ['label' => 'Tech', 'class' => 'form-check-input']) ?>
                                </div>
                                <div class="col">
                                    <?= $this->Form->control('is_teacher', ['label' => 'Teacher', 'class' => 'form-check-input']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <?= $this->Html->link('<i class="fas fa-arrow-left"></i> Back', ['action' => 'index'], ['class' => 'btn btn-secondary', 'escape' => false]) ?>
                        <?= $this->Form->button('<i class="fas fa-save"></i> Save', ['class' => 'btn btn-primary', 'escapeTitle' => false]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>