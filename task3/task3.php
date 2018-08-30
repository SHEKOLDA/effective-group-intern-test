<?php
#------------------------ TASK 3 ------------------------
/* Данный код включает определения классов геометрических фигур и вспомогательных функций, генерирует
массив случайных фигур со случайными сторонами, сохраняет его в файл, восстанавливает и сортирует по убыванию площадей*/

require "Circle.php";
require "Piramid.php";
require "Rectangle.php";

include 'functions.php';

$array = array();
for ($i = 0; $i < 20; $i++) {
    array_push($array, gen());
}

print_r($array);
echo "<br/>","<br/>";

saveArr($array);
$array = loadArr();

print_r($array);
echo "<br/>","<br/>";

print_r(array_map("area", $array));
echo "<br/>","<br/>";

$array = sortByArea($array);
print_r($array);
echo "<br/>","<br/>";

print_r(array_map("area", $array));

?>
