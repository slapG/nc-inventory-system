<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\BelongsTo $Departments
 * @property \App\Model\Table\PositionsTable&\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\FeedbackFormsTable&\Cake\ORM\Association\HasMany $FeedbackForms
 * @property \App\Model\Table\ItemsTable&\Cake\ORM\Association\HasMany $Items
 * @property \App\Model\Table\ServiceFormsTable&\Cake\ORM\Association\HasMany $ServiceForms
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id_number');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FeedbackForms', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Items', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('ServiceForms', [
            'foreignKey' => 'user_id',
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
            ->scalar('firstname')
            ->requirePresence('firstname', 'create')
            ->allowEmptyString('firstname');

        $validator
            ->scalar('middlename')
            ->allowEmptyString('middlename');

        $validator
            ->scalar('lastname')
            ->requirePresence('lastname', 'create')
            ->allowEmptyString('lastname');

        $validator
            ->integer('id_number')
            ->requirePresence('id_number', 'create')
            ->notEmptyString('id_number');

        $validator
            ->scalar('password')
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('pagibig_number')
            ->allowEmptyString('pagibig_number');

        $validator
            ->scalar('philhealth_number')
            ->allowEmptyString('philhealth_number');

        $validator
            ->scalar('sss_number')
            ->allowEmptyString('sss_number');

        $validator
            ->scalar('tin_number')
            ->allowEmptyString('tin_number');

        $validator
            ->date('birthdate')
            ->allowEmptyDate('birthdate');

        $validator
            ->scalar('cpe_name')
            ->allowEmptyString('cpe_name');

        $validator
            ->scalar('cpe_address')
            ->allowEmptyString('cpe_address');

        $validator
            ->scalar('cpe_contact')
            ->allowEmptyString('cpe_contact');

        $validator
            ->scalar('is_active')
            ->requirePresence('is_active', 'create')
            ->notEmptyString('is_active');

        $validator
            ->scalar('is_admin')
            ->requirePresence('is_admin', 'create')
            ->notEmptyString('is_admin');

        $validator
            ->scalar('is_staff')
            ->requirePresence('is_staff', 'create')
            ->notEmptyString('is_staff');

        $validator
            ->scalar('is_employee')
            ->requirePresence('is_employee', 'create')
            ->notEmptyString('is_employee');

        $validator
            ->scalar('is_tech')
            ->requirePresence('is_tech', 'create')
            ->notEmptyString('is_tech');

        $validator
            ->scalar('is_teacher')
            ->requirePresence('is_teacher', 'create')
            ->notEmptyString('is_teacher');

        $validator
            ->integer('department_id')
            ->notEmptyString('department_id');

        $validator
            ->integer('position_id')
            ->notEmptyString('position_id');

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
        $rules->add($rules->existsIn('department_id', 'Departments'), ['errorField' => 'department_id']);
        $rules->add($rules->existsIn('position_id', 'Positions'), ['errorField' => 'position_id']);

        return $rules;
    }
}
