<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line


/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string|null $middlename
 * @property string $lastname
 * @property string $email
 * @property string $password
 * @property string $is_active
 * @property string $is_admin
 * @property string $is_staff
 * @property string $is_employee
 * @property string $is_teacher
 * @property int|null $department_id
 * @property int|null $positions_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Item[] $items
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'firstname' => true,
        'middlename' => true,
        'lastname' => true,
        'email' => true,
        'password' => true,
        'is_active' => true,
        'is_admin' => true,
        'is_staff' => true,
        'is_employee' => true,
        'is_tech' => true,
        'is_teacher' => true,
        'department_id' => true,
        'position_id' => true,
        'created' => true,
        'modified' => true,
        'items' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword(string $password) : ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
