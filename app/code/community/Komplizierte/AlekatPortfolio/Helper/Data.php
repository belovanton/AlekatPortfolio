<?php
/**
 * Created by PhpStorm.
 * User: belov_ab
 * Date: 13.02.14
 * Time: 9:58
 */ 
class Komplizierte_AlekatPortfolio_Helper_Data extends Mage_Core_Helper_Abstract {
    /**
     * Создаем кэш изображений превью
     */
    public function imageResize($file, $sizex, $sizey, $addwhitespace=false, $whitespace='center')
    {
        $_imageUrl = $file;

        $file = explode('/',$file);

        $file=$file[count($file)-1];
        $imageResized = Mage::getBaseDir('media') . DS . "portfolio" . DS . "cache" . DS . $sizex . DS . $sizey . $file;

        if ((!file_exists($imageResized)|| isset($_REQUEST['no_image_cache']))&& file_exists($_imageUrl)) :

            $imageObj = new Varien_Image($_imageUrl);
            $imageObj->constrainOnly(TRUE);
            $imageObj->keepAspectRatio(TRUE);
            $imageObj->keepFrame(FALSE);
            $imageObj->resize($sizex, $sizey);
            $imageObj->save($imageResized);

            if($addwhitespace)
                $this->addImageWhitespace($imageResized, $sizex, $sizey, $whitespace);

        endif;



        return DS . "media" . DS . "portfolio" . DS . "cache" . DS . $sizex . DS . $sizey .$file;
    }
    private function addImageWhitespace($url, $x, $y, $whitespace='center'){
        // get image
        $src = imagecreatefromjpeg($url);

        // dimensions (just to be safe, should always be 185x127 though)
        $src_wide = imagesx($src);
        $src_high = imagesy($src);

        // set white padding color
        $clear = array('red'=>255,'green'=>255,'blue'=>255);

        // new image dimensions with right padding
        $sizex=0; $sizey=0;
        if(($x-$src_wide)>0) $sizex=$x-$src_wide;
        $dst_wide = $src_wide+$sizex;
        if(($y-$src_high)>0) $sizey=($y-$src_high);
        $dst_high = $src_high+$sizey;

        // New resource image at new size
        $dst = imagecreatetruecolor($dst_wide, $dst_high);

        // fill the image with the white padding color
        $clear = imagecolorallocate( $dst, $clear["red"], $clear["green"], $clear["blue"]);
        imagefill($dst, 0, 0, $clear);

        // copy the original image on top of the new one
        if ($whitespace=='center')
            imagecopymerge($dst,$src,$sizex/2,$sizey/2,0,0,$src_wide,$src_high, 100);
        if ($whitespace=='top')
            imagecopymerge($dst,$src,$sizex/2,$sizey,0,0,$src_wide,$src_high, 100);
        // store the new image in tmp directory

        imagejpeg($dst, $url, 100);

        // free resources
        imagedestroy($src);
        imagedestroy($dst);
    }
}