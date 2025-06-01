<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RepairFormsTable&\Cake\ORM\Association\HasMany $RepairForms
 *
 * @method \App\Model\Entity\Item newEmptyEntity()
 * @method \App\Model\Entity\Item newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Item[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item get($primaryKey, $options = [])
 * @method \App\Model\Entity\Item findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Item[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ItemsTable extends Table
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

        $this->setTable('items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('AddedUser', [
            'className' => 'Users',
            'foreignKey' => 'user_added',
            'propertyName' => 'added_user'
        ]);
        $this->belongsTo('ModifiedUser', [
            'className' => 'Users',
            'foreignKey' => 'user_modified',
            'propertyName' => 'modified_user'
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
        ]);
        $this->hasMany('FeedbackForms', [
            'foreignKey' => 'item_id',
        ]);
        $this->hasMany('RepairForms', [
            'foreignKey' => 'item_id',
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
            ->scalar('item_name')
            ->requirePresence('item_name', 'create')
            ->notEmptyString('item_name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');
            
        $validator
            ->scalar('code')
            ->requirePresence('code', 'create')
            ->notEmptyString('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmptyString('quantity');

        $validator
            ->date('purchase_date')
            ->requirePresence('purchase_date', 'create')
            ->allowEmptyDate('purchase_date');

        $validator
            ->date('acquire_date')
            ->requirePresence('acquire_date', 'create')
            ->allowEmptyDate('acquire_date');

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmptyString('type');

        $validator
            ->scalar('count')
            ->requirePresence('count', 'create')
            ->notEmptyString('count');

        $validator
            ->scalar('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        $validator
            ->integer('status_id')
            ->notEmptyString('status_id');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('user_added')
            ->allowEmptyString('user_added');

        $validator
            ->integer('user_modified')
            ->allowEmptyString('user_modified');

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
        $rules->add($rules->isUnique(['code']), ['errorField' => 'code']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
