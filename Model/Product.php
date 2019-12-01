<?php
/**
 * For www.
 * User: ttt
 * Date: 29.11.2019
 * Time: 11:11
 */

namespace Model;

/**
 * Class Product
 * @package Model
 * @property int $id
 * @property string $name
 * @property int $price

 */
class Product extends \Model {
    public static $table_name = 'product';
}