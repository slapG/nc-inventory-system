                    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="addUserModalLabel"><i class="fas fa-user-plus mr-2"></i>Add User</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $this->Form->create($user, ['url' => ['action' => 'add'], 'id' => 'addUserForm']) ?>
        <div class="row">
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('firstname', [
                    'required' => false,
                    'label' => false,
                    'hidden' => true
                    ]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('lastname', [
                    'required' => false,
                    'label' => false,
                    'hidden' => true
                    ]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('id_number', [
                    'class' => 'form-control',
                    'label' => 'ID Number',
                    'type' => 'number',
                    ]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('password', ['class' => 'form-control']) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('department_id', [
                    'options' => $departments,
                    'class' => 'form-control',
                    'label' => 'Department'
                ]) ?>
            </div>
            <div class="col-md-6 mb-3">
                <?= $this->Form->control('position_id', [
                    'options' => $positions,
                    'class' => 'form-control',
                    'label' => 'Postion'
                ]) ?>
            </div>
            <!-- Add your boolean checkboxes here as in your add.php -->
                <div class="form-group col-12 mb-3">
            <label class="mb-2"><strong>User Role</strong></label>
            <div class="d-flex flex-wrap">
              <?php
              $roles = [
                'is_admin' => 'Admin',
                'is_staff' => 'Staff',
                'is_employee' => 'Employee',
                'is_teacher' => 'Teacher',
                'is_tech' => 'Tech Support'
              ];
              foreach ($roles as $value => $label) : ?>
                <div class="form-check mr-4 mb-2">
                  <?= $this->Form->radio('user_role', [
                    ['value' => $value, 'text' => $label, 'class' => 'form-check-input']
                  ], [
                    'label' => ['class' => 'form-check-label'],
                    'hiddenField' => false
                  ]) ?>
                </div>
              <?php endforeach; ?>
            </div>
    
                    <!-- Repeat for other boolean fields -->

            </div>
            <div class="col">
                <div class="form-check">
                    <?= $this->Form->hidden('is_active', ['value' => 1]) ?>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                <i class="fas fa-times"></i> Cancel
            </button>
            <?= $this->Form->button('<i class="fas fa-save"></i> Submit', ['class' => 'btn btn-primary', 'escapeTitle' => false]) ?>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>
</div>               