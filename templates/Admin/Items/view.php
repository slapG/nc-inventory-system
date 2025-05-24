<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Items'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Item'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="items view content">
            <h3><?= h($item->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $item->has('user') ? $this->Html->link($item->user->id, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Purchase Date') ?></th>
                    <td><?= h($item->purchase_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($item->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($item->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Item Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($item->item_name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Code') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($item->code)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Quantity') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($item->quantity)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Count') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($item->count)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Active') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($item->is_active)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
