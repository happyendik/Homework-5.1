<?php
error_reporting(0);
require_once 'niva.php';

$niva1 = new Niva('красный', 'offroad', 'auto');

$niva1->drive(200, 10, 'назад');
echo '<br><br><hr>';
$niva2 = new Niva('синий', 'лимузин', 'manual');

$niva2->drive(200, 10, 'вперед');