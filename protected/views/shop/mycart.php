<h1>Корзина</h1>
<div class='row'>
<table class="table table-bordered table-condensed span8">
    <tr>
        <th>Товар</th>
        <th>Кол-во</th>
        <th>Цена за 1</th>
        <th>Цена за все</th>        
    </tr>
    <?php
    foreach ($myCart as $item) {
        echo'
    <tr>
        <td>'.$item['name'].'</td>
        <td>'.$item['quantity'].'</td>
        <td>'.$item['price'].'</td>
        <td>'.$item['quantity']*$item['price'].'</td>       
    </tr>
            ';
    }
    
    ?>
</table>
</div>


