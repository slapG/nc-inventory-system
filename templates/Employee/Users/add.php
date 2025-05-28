<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 * @var \Cake\Collection\CollectionInterface|string[] $positions
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('middlename');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('id_number');
                    echo $this->Form->control('password');
                    echo $this->Form->control('pagibig_number');
                    echo $this->Form->control('philhealth_number');
                    echo $this->Form->control('sss_number');
                    echo $this->Form->control('tin_number');
                    echo $this->Form->control('birthdate', ['empty' => true]);
                    echo $this->Form->control('cpe_name');
                    echo $this->Form->control('cpe_address');
                    echo $this->Form->control('cpe_contact');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('is_admin');
                    echo $this->Form->control('is_staff');
                    echo $this->Form->control('is_employee');
                    echo $this->Form->control('is_tech');
                    echo $this->Form->control('is_teacher');
                    echo $this->Form->control('department_id', ['options' => $departments]);
                    echo $this->Form->control('position_id', ['options' => $positions]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
