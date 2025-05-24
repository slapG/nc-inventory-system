<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairForm $repairForm
 * @var string[]|\Cake\Collection\CollectionInterface $items
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $repairForm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $repairForm->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Repair Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="repairForms form content">
            <?= $this->Form->create($repairForm) ?>
            <fieldset>
                <legend><?= __('Edit Repair Form') ?></legend>
                <?php
                    echo $this->Form->control('control_no');
                    echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('department_id', ['options' => $departments]);
                    echo $this->Form->control('findings');
                    echo $this->Form->control('recommendation');
                    echo $this->Form->control('action_taken');
                    echo $this->Form->control('requested_by');
                    echo $this->Form->control('inspected_by');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
