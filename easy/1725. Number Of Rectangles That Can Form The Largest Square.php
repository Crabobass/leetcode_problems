<?php

class Solution {

    /**
     * @param Integer[][] $rectangles
     * @return Integer
     */
    public static function countGoodRectangles($rectangles) {
        $tmp = [];

        foreach ($rectangles as $rec) {
            if ($rec[0] <= $rec[1]) {
                $tmp[$rec[0]]++;
            } else {
                $tmp[$rec[1]]++;
            }
        }

        krsort($tmp);
        return array_shift($tmp);
    }
}