<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ServiceForm Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_pos
 * @property int $user_dept
 * @property string $photo
 * @property string $description
 * @property int|null $user_endorsed
 * @property int|null $user_enpos
 * @property int $status_id
 * @property string $is_active
 * @property int|null $user_actioned
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Status $status
 * @property \App\Model\Entity\RepairForm[] $repair_forms
 */
class ServiceForm extends Entity
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
        'user_id' => true,
        'user_pos' => true,
        'user_dept' => true,
        'photo' => true,
        'description' => true,
        'user_endorsed' => true,
        'user_enpos' => true,
        'status_id' => true,
        'is_active' => true,
        'user_actioned' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'status' => true,
        'repair_forms' => true,
    ];
}
