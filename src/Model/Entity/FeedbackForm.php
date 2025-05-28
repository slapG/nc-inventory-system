<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FeedbackForm Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_pos
 * @property int $user_dept
 * @property string $description
 * @property int|null $user_endorsed
 * @property int|null $user_enpos
 * @property string $status
 * @property string $is_active
 * @property int|null $user_actioned
 * @property int|null $repair_form_id
 * @property int|null $service_form_id
 * @property int|null $item_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\RepairForm $repair_form
 * @property \App\Model\Entity\ServiceForm $service_form
 * @property \App\Model\Entity\Item $item
 */
class FeedbackForm extends Entity
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
        'description' => true,
        'user_endorsed' => true,
        'user_enpos' => true,
        'status' => true,
        'is_active' => true,
        'user_actioned' => true,
        'repair_form_id' => true,
        'service_form_id' => true,
        'item_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'repair_form' => true,
        'service_form' => true,
        'item' => true,
    ];
}
