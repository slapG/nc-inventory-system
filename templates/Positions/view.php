<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Position $position
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Positions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Position'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="positions view content">
            <h3><?= h($position->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($position->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($position->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($position->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Position Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($position->position_name)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Service Forms') ?></h4>
                <?php if (!empty($position->service_forms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Position Id') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Endorsed By') ?></th>
                            <th><?= __('En Position Id') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($position->service_forms as $serviceForms) : ?>
                        <tr>
                            <td><?= h($serviceForms->id) ?></td>
                            <td><?= h($serviceForms->user_id) ?></td>
                            <td><?= h($serviceForms->position_id) ?></td>
                            <td><?= h($serviceForms->department_id) ?></td>
                            <td><?= h($serviceForms->photo) ?></td>
                            <td><?= h($serviceForms->description) ?></td>
                            <td><?= h($serviceForms->endorsed_by) ?></td>
                            <td><?= h($serviceForms->en_position_id) ?></td>
                            <td><?= h($serviceForms->status_id) ?></td>
                            <td><?= h($serviceForms->created) ?></td>
                            <td><?= h($serviceForms->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ServiceForms', 'action' => 'view', $serviceForms->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ServiceForms', 'action' => 'edit', $serviceForms->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ServiceForms', 'action' => 'delete', $serviceForms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceForms->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($position->users)) : ?>
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
                            <th><?= __('Position Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($position->users as $users) : ?>
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
                            <td><?= h($users->position_id) ?></td>
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
