<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users view content">
            <h3><?= h($user->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($user->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($user->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Firstname') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->firstname)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Middlename') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->middlename)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Lastname') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->lastname)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Email') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->email)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Active') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_active)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Admin') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_admin)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Staff') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_staff)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Employee') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_employee)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Teacher') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_teacher)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Items') ?></h4>
                <?php if (!empty($user->items)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Item Name') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Quantity') ?></th>
                            <th><?= __('Purchase Date') ?></th>
                            <th><?= __('Count') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->items as $items) : ?>
                        <tr>
                            <td><?= h($items->id) ?></td>
                            <td><?= h($items->item_name) ?></td>
                            <td><?= h($items->code) ?></td>
                            <td><?= h($items->quantity) ?></td>
                            <td><?= h($items->purchase_date) ?></td>
                            <td><?= h($items->count) ?></td>
                            <td><?= h($items->is_active) ?></td>
                            <td><?= h($items->created) ?></td>
                            <td><?= h($items->modified) ?></td>
                            <td><?= h($items->user_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
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
