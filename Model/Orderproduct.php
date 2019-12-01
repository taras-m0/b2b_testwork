<?php
/**
 * For www.
 * User: ttt
 * Date: 29.11.2019
 * Time: 13:41
 */

namespace Model;

/**
 * Class Orderproduct
 * @package Model
 * @property integer $id
 * @property Product $product
 * @property Order $order
 * @property integer $weight
 */
class Orderproduct extends \Model {

    public static $table_name = 'order_product';

    static $belongs_to = [
        ['order'],
        ['product'],
    ];

    // static $has_one = [ ['product'] ];
}