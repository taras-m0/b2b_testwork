<?php

/**
 * For www.
 * User: ttt
 * Date: 29.11.2019
 * Time: 10:52
 */
class controller {

    /**
     * Заполнение товарами
     *
     * @return string
     */
    public function init(){
        for($i=0; $i < 20; $i++){
            $product = new \Model\Product([
                'name' => "product_{$i}",
                'price' => rand(10, 100),
            ]);

            $product->save();
        }

        return 'success';
    }

    /**
     * вывод всех товаров
     *
     * @return string
     */
    public function all(){
        $all = \Model\Product::all();

        return json_encode( array_map(function ($item){
            /** \Model\Product $item */
            return $item->attributes();
        }, $all));
    }

    /**
     * Заказ
     *
     * $_REQUEST[<id_товара>] = <кол-во, г., шт., etc>
     */
    public function order(){
        $order = new \Model\Order([ 'user_id' => 1, 'state' => \Model\Order::STATE_NEW ]);

        foreach ($_REQUEST as $product_id => $weight){
            if($weight <= 0){
                continue;
            }

            if($product = \Model\Product::find((int) $product_id)){

                $order->save();
                (new \Model\Orderproduct([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'weight' => $weight,
                ]))->save();
            }
        }

        return json_encode((int) $order->id);
    }

    /**
     * Оплата
     *
     * $_REQUEST[<id_заказа>] = <сумма, коп.>
     */
    public function pay(){
        foreach ($_REQUEST as $order_id => $summa ){
            /** @var \Model\Order $order */
            $order = \Model\Order::find($order_id);
            $price = $order->price;

            $context = @stream_context_create([
                'ignore_errors' => true,
            ]);
            if($price == $summa){
                file_get_contents('https://ya.ru', false, $context);

                if(preg_match('/200/', $http_response_header[0])){
                    $order->state = \Model\Order::STATE_PAYED;
                    return 'success';
                }else{
                    return "https://ya.ru not code 200";
                }
            }else{
                return "price = $price";
            }
        }
    }
}