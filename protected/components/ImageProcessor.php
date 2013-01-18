<?php

class ImageProcessor {

    public function saveProductImage($imageCUploadedFile, $imageName) {
        $imageSrcLink =  Yii::getPathOfAlias('webroot.'.Yii::app()->params['imagesProductRoot']).'/src-'.$imageName;
        $imageLink =  Yii::getPathOfAlias('webroot.'.Yii::app()->params['imagesProductRoot']).'/'.$imageName;
        move_uploaded_file($imageCUploadedFile->getTempName(), $imageSrcLink);
        //echo $imageSrcLink;
        $image = new SimpleImage();
        $image->load($imageSrcLink);
        $image->resizeToHeight(320);
        $image->save($imageLink);
    }
    
    public function deleteProductImage($imageName) {
        $imageSrcLink =  Yii::getPathOfAlias('webroot.'.Yii::app()->params['imagesProductRoot']).'/src-'.$imageName;
        $imageLink =  Yii::getPathOfAlias('webroot.'.Yii::app()->params['imagesProductRoot']).'/'.$imageName;
        unlink($imageSrcLink);
        unlink($imageLink);
    }

}