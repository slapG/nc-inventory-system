<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\RepairForm> $repairForms
 */
?>
<div class="repairForms index content">
    <?= $this->Html->link(__('New Repair Form'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Repair Forms') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('service_form_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('user_dept') ?></th>
                    <th><?= $this->Paginator->sort('requested_by') ?></th>
                    <th><?= $this->Paginator->sort('inspected_by') ?></th>
                    <th><?= $this->Paginator->sort('status_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($repairForms as $repairForm): ?>
                <tr>
                    <td><?= $this->Number->format($repairForm->id) ?></td>
                    <td><?= $repairForm->has('service_form') ? $this->Html->link($repairForm->service_form->id, ['controller' => 'ServiceForms', 'action' => 'view', $repairForm->service_form->id]) : '' ?></td>
                    <td><?= $repairForm->has('item') ? $this->Html->link($repairForm->item->id, ['controller' => 'Items', 'action' => 'view', $repairForm->item->id]) : '' ?></td>
                    <td><?= $this->Number->format($repairForm->user_dept) ?></td>
                    <td><?= $this->Number->format($repairForm->requested_by) ?></td>
                    <td><?= $this->Number->format($repairForm->inspected_by) ?></td>
                    <td><?= $repairForm->has('status') ? $this->Html->link($repairForm->status->status, ['controller' => 'Statuses', 'action' => 'view', $repairForm->status->id]) : '' ?></td>
                    <td><?= h($repairForm->created) ?></td>
                    <td><?= h($repairForm->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $repairForm->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $repairForm->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $repairForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repairForm->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
