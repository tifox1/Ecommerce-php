<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property string $description
 * @property int $categories_id
 * @property string $main_image
 *
 * @property \App\Model\Entity\Category $category
 */
class Product extends Entity
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
        'name' => true,
        'price' => true,
        'description' => true,
        'categories_id' => true,
        'main_image' => true,
        'category' => true,
        'image' => true,
        'slug' => true,
        'edit_image' => true,
    ];
}
