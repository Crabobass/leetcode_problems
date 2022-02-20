<?php

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer
     */
    function diagonalSum($mat) {
        $countAr = count($mat)-1;
        $step = 0;
        $result = 0;
        for ($row = 0; $row <= $countAr; $row++){
            $el1 = $mat[$row][$step];
            $el2 = $mat[$row][$countAr-$step];
            if ($step == $countAr-$step){
                $result += $el1;
            }else{
                $result += $el1 + $el2;
            }
            $step++;
        }
        return $result;
    }
}