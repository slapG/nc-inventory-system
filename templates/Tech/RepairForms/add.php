<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairForm $repairForm
 * @var \Cake\Collection\CollectionInterface|string[] $serviceForms
 * @var \Cake\Collection\CollectionInterface|string[] $items
 * @var \Cake\Collection\CollectionInterface|string[] $departments
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 */
?>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>BREAKDOWN/REPAIR REPORT</h1>
            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div>
</section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-default accent-blue">
              <div class="card-header">
                <h3 class="card-title">Fill up</h3>
              </div>

                <?= $this->Form->create($repairForm) ?>
                    <div class="card-body">
                        <div class="col-md-12">
    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Form->control('control_no', [
                                    'type' => 'text',
                                    'class' => 'form-control',
                                    'id' => 'control_no',
                                    'label' => 'Control No.',
                                    ]); ?>
                            </div>
                
                            <div class="col-md-6">
                            <?= $this->Form->control('description', [
                                'class' => 'form-control',
                                'id' => 'description',
                                'label' => 'Description',
                                'type' => 'text',
                                ]); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?= $this->Form->control('findings', [
                                    'class' => 'form-control',
                                    'id' => 'findings',
                                    'label' => 'findings',
                                    ]); ?>
                            </div>
                
                            <div class="col-md-6">
                            <?= $this->Form->control('recommendation', [
                                'class' => 'form-control',
                                'id' => 'recommendation',
                                'label' => 'recommendation',
                                ]); ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <?= $this->Form->control('action_taken', [
                                    'id' => 'action_taken',
                                    'class' => 'form-control',
                                    'label' => 'Action Taken',
                                    ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('requested_by', [
                            'value' => $serviceForm->user_id,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('user_dept', [
                            'value' => $serviceForm->user_dept,
                            'hidden' => true,
                            'label' => false,
                            ]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('inspected_by', [
                            'value' => $auth['id'],
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('service_form_id', [
                            'value' => $id,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('status_id', [
                            'options' => $statuses,
                            'value' => 5,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('is_active', [
                            'value' => 1,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                  <a href="<?= $this->Url->build(['prefix' => 'Employee', 'controller' => 'ServiceForms', 'action' => 'index']) ?>" class="btn btn-default float-right">Cancel</a>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>        
</section>