<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $statuses
 */
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Item For Pending</h1>
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

                <?= $this->Form->create($item) ?>
                    <div class="card-body">

                    <div class="form-group">
                        <div class="row mt-5">
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('item_name', [
                                    'class' => 'form-control',
                                    'id' => 'item_name',
                                    'label' => 'Item Name',
                                    'type' => 'text',
                                ]); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $this->Form->control('code', [
                                    'class' => 'form-control',
                                    'id' => 'code',
                                    'label' => 'Code',
                                    'type' => 'text',
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('quantity', [
                                    'class' => 'form-control',
                                    'id' => 'quantity',
                                    'label' => 'quantity',
                                    'type' => 'text',
                                ]); ?>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('type', [
                                    'class' => 'form-control',
                                    'id' => 'type',
                                    'options' => ['Expandable' => 'Expandable', 'Non-Expandable' => 'Non-Expandable'],
                                    'empty' => 'Please Select Type'
                                ]); ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('count', [
                                    'class' => 'form-control',
                                    'id' => 'count',
                                    'label' => 'count',
                                    'type' => 'text',
                                ]); ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('purchase_date', [
                                    'class' => 'form-control',
                                    'id' => 'purchase_date',
                                    'label' => false,
                                    'type' => 'text',
                                    'hidden' => true
                                ]); ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('acquire_date', [
                                    'class' => 'form-control',
                                    'id' => 'acquire_date',
                                    'label' => false,
                                    'type' => 'text',
                                    'hidden' => true
                                ]); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('user_id', [
                                    'class' => 'form-control',
                                    'id' => 'user_id',
                                    'label' => false,
                                    'options' => $users,
                                    'hidden' => true
                                ]); ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('user_added', [
                                    'class' => 'form-control',
                                    'id' => 'user_added',
                                    'label' => false,
                                    'value' => $this->request->getAttribute('identity')->id,
                                    'hidden' => true
                                ]); ?>
                            </div>
                            <div class="col-md-4 mb-3">
                                <?= $this->Form->control('user_modified', [
                                    'class' => 'form-control',
                                    'id' => 'user_modified',
                                    'label' => false,
                                    'options' => $users,
                                    'hidden' => true
                                ]); ?>
                            </div>
                        </div>
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
                  <a href="<?= $this->Url->build(['prefix' => 'Tech', 'controller' => 'Items', 'action' => 'index']) ?>" class="btn btn-default float-right">Cancel</a>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>        
</section>