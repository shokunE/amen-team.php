<?php
use \RedBeanPHP\R as R;

const DB_LOCATION = "localhost";
const DB_NAME     = "amen_team_php";
const DB_USER     = "root";
const DB_PASSWD   = "";

R::setup('mysql:host='.DB_LOCATION.';dbname='.DB_NAME.'',
DB_USER,DB_PASSWD); //mysql

//R::freeze( true );

//R::debug(true);
