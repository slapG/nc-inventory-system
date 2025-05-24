<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Department'), ['action' => 'edit', $department->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Department'), ['action' => 'delete', $department->id], ['confirm' => __('Are you sure you want to delete # {0}?', $department->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Departments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Department'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departments view content">
            <h3><?= h($department->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($department->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($department->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($department->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Department Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($department->department_name)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Repair Forms') ?></h4>
                <?php if (!empty($department->repair_forms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Control No') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Findings') ?></th>
                            <th><?= __('Recommendation') ?></th>
                            <th><?= __('Action Taken') ?></th>
                            <th><?= __('Requested By') ?></th>
                            <th><?= __('Inspected By') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($department->repair_forms as $repairForms) : ?>
                        <tr>
                            <td><?= h($repairForms->id) ?></td>
                            <td><?= h($repairForms->control_no) ?></td>
                            <td><?= h($repairForms->item_id) ?></td>
                            <td><?= h($repairForms->description) ?></td>
                            <td><?= h($repairForms->department_id) ?></td>
                            <td><?= h($repairForms->findings) ?></td>
                            <td><?= h($repairForms->recommendation) ?></td>
                            <td><?= h($repairForms->action_taken) ?></td>
                            <td><?= h($repairForms->requested_by) ?></td>
                            <td><?= h($repairForms->inspected_by) ?></td>
                            <td><?= h($repairForms->is_active) ?></td>
                            <td><?= h($repairForms->status) ?></td>
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
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($department->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Firstname') ?></th>
                            <th><?= __('Middlename') ?></th>
                            <th><?= __('Lastname') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Password') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Is Admin') ?></th>
                            <th><?= __('Is Staff') ?></th>
                            <th><?= __('Is Employee') ?></th>
                            <th><?= __('Is Teacher') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($department->users as $users) : ?>
                        <tr>
                            <td><?= h($users->id) ?></td>
                            <td><?= h($users->firstname) ?></td>
                            <td><?= h($users->middlename) ?></td>
                            <td><?= h($users->lastname) ?></td>
                            <td><?= h($users->email) ?></td>
                            <td><?= h($users->password) ?></td>
                            <td><?= h($users->is_active) ?></td>
                            <td><?= h($users->is_admin) ?></td>
                            <td><?= h($users->is_staff) ?></td>
                            <td><?= h($users->is_employee) ?></td>
                            <td><?= h($users->is_teacher) ?></td>
                            <td><?= h($users->department_id) ?></td>
                            <td><?= h($users->created) ?></td>
                            <td><?= h($users->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
