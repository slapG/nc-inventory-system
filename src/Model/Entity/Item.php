<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Item Entity
 *
 * @property int $id
 * @property string $item_name
 * @property string $code
 * @property string $quantity
 * @property \Cake\I18n\FrozenDate $purchase_date
 * @property \Cake\I18n\FrozenDate $acquire_date
 * @property string $type
 * @property string $count
 * @property string $is_active
 * @property int $status_id
 * @property int|null $user_id
 * @property int|null $user_added
 * @property int|null $user_modified
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\RepairForm[] $repair_forms
 */
class Item extends Entity
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
        'item_name' => true,
        'code' => true,
        'quantity' => true,
        'purchase_date' => true,
        'acquire_date' => true,
        'type' => true,
        'count' => true,
        'is_active' => true,
        'user_id' => true,
        'user_added' => true,
        'user_modified' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'repair_forms' => true,
        'status_id' => true,
    ];
}
