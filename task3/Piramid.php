<?php

/* Из задания не ясно, что является пирамидой и ее площадью. Задание выполнялось исходя из предположения,
что пирамидой считается тетраэдр, а площадью - площадь поверхности*/

class Piramid
{
    public $base_a;
    public $base_b;
    public $base_c;
    public $a;
    public $b;
    public $c;
    
    public function __construct($base_x, $base_y, $base_z, $x, $y, $z)
    {
        $this->base_a = $base_x;
        $this->base_b = $base_y;
        $this->base_c = $base_z;
        $this->a = $x;
        $this->b = $y;
        $this->c = $z;
    }
    
}

?>