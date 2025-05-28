<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FeedbackForms Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\RepairFormsTable&\Cake\ORM\Association\BelongsTo $RepairForms
 * @property \App\Model\Table\ServiceFormsTable&\Cake\ORM\Association\BelongsTo $ServiceForms
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\FeedbackForm newEmptyEntity()
 * @method \App\Model\Entity\FeedbackForm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FeedbackForm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FeedbackForm get($primaryKey, $options = [])
 * @method \App\Model\Entity\FeedbackForm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FeedbackForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FeedbackForm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FeedbackForm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeedbackForm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FeedbackForm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeedbackForm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeedbackForm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FeedbackForm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FeedbackFormsTable extends Table
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

        $this->setTable('feedback_forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RepairForms', [
            'foreignKey' => 'repair_form_id',
        ]);
        $this->belongsTo('ServiceForms', [
            'foreignKey' => 'service_form_id',
        ]);
        $this->belongsTo('Items', [
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
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('user_pos')
            ->requirePresence('user_pos', 'create')
            ->notEmptyString('user_pos');

        $validator
            ->integer('user_dept')
            ->requirePresence('user_dept', 'create')
            ->notEmptyString('user_dept');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->integer('user_endorsed')
            ->allowEmptyString('user_endorsed');

        $validator
            ->integer('user_enpos')
            ->allowEmptyString('user_enpos');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        $validator
            ->integer('user_actioned')
            ->allowEmptyString('user_actioned');

        $validator
            ->integer('repair_form_id')
            ->allowEmptyString('repair_form_id');

        $validator
            ->integer('service_form_id')
            ->allowEmptyString('service_form_id');

        $validator
            ->integer('item_id')
            ->allowEmptyString('item_id');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('repair_form_id', 'RepairForms'), ['errorField' => 'repair_form_id']);
        $rules->add($rules->existsIn('service_form_id', 'ServiceForms'), ['errorField' => 'service_form_id']);
        $rules->add($rules->existsIn('item_id', 'Items'), ['errorField' => 'item_id']);

        return $rules;
    }
}
