<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string|null $middlename
 * @property string $lastname
 * @property int $id_number
 * @property string $password
 * @property string|null $pagibig_number
 * @property string|null $philhealth_number
 * @property string|null $sss_number
 * @property string|null $tin_number
 * @property \Cake\I18n\FrozenDate|null $birthdate
 * @property string|null $cpe_name
 * @property string|null $cpe_address
 * @property string|null $cpe_contact
 * @property string $is_active
 * @property string $is_admin
 * @property string $is_staff
 * @property string $is_employee
 * @property string $is_tech
 * @property string $is_teacher
 * @property int $department_id
 * @property int $position_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\FeedbackForm[] $feedback_forms
 * @property \App\Model\Entity\Item[] $items
 * @property \App\Model\Entity\ServiceForm[] $service_forms
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
        'id_number' => true,
        'password' => true,
        'pagibig_number' => true,
        'philhealth_number' => true,
        'sss_number' => true,
        'tin_number' => true,
        'birthdate' => true,
        'cpe_name' => true,
        'cpe_address' => true,
        'cpe_contact' => true,
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
        'department' => true,
        'position' => true,
        'feedback_forms' => true,
        'items' => true,
        'service_forms' => true,
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
