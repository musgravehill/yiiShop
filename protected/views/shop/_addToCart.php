<form id="addTocart" method="POST" class="form-horizontal">
    <input type="text" name="addToCart[quantity]" value="1">
    <input type="hidden" name="addToCart[product_id]" value="<?php echo $product_id; ?>" >    
    <input type="submit" value="в корзину" class="btn btn-primary">
</form>