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
                    <td><?= $item->has('user') ? $this->Html->link($item->user->email, ['controller' => 'Users', 'action' => 'view', $item->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Added') ?></th>
                    <td><?= $item->user_added === null ? '' : $this->Number->format($item->user_added) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Modified') ?></th>
                    <td><?= $item->user_modified === null ? '' : $this->Number->format($item->user_modified) ?></td>
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
            <div class="related">
                <h4><?= __('Related Repair Forms') ?></h4>
                <?php if (!empty($item->repair_forms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Control No') ?></th>
                            <th><?= __('Service Form Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Dept') ?></th>
                            <th><?= __('Findings') ?></th>
                            <th><?= __('Recommendation') ?></th>
                            <th><?= __('Action Taken') ?></th>
                            <th><?= __('Requested By') ?></th>
                            <th><?= __('Inspected By') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modif Ied') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($item->repair_forms as $repairForms) : ?>
                        <tr>
                            <td><?= h($repairForms->id) ?></td>
                            <td><?= h($repairForms->control_no) ?></td>
                            <td><?= h($repairForms->service_form_id) ?></td>
                            <td><?= h($repairForms->item_id) ?></td>
                            <td><?= h($repairForms->description) ?></td>
                            <td><?= h($repairForms->user_dept) ?></td>
                            <td><?= h($repairForms->findings) ?></td>
                            <td><?= h($repairForms->recommendation) ?></td>
                            <td><?= h($repairForms->action_taken) ?></td>
                            <td><?= h($repairForms->requested_by) ?></td>
                            <td><?= h($repairForms->inspected_by) ?></td>
                            <td><?= h($repairForms->is_active) ?></td>
                            <td><?= h($repairForms->status_id) ?></td>
                            <td><?= h($repairForms->created) ?></td>
                            <td><?= h($repairForms->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'RepairForms', 'action' => 'view', $repairForms->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'RepairForms', 'action' => 'edit', $repairForms->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'RepairForms', 'action' => 'delete', $repairForms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $repairForms->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
