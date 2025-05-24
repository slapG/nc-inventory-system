<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceForm $serviceForm
 */
?>
<div class="modal fade" id="serviceFormViewModal" tabindex="-1" role="dialog" aria-labelledby="serviceFormViewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="serviceFormViewModalLabel">Service Form ID: <?= h($serviceForm->id) ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-info mb-0">
          <div class="card-body table-responsive p-0">
            <table class="table table-hover table-sm">
              <tbody>
                <tr><th><?= __('Name') ?></th>
                  <td><?= $serviceForm->has('user') ? $serviceForm->user->firstname . ' ' .$serviceForm->user->middlename . ' ' . $serviceForm->user->lastname : '-' ?></td>
                </tr>
                <tr><th><?= __('Position') ?></th>
                  <td><?= $serviceForm->has('user') && $serviceForm->user->has('position') ? $serviceForm->user->position->position_name  : '-' ?></td>
                </tr>
                <tr><th><?= __('Department') ?></th>
                  <td><?= $serviceForm->has('user') && $serviceForm->user->has('department') ? $serviceForm->user->department->department_name : '-' ?></td>
                </tr>
                <tr><th><?= __('Photo') ?></th><td><?= h($serviceForm->photo) ?></td></tr>
                <tr><th><?= __('Description') ?></th><td><?= h($serviceForm->description) ?></td></tr>
                <tr><th><?= __('Endorsed By') ?></th>
                  <td><?= $serviceForm->has('endorsed_user') ? $serviceForm->endorsed_user->email : '-' ?></td>
                </tr>
                <tr><th><?= __('Position') ?></th>
                  <td><?= $serviceForm->has('endorsed_user') && $serviceForm->endorsed_user->has('position') ? $serviceForm->endorsed_user->position->position_name  : '-' ?></td>
                </tr>
                <tr><th><?= __('Status') ?></th>
                  <td><?= $serviceForm->has('status') ? $serviceForm->status->status : '-' ?></td>
                </tr>
                <tr><th><?= __('Is Active') ?></th><td><?= $serviceForm->is_active ? 'Active' : 'Inactive' ?></td></tr>
                <tr><th><?= __('Created') ?></th><td><?= h($serviceForm->created) ?></td></tr>
                <tr><th><?= __('Modified') ?></th><td><?= h($serviceForm->modified) ?></td></tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer bg-white">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="approveServiceFormBtn" data-id="<?= h($serviceForm->id) ?>">Approve</button>
        <button type="button" class="btn btn-danger" id="rejectServiceFormBtn" data-id="<?= h($serviceForm->id) ?>">Reject</button>
      </div>
    </div>
  </div>
</div>