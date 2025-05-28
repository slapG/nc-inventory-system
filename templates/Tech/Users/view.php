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
            <h3><?= h($user->email) ?></h3>
            <table>
                <tr>
                    <th><?= __('Department') ?></th>
                    <td><?= $user->has('department') ? $this->Html->link($user->department->department_name, ['controller' => 'Departments', 'action' => 'view', $user->department->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Position') ?></th>
                    <td><?= $user->has('position') ? $this->Html->link($user->position->position_name, ['controller' => 'Positions', 'action' => 'view', $user->position->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Number') ?></th>
                    <td><?= $this->Number->format($user->id_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birthdate') ?></th>
                    <td><?= h($user->birthdate) ?></td>
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
                <strong><?= __('Pagibig Number') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->pagibig_number)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Philhealth Number') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->philhealth_number)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Sss Number') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->sss_number)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Tin Number') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->tin_number)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Cpe Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->cpe_name)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Cpe Address') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->cpe_address)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Cpe Contact') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->cpe_contact)); ?>
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
                <strong><?= __('Is Tech') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_tech)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Teacher') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->is_teacher)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Feedback Forms') ?></h4>
                <?php if (!empty($user->feedback_forms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Pos') ?></th>
                            <th><?= __('User Dept') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Endorsed') ?></th>
                            <th><?= __('User Enpos') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('User Actioned') ?></th>
                            <th><?= __('Repair Form Id') ?></th>
                            <th><?= __('Service Form Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->feedback_forms as $feedbackForms) : ?>
                        <tr>
                            <td><?= h($feedbackForms->id) ?></td>
                            <td><?= h($feedbackForms->user_id) ?></td>
                            <td><?= h($feedbackForms->user_pos) ?></td>
                            <td><?= h($feedbackForms->user_dept) ?></td>
                            <td><?= h($feedbackForms->description) ?></td>
                            <td><?= h($feedbackForms->user_endorsed) ?></td>
                            <td><?= h($feedbackForms->user_enpos) ?></td>
                            <td><?= h($feedbackForms->status) ?></td>
                            <td><?= h($feedbackForms->is_active) ?></td>
                            <td><?= h($feedbackForms->user_actioned) ?></td>
                            <td><?= h($feedbackForms->repair_form_id) ?></td>
                            <td><?= h($feedbackForms->service_form_id) ?></td>
                            <td><?= h($feedbackForms->item_id) ?></td>
                            <td><?= h($feedbackForms->created) ?></td>
                            <td><?= h($feedbackForms->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FeedbackForms', 'action' => 'view', $feedbackForms->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FeedbackForms', 'action' => 'edit', $feedbackForms->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FeedbackForms', 'action' => 'delete', $feedbackForms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedbackForms->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
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
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Added') ?></th>
                            <th><?= __('User Modified') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
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
                            <td><?= h($items->user_id) ?></td>
                            <td><?= h($items->user_added) ?></td>
                            <td><?= h($items->user_modified) ?></td>
                            <td><?= h($items->created) ?></td>
                            <td><?= h($items->modified) ?></td>
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
            <div class="related">
                <h4><?= __('Related Service Forms') ?></h4>
                <?php if (!empty($user->service_forms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('User Pos') ?></th>
                            <th><?= __('User Dept') ?></th>
                            <th><?= __('Photo') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('User Endorsed') ?></th>
                            <th><?= __('User Enpos') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('User Actioned') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->service_forms as $serviceForms) : ?>
                        <tr>
                            <td><?= h($serviceForms->id) ?></td>
                            <td><?= h($serviceForms->user_id) ?></td>
                            <td><?= h($serviceForms->user_pos) ?></td>
                            <td><?= h($serviceForms->user_dept) ?></td>
                            <td><?= h($serviceForms->photo) ?></td>
                            <td><?= h($serviceForms->description) ?></td>
                            <td><?= h($serviceForms->user_endorsed) ?></td>
                            <td><?= h($serviceForms->user_enpos) ?></td>
                            <td><?= h($serviceForms->status_id) ?></td>
                            <td><?= h($serviceForms->is_active) ?></td>
                            <td><?= h($serviceForms->user_actioned) ?></td>
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
        </div>
    </div>
</div>
