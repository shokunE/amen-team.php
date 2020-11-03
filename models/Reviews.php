<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 01.11.2020
 * Time: 0:33
 */

namespace App\models;
use \RedBeanPHP\R as R;


class Reviews extends Model
{
    public static function write($data)
    {
        $review = R::dispense('reviews');
        $review->email = $data['email'];
        $review->name = $data['name'];
        $review->text = $data['text'];
        $review->created_at = time();
        return R::store($review);
    }

    public static function getWidthSort( $field = 'created_at', $sort = 'DESC' )
    {
        return  R::getAll( "SELECT reviews.*, files.path FROM Reviews LEFT JOIN files ON reviews.id = files.review_id WHERE reviews.status = '1' ORDER BY {$field} {$sort} ");
    }

    public static function getWidthSortForAdmin( $field = 'created_at', $sort = 'DESC' )
    {
        return  R::getAll( "SELECT reviews.*, files.path FROM Reviews LEFT JOIN files ON reviews.id = files.review_id ORDER BY {$field} {$sort} ");
    }

}