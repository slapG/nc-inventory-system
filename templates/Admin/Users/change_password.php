<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="fas fa-key mr-2"></i>Change Password</h4>
                </div>
                <div class="card-body">
                    <?= $this->Form->create($user) ?>
                    <div class="form-group">
                        <?= $this->Form->control('password', [
                            'type' => 'password',
                            'class' => 'form-control',
                            'label' => 'New Password',
                            'value' => ''
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->button('<i class="fas fa-save"></i> Change Password', [
                            'class' => 'btn btn-primary',
                            'escapeTitle' => false
                        ]) ?>
                        <?= $this->Html->link('<i class="fas fa-arrow-left"></i> Back', ['action' => 'index'], [
                            'class' => 'btn btn-secondary ml-2',
                            'escape' => false
                        ]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>