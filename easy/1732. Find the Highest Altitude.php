<?php

class Solution {

    /**
     * @param Integer[] $gain
     * @return Integer
     */
    function largestAltitude($gain) {
        $max = 0;
        $tmp = 0;

        foreach ($gain as $i => $num){
            $tmp += $num;
            if ($max < $tmp)
                $max = $tmp;
        }

        return $max;
    }
}