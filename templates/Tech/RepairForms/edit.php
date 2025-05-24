<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\RepairForm $repairForm
 * @var string[]|\Cake\Collection\CollectionInterface $serviceForms
 * @var string[]|\Cake\Collection\CollectionInterface $items
 * @var string[]|\Cake\Collection\CollectionInterface $departments
 * @var string[]|\Cake\Collection\CollectionInterface $statuses
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $repairForm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $repairForm->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Repair Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="repairForms form content">
            <?= $this->Form->create($repairForm) ?>
            <fieldset>
                <legend><?= __('Edit Repair Form') ?></legend>
                <?php
                    echo $this->Form->control('control_no');
                    echo $this->Form->control('service_form_id', ['options' => $serviceForms]);
                    echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
                    echo $this->Form->control('description');
                    echo $this->Form->control('user_dept');
                    echo $this->Form->control('findings');
                    echo $this->Form->control('recommendation');
                    echo $this->Form->control('action_taken');
                    echo $this->Form->control('requested_by');
                    echo $this->Form->control('inspected_by');
                    echo $this->Form->control('is_active');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Service Form</h1>
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
    
                    <div class="form-group">
                        <?= $this->Form->control('control_no', [
                            'class' => 'form-control',
                            'id' => 'control_no',
                            'label' => 'Control No.',
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('user_pos', [
                            'value' => $auth['id'],
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('user_dept', [
                            'value' => $auth['id'],
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('photo', [
                            'class' => 'form-control',
                            'id' => 'InputFile',
                            'label' => 'Photo',
                            'type' => 'file',
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('description', [
                            'class' => 'form-control',
                            'id' => 'description',
                            'label' => 'Description',
                            'type' => 'textarea',
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('user_endorsed', [
                            'value' => null,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('user_enpos', [
                            'value' => null,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('status_id', [
                            'value' => 1,
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>

                    <div class="form-group">
                        <?= $this->Form->control('is_active', [
                            'value' => "1",
                            'hidden' => true,
                            'label' => false
                            ]); ?>
                    </div>
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