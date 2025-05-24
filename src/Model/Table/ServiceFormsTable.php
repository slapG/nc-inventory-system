<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ServiceForms Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StatusesTable&\Cake\ORM\Association\BelongsTo $Statuses
 * @property \App\Model\Table\RepairFormsTable&\Cake\ORM\Association\HasMany $RepairForms
 *
 * @method \App\Model\Entity\ServiceForm newEmptyEntity()
 * @method \App\Model\Entity\ServiceForm newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceForm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ServiceForm get($primaryKey, $options = [])
 * @method \App\Model\Entity\ServiceForm findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ServiceForm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceForm[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ServiceForm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceForm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ServiceForm[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ServiceForm[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ServiceForm[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ServiceForm[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServiceFormsTable extends Table
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

        $this->setTable('service_forms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Statuses', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('User', [
            'className' => 'Users',
            'foreignKey' => 'user_id',
            'propertyName' => 'user'
        ]);
        $this->belongsTo('EndorsedUser', [
            'className' => 'Users',
            'foreignKey' => 'user_endorsed',
            'propertyName' => 'endorsed_user'
        ]);

        $this->belongsTo('ActionedUser', [
            'className' => 'Users',
            'foreignKey' => 'user_actioned',
            'propertyName' => 'actioned_user'
        ]);
        
        $this->hasMany('RepairForms', [
            'foreignKey' => 'service_form_id',
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
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->requirePresence('photo', 'create')
            ->notEmptyString('photo');

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
            ->integer('status_id')
            ->notEmptyString('status_id');

        $validator
            ->scalar('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        $validator
            ->integer('user_actioned')
            ->allowEmptyString('user_actioned');

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
        $rules->add($rules->existsIn('status_id', 'Statuses'), ['errorField' => 'status_id']);

        return $rules;
    }
}
