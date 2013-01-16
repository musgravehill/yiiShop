<h1>Корзина</h1>
<div class='row'>
<table class="table table-bordered table-condensed span8">
    <tr>
        <th>Товар</th>
        <th>Кол-во</th>
        <th>Цена за 1</th>
        <th>Цена за все</th>   
        <th></th>   
    </tr>
    <?php
    $summaryPrice = 0;
    foreach ($myCart as $item) {
        $summaryPrice += $item['quantity']*$item['price'];
        echo'
    <tr>
        <td><a href="'.($this->createUrl("product/viewproduct",array('productURL'=>$item['url']))).'" target="_blank">'.$item['name'].'</a></td>
        <td>'.$item['quantity'].'</td>
        <td>'.$item['price'].'</td>
        <td>'.$item['quantity']*$item['price'].'</td> 
        <td>';        
            echo CHtml::beginForm('','POST',array('class' => 'form-horizontal',));
            echo CHtml::hiddenField('deleteFromCart[cart_id]', $item['cart_id']);
            echo CHtml::submitButton('  ', array('class' => 'icon-remove'));
            echo CHtml::endForm();        
  echo '</td> 
      </tr>
            ';
    }    
    ?>
    <tr>
        <td></td>
        <td></td>
        <td><strong>Итого:</strong></td>
        <td><?php echo '<strong>'.$summaryPrice.'</strong>'; ?></td>   
        <td><?php $this->renderPartial('//cart/_placeOrder'); ?></td>
    </tr>
</table>  
   
   <?php $this->renderPartial('//cart/_clearCart'); ?>
</div>


