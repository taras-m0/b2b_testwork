INSTALLATION
------------

В файле config.php прописать соединение с БД

~~~
composer install
composer run migrate
~~~


Генерация товаров
-----------------
~~~
http://localhost/init
~~~

получение всех товаров
----------------------
~~~
http://localhost/all
~~~

Формирование заказа
----------------------
~~~
http://localhost/order?<product_id>=<weight>&...
~~~

Оплата заказа
-------------
~~~
http://localhost/pay?<order_id>=<summa>
~~~

Кол-во товара в целых еденицах, (граммы, штуки и пр.)
Сумма в копейках (центах, и пр.)
