<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 01.11.2020
 * Time: 0:34
 */

namespace App\models;
use \RedBeanPHP\R as R;


class Model
{
    public static function getTableName(){
        $tableName = explode('\\', strtolower( get_called_class()));
        return array_pop($tableName);
    }

    public static function getAll()
    {
        return R::getAll( 'SELECT * FROM  '.self::getTableName().' ORDER BY id DESC' );
    }

    public static function getOne( $id )
    {
        return R::getRow( 'SELECT * FROM  '.self::getTableName().' WHERE id = ?', [ $id ] );
    }

    public static function getCntAll()
    {
        return R::count( self::getTableName() );
    }
    public static function getWidthPaginate( $limit, $offset )
    {
        return  R::getAll( "SELECT * FROM ".self::getTableName()." ORDER BY id DESC LIMIT ".$limit." OFFSET ".$offset." " );
    }

    public static function load( $id )
    {
        return  R::load( self::getTableName(), $id );
    }

    public static function getWidthSort( $field = 'created_at', $sort = 'DESC' )
    {
        return  R::getAll( "SELECT * FROM ".self::getTableName()." ORDER BY {$field} {$sort} ");
    }
}