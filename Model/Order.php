<?php
/**
 * For www.
 * User: ttt
 * Date: 29.11.2019
 * Time: 13:41
 */

namespace Model;

/**
 * Class Order
 * @package Model
 * @property integer $id
 * @property integer $user_id
 * @property string $state
 */
class Order extends \Model {
    public static $table_name = 'order';

    static $has_many = [['orderproduct']];

    const STATE_NEW = 'new';
    const STATE_PAYED = 'payed';

    public function get_price(){
        return
            array_reduce( $this->orderproduct, function ($result, $orderproduct){
                /** @var Orderproduct $orderproduct */
                return $result + $orderproduct->product->price * $orderproduct->weight;
            }, 0);
    }
}