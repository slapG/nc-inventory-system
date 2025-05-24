<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RepairForms Model
 *
 * @property \App\Model\Table\ServiceFormsTable&\Cake\ORM\Association\BelongsTo $ServiceForms
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 *
 * @method \App\Model\Entity\RepairForm newEmptyEntity()
 * @method \App\Model\Entity\RepairForm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\RepairForm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RepairForm get($primaryKey, $options = [])
 * @method \App\Model\Entity\RepairForm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\RepairForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RepairForm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\RepairForm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RepairForm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RepairForm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RepairForm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\RepairForm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\RepairForm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RepairFormsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('repair_forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ServiceForms', [
            'foreignKey' => 'service_form_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('control_no')
            ->requirePresence('control_no', 'create')
            ->notEmptyString('control_no');

        $validator
            ->integer('service_form_id')
            ->notEmptyString('service_form_id');

        $validator
            ->integer('item_id')
            ->allowEmptyString('item_id');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('user_dept')
            ->requirePresence('user_dept', 'create')
            ->notEmptyString('user_dept');

        $validator
            ->scalar('findings')
            ->requirePresence('findings', 'create')
            ->notEmptyString('findings');

        $validator
            ->scalar('recommendation')
            ->requirePresence('recommendation', 'create')
            ->notEmptyString('recommendation');

        $validator
            ->scalar('action_taken')
            ->requirePresence('action_taken', 'create')
            ->notEmptyString('action_taken');

        $validator
            ->integer('requested_by')
            ->requirePresence('requested_by', 'create')
            ->notEmptyString('requested_by');

        $validator
            ->integer('inspected_by')
            ->requirePresence('inspected_by', 'create')
            ->notEmptyString('inspected_by');

        $validator
            ->scalar('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        $validator
            ->integer('status_id')
            ->notEmptyString('status_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('service_form_id', 'ServiceForms'), ['errorField' => 'service_form_id']);
        $rules->add($rules->existsIn('item_id', 'Items'), ['errorField' => 'item_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
