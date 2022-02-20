<?php

class Solution {

    /**
     * @param Integer[][] $image
     * @return Integer[][]
     */
    function flipAndInvertImage($image) {
        $n = count($image)-1;
        $result = [];
        for ($i = 0; $i <= $n; $i++){
            for($j = 0; $j <= $n; $j++){
                $result[$i][$j] = intval(!$image[$i][$n-$j]);
            }
        }
        return $result;
    }
}