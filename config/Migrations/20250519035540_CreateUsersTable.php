<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('departments');
        $table->addColumn('department_name', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
        
        $table = $this->table('positions'); 
        $table->addColumn('position_name', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
        
        $table = $this->table('statuses');
        $table->addColumn('status', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();

        $table = $this->table('users');
        $table->addColumn('firstname', 'text')
            ->addColumn('middlename', 'text', ['null' => true])
            ->addColumn('lastname', 'text')
            ->addColumn('email', 'text')
            ->addColumn('password', 'text')
            ->addColumn('is_active', 'text')
            ->addColumn('is_admin', 'text')
            ->addColumn('is_staff', 'text')
            ->addColumn('is_employee', 'text')
            ->addColumn('is_tech', 'text')
            ->addColumn('is_teacher', 'text')
            ->addColumn('department_id', 'integer')
            ->addColumn('position_id', 'integer')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addForeignKey('department_id', 'departments', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('position_id', 'positions', 'id', ['delete'=> 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        $table = $this->table('items');
        $table->addColumn('item_name', 'text')
            ->addColumn('code', 'text')
            ->addColumn('quantity', 'text')
            ->addColumn('purchase_date', 'date')
            ->addColumn('count' , 'text')
            ->addColumn('is_active', 'text')
            ->addColumn('user_id', 'integer')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
        
        $table = $this->table('service_forms');
        $table->addColumn('user_id', 'integer')
            ->addColumn('user_pos', 'integer')
            ->addColumn('user_dept', 'integer')
            ->addColumn('photo', 'string')
            ->addColumn('description', 'text')
            ->addColumn('user_endorsed', 'integer', ['null' => true])
            ->addColumn('user_enpos', 'integer', ['null' => true])
            ->addColumn('status_id', 'integer')
            ->addColumn('is_active', 'text')
            ->addColumn('user_actioned', 'integer', ['null' => true])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addForeignKey('user_id', 'users', 'id',['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_pos', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_dept', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_endorsed', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_enpos', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('status_id', 'statuses', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('user_actioned', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        $table = $this->table('repair_forms');
        $table->addColumn('control_no', 'text', ['null' => true])
            ->addColumn('service_form_id', 'integer')
            ->addColumn('item_id', 'integer',['null' => true])
            ->addColumn('description', 'text')
            ->addColumn('department_id', 'integer')
            ->addColumn('findings', 'text')
            ->addColumn('recommendation', 'text')
            ->addColumn('action_taken', 'text')
            ->addColumn('requested_by', 'integer')
            ->addColumn('inspected_by', 'integer')
            ->addColumn('is_active', 'text')
            ->addColumn('status_id', 'integer')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addForeignKey('item_id', 'items', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])      
            ->addForeignKey('user_dept', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])                         
            ->addForeignKey('requested_by', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('inspected_by', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->addForeignKey('status_id', 'statuses', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();

        $table = $this->table('profile');
        $table->addColumn('user_id', 'integer')
            ->addColumn('photo', 'string')
            ->addColumn('address', 'text')
            ->addColumn('contact_no', 'text')
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE'])
            ->create();
    }
}
