<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderline Entity
 *
 * @property int $orders_id
 * @property int $quantity
 * @property int $line_price
 * @property int $id
 * @property int $products_id
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class Orderline extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'orders_id' => true,
        'quantity' => true,
        'line_price' => true,
        'products_id' => true,
        'order' => true,
        'product' => true,
    ];
}
