<?php

class ImageProcessor {

    public function saveProductImage($imageCUploadedFile, $imageName) {
        $imageSrcLink =  Yii::getPathOfAlias('webroot.'.Yii::app()->params['imagesProductRoot']).'/src-'.$imageName;
        $imageLink =  Yii::getPathOfAlias('webroot.'.Yii::app()->params['imagesProductRoot']).'/'.$imageName;
        move_uploaded_file($imageCUploadedFile->getTempName(), $imageSrcLink);
        //echo $imageSrcLink;
        $image = new SimpleImage();
        $image->load($imageSrcLink);
        $image->resizeToHeight(175);
        $image->save($imageLink);
    }

}