<!-- Place this somewhere in your HTML -->
<div class="modal fade" id="editServiceFormModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Service Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
        <div id="editServiceFormContent">Loading...</div>
      </div>
    </div>
  </div>
</div>