<?php

namespace App\Helpers;

class Pagination
{
    public static function initArray($c, $m)
    {
        $current = $c;
        $last = $m;
        $delta = 2;
        $left = $current - $delta;
        $right = $current + $delta + 1;
        $range = [];
        $rangeWithDots = [];
        $l = 0;
        for ($i = 1; $i <= $last; $i++) {
            if ($i == 1 || $i == $last || $i >= $left && $i < $right) {
                array_push($range, $i);
            }
        }
        foreach ($range as &$i) {
            if ($l) {
                if ($i - $l === 2) {
                    array_push($rangeWithDots, $l + 1);
                } else if ($i - $l !== 1) {
                    array_push($rangeWithDots, '...');
                }
            }
            array_push($rangeWithDots, $i);
            $l = $i;
        }
        return $rangeWithDots;
    }
}
