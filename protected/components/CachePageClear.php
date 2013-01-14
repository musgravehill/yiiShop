<?php
class CachePageClear {
    public static function clearPageCacheBYproductURL($productURL){            
        $langs = array_keys(Yii::app()->params['languages']);
        foreach ($langs as $lang){
            Yii::app()->cache->delete(md5($productURL."_".$lang)); 
        }
    }
}
