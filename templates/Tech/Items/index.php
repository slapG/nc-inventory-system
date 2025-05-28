<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Item> $items
 */
?>
<div class="items index content">
    <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Items') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('purchase_date') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('user_added') ?></th>
                    <th><?= $this->Paginator->sort('user_modified') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= $this->Number->format($item->id) ?></td>
                    <td><?= h($item->purchase_date) ?></td>
                    <td><?= $item->has('user') ? $this->Html->link($item->user->email, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
                    <td><?= $item->user_added === null ? '' : $this->Number->format($item->user_added) ?></td>
                    <td><?= $item->user_modified === null ? '' : $this->Number->format($item->user_modified) ?></td>
                    <td><?= h($item->created) ?></td>
                    <td><?= h($item->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
