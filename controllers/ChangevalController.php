<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 02.11.2020
 * Time: 23:28
 */
use \RedBeanPHP\R as R;


function indexAction()
{
    if(isset($_POST['id'])){

        $id   = $_POST['id'];
        $val  = $_POST['val'];
        $pole = $_POST['pole'];
        $tabl = $_POST['tabl'];

        $result = r::load( $tabl , $id );
        $result->{$pole} = $val;
        r::store( $result );

    }
}