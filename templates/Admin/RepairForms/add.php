<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairForm $repairForm
 * @var \Cake\Collection\CollectionInterface|string[] $items
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Repair Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="repairForms form content">
            <?= $this->Form->create($repairForm) ?>
            <fieldset>
                <legend><?= __('Add Repair Form') ?></legend>
                <?php
                    echo $this->Form->control('control_no');
                    echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
                    echo $this->Form->control('service_form_id', ['options' => $serviceForms]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('department_id', ['options' => $departments]);
                    echo $this->Form->control('findings');
                    echo $this->Form->control('recommendation');
                    echo $this->Form->control('action_taken');
                    echo $this->Form->control('requested_by', ['options' => $users]);
                    echo $this->Form->control('inspected_by', ['options' => $users]);
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
