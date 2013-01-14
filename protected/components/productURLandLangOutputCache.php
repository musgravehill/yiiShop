<?php
class productURLandLangOutputCache extends COutputCache{
    /**
     * Calculates the cache key.
     * @return string cache key
     */
     protected function getCacheKey()
     {
         //Yii::app()->controller->action->id
         $key = md5(Yii::app()->controller->actionParams['productURL']."_".Yii::app()->language);
         return $key;
     }
} 

