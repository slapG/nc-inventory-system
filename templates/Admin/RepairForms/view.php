<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairForm $repairForm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Repair Form'), ['action' => 'edit', $repairForm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Repair Form'), ['action' => 'delete', $repairForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repairForm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Repair Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Repair Form'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="repairForms view content">
            <h3><?= h($repairForm->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $repairForm->has('item') ? $this->Html->link($repairForm->item->id, ['controller' => 'Items', 'action' => 'view', $repairForm->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $repairForm->has('department') ? $this->Html->link($repairForm->department->department_name, ['controller' => 'Departments', 'action' => 'view', $repairForm->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($repairForm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Requested By') ?></th>
                    <td><?= $this->Number->format($repairForm->requested_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Inspected By') ?></th>
                    <td><?= $this->Number->format($repairForm->inspected_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($repairForm->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($repairForm->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Control No') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->control_no)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Findings') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->findings)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Recommendation') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->recommendation)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Action Taken') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->action_taken)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Active') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->is_active)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Status') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($repairForm->status)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
