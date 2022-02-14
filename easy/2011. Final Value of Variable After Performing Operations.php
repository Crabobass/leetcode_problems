<?php

class Solution {

    /**
     * @param String[] $operations
     * @return Integer
     */
    function finalValueAfterOperations($operations) {
        $x = 0;
        foreach($operations as $op){
            if ($op == 'X--' || $op == '--X'){
                $x--;
            }else{
                $x++;
            }
        }
        return $x;
    }
}