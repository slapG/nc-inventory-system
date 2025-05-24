<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RepairForm Entity
 *
 * @property int $id
 * @property string $control_no
 * @property int $service_form_id
 * @property int|null $item_id
 * @property string $description
 * @property int $user_dept
 * @property string $findings
 * @property string $recommendation
 * @property string $action_taken
 * @property int $requested_by
 * @property int $inspected_by
 * @property string $is_active
 * @property int $status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\ServiceForm $service_form
 * @property \App\Model\Entity\Item $item
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\Status $status
 */
class RepairForm extends Entity
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
        'control_no' => true,
        'service_form_id' => true,
        'item_id' => true,
        'description' => true,
        'user_dept' => true,
        'findings' => true,
        'recommendation' => true,
        'action_taken' => true,
        'requested_by' => true,
        'inspected_by' => true,
        'is_active' => true,
        'status_id' => true,
        'created' => true,
        'modified' => true,
        'service_form' => true,
        'item' => true,
        'department' => true,
        'status' => true,
    ];
}
