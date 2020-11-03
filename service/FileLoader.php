<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 01.11.2020
 * Time: 18:02
 */

namespace App\service;
use App\models\Files;


class FileLoader
{
    public static function loadRewvievImg( $file , $reviewId )
    {
        $filePath = Files::createNewFilePath( '.png');

        $reviewImg = new \Verot\Upload\Upload( $file );
        $reviewImg->file_new_name_body = $filePath['body'];
        $reviewImg->file_auto_rename = false;
        $reviewImg->file_overwrite = true;
        $reviewImg->file_max_size = 1024*1024;
        $reviewImg->allowed = array( 'image/jpg', 'image/png', 'image/gif' );
        $reviewImg->image_convert = 'png';
        $reviewImg->png_compression = 4;
        $reviewImg->image_resize = true;
        $reviewImg->image_ratio_fill = true;

        if($reviewImg->image_src_x > 320 && $reviewImg->image_src_x>$reviewImg->image_src_y){
            $reviewImg->image_x = 320;
        }

        if($reviewImg->image_src_y  > 240 && $reviewImg->image_src_y>$reviewImg->image_src_x){
            $reviewImg->image_y = 240;
        }


        $reviewImg->process($_SERVER['DOCUMENT_ROOT'].'/'.$filePath['fullPath'] );

        if ( $reviewImg->processed ) {
            $reviewImg->clean();
            Files::recordInDbNewPath( $reviewId, $filePath['savePath'] );
        } else {
            $_SESSION['errorMassage'][] = 'Ошибка при загрузки логотипа : ' . $reviewImg->error ;
        }
    }
}