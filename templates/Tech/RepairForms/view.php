<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairForm $repairForm
 */
?>
<div class="modal fade" id="repairFormViewModal" tabindex="-1" role="dialog" aria-labelledby="repairFormViewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="repairFormViewModalLabel">Repair Form ID: <?= h($repairForm->id) ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="card card-info mb-0">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-sm">
              <tbody>
                <tr>
                  <th><?= __('Service Form') ?></th>
                  <td><?= $repairForm->has('service_form') ? $this->Html->link($repairForm->service_form->id, ['controller' => 'ServiceForms', 'action' => 'view', $repairForm->service_form->id]) : '-' ?></td>
                </tr>
                <tr>
                  <th><?= __('Item') ?></th>
                  <td><?= $repairForm->has('item') ? $this->Html->link($repairForm->item->id, ['controller' => 'Items', 'action' => 'view', $repairForm->item->id]) : '-' ?></td>
                </tr>
                <tr>
                  <th><?= __('Status') ?></th>
                  <td><?= $repairForm->has('status') ? $this->Html->link($repairForm->status->status, ['controller' => 'Statuses', 'action' => 'view', $repairForm->status->id]) : '-' ?></td>
                </tr>
                <tr><th><?= __('User Dept') ?></th><td><?= $this->Number->format($repairForm->user_dept) ?></td></tr>
                <tr><th><?= __('Requested By') ?></th><td><?= $this->Number->format($repairForm->requested_by) ?></td></tr>
                <tr><th><?= __('Inspected By') ?></th><td><?= $this->Number->format($repairForm->inspected_by) ?></td></tr>
                <tr><th><?= __('Created') ?></th><td><?= h($repairForm->created) ?></td></tr>
                <tr><th><?= __('Modified') ?></th><td><?= h($repairForm->modified) ?></td></tr>
              </tbody>
            </table>

            <hr>

            <div class="px-3 pb-2">
              <h6><?= __('Control No') ?></h6>
              <p><?= $this->Text->autoParagraph(h($repairForm->control_no)); ?></p>

              <h6><?= __('Description') ?></h6>
              <p><?= $this->Text->autoParagraph(h($repairForm->description)); ?></p>

              <h6><?= __('Findings') ?></h6>
              <p><?= $this->Text->autoParagraph(h($repairForm->findings)); ?></p>

              <h6><?= __('Recommendation') ?></h6>
              <p><?= $this->Text->autoParagraph(h($repairForm->recommendation)); ?></p>

              <h6><?= __('Action Taken') ?></h6>
              <p><?= $this->Text->autoParagraph(h($repairForm->action_taken)); ?></p>

              <h6><?= __('Is Active') ?></h6>
              <p><?= $repairForm->is_active ? 'Active' : 'Inactive' ?></p>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer bg-white">
        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $repairForm->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $repairForm->id], [
            'confirm' => __('Are you sure you want to delete # {0}?', $repairForm->id),
            'class' => 'btn btn-danger'
        ]) ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#repairFormViewModal">
          View Repair Form
        </button>
      </div>
    </div>
  </div>
</div>
