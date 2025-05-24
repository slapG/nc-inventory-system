<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceForm $serviceForm
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 */
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
                </ol>
            </div>
        </div>
    </div>
</section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Service Form</h3>
              </div>

                <?= $this->Form->create($serviceForm) ?>
                    <div class="card-body">

                    <div class="form-group">
                        <?= $this->Form->control('user_id', [
                            'value' => $auth['id'],
                            'hidden' => true,
                            'label' => false
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
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>        
</section>