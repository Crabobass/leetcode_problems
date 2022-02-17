<?php

class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $result = [];
        $max = 0;
        foreach ($candies as $candy) {
            if ($candy > $max)
                $max = $candy;
        }
        foreach ($candies as $candy) {
            $result[] = ($candy+$extraCandies >= $max);
        }
        return $result;
    }

    function kidsWithCandies2($candies, $extraCandies) {
        $max = max($candies);
        foreach ($candies as $candy) {
            $result[] = ($candy+$extraCandies >= $max);
        }
        return $result;
    }
}