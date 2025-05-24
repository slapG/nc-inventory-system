<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceForm $serviceForm
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $statuses
 * @var string[]|\Cake\Collection\CollectionInterface $user
 * @var string[]|\Cake\Collection\CollectionInterface $endorsedUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serviceForm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serviceForm->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Service Forms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="serviceForms form content">
            <?= $this->Form->create($serviceForm) ?>
            <fieldset>
                <legend><?= __('Edit Service Form') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $user]);
                    echo $this->Form->control('user_pos');
                    echo $this->Form->control('user_dept');
                    echo $this->Form->control('photo');
                    echo $this->Form->control('description');
                    echo $this->Form->control('user_endorsed', ['options' => $endorsedUser, 'empty' => true]);
                    echo $this->Form->control('user_enpos');
                    echo $this->Form->control('status_id', ['options' => $statuses]);
                    echo $this->Form->control('is_active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
