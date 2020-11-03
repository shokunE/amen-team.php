<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 01.11.2020
 * Time: 18:04
 */

namespace App\models;
use \RedBeanPHP\R as R;

class Files extends Model
{
    public static function createNewFilePath( $ext_file)
    {
        $body = md5(time());
        $fullPath = 'images/reviews/'.date('Y')."/".date('m')."/";
        $savePath = $fullPath.$body.$ext_file;

        $res['body'] = $body;
        $res['fullPath'] = $fullPath;
        $res['savePath'] = $savePath;
        return $res;
    }

    public static function recordInDbNewPath( $reviewId, $savePath )
    {
        $filepath = R::dispense('files');
        $filepath->review_id = $reviewId;
        $filepath->path = $savePath;
        r::store( $filepath );
    }

    public static function delById( $id ){
        $r = R::load('files' , $id );
        r::trash( $r );
    }
}