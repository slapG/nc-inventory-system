<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Status'), ['action' => 'edit', $status->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Status'), ['action' => 'delete', $status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $status->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Statuses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Status'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="statuses view content">
            <h3><?= h($status->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($status->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($status->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($status->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Status') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($status->status)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Repair Forms') ?></h4>
                <?php if (!empty($status->repair_forms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Control No') ?></th>
                            <th><?= __('Service Form Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Department Id') ?></th>
                            <th><?= __('Findings') ?></th>
                            <th><?= __('Recommendation') ?></th>
                            <th><?= __('Action Taken') ?></th>
                            <th><?= __('Requested By') ?></th>
                            <th><?= __('Inspected By') ?></th>
                            <th><?= __('Is Active') ?></th>
                            <th><?= __('Status Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($status->repair_forms as $repairForms) : ?>
                        <tr>
                            <td><?= h($repairForms->id) ?></td>
                            <td><?= h($repairForms->control_no) ?></td>
                            <td><?= h($repairForms->service_form_id) ?></td>
                            <td><?= h($repairForms->item_id) ?></td>
                            <td><?= h($repairForms->description) ?></td>
                            <td><?= h($repairForms->department_id) ?></td>
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
            <div class="related">
                <h4><?= __('Related Service Forms') ?></h4>
                <?php if (!empty($status->service_forms)) : ?>
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
                        <?php foreach ($status->service_forms as $serviceForms) : ?>
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
        </div>
    </div>
</div>
