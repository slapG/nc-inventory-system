<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceForm $serviceForm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Service Form'), ['action' => 'edit', $serviceForm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Service Form'), ['action' => 'delete', $serviceForm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $serviceForm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Service Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Service Form'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="serviceForms view content">
            <h3><?= h($serviceForm->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Photo') ?></th>
                    <td><?= h($serviceForm->photo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $serviceForm->has('status') ? $this->Html->link($serviceForm->status->status, ['controller' => 'Statuses', 'action' => 'view', $serviceForm->status->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($serviceForm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($serviceForm->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Pos') ?></th>
                    <td><?= $this->Number->format($serviceForm->user_pos) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Dept') ?></th>
                    <td><?= $this->Number->format($serviceForm->user_dept) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Endorsed') ?></th>
                    <td><?= $serviceForm->user_endorsed === null ? '' : $this->Number->format($serviceForm->user_endorsed) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Enpos') ?></th>
                    <td><?= $serviceForm->user_enpos === null ? '' : $this->Number->format($serviceForm->user_enpos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($serviceForm->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($serviceForm->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($serviceForm->description)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Is Active') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($serviceForm->is_active)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Repair Forms') ?></h4>
                <?php if (!empty($serviceForm->repair_forms)) : ?>
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
                        <?php foreach ($serviceForm->repair_forms as $repairForms) : ?>
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
        </div>
    </div>
</div>
