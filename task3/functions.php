<?php
# Вспомогательные функции

function triangleGen($sum) # Функция для соблюдения неравенства треугольника при генерации пирамиды
{
    return rand (1, $sum);
}
function triangleArea ($x, $y, $z)  # Функция для вычисления площадей граней пирамиды
{
    $p = ($x + $y + $z) / 2;
    return sqrt($p * ($p - $x) * ($p - $y) * ($p - $z));
}

function gen() # Функция для генерации случайных фигур
{
    $i = rand(0, 2);
    switch ($i) {
        case 0:
            return new Circle(rand(1, 100));
        case 1:
            return new Rectangle(rand(1, 100), rand(1, 100));
        case 2:
            # В случае пирамиды планировалось проверять возможность построения данной фигуры, однако нижеприведенный код этого не достигает
            $x = rand(1, 100);
            $y = rand(1, 100);
            $z = rand(1, 100);
            $base_x = triangleGen($x + $y);
            $base_y = triangleGen($y + $z);
            $base_z = triangleGen($x + $z);
            return new Piramid($base_x, $base_y, $base_z, $x, $y, $z);
    }
}
function area($figure) # Функция для вычисления площади фигуры в зависимости от поданной на вход фигуры
{
    $i = ['Circle'=>0, 'Rectangle'=>1, 'Piramid'=>2][get_class($figure)];
    switch ($i) {
        case 0:
            return pow($figure->radius, 2)* pi();
        case 1:
            return $figure->a * $figure->b;
        case 2:
            $s1 = triangleArea($figure->base_a, $figure->base_b, $figure->base_c);
            $s2 = triangleArea($figure->base_a, $figure->a, $figure->b);
            $s3 = triangleArea($figure->base_b, $figure->b, $figure->c);
            $s4 = triangleArea($figure->base_c, $figure->c, $figure->a);
            if (is_nan($s1 + $s2 + $s3 + $s4)) { # Проверка на вычислимость площади поверхности, выдает 0 при невозможной фигуре
                return 0;
            } else {
                return $s1 + $s2 + $s3 + $s4;
            }
        default:
            return 0;
    }
}

function saveArr ($arr) # Функция записи в файл
{
    file_put_contents ('array.txt', serialize($arr));
}

function loadArr () # Функция восстановления из файла
{
    return unserialize(file_get_contents('array.txt'));
}

function sortByArea($arr) # Функция сортировки по площадям фигур
{
    $areas = array_map("area", $arr);
    array_multisort($areas, SORT_DESC, $arr);
    return $arr;
}

?>
