<?php

class Solution
{

    /**
     * @param String[][] $items
     * @param String $ruleKey
     * @param String $ruleValue
     * @return Integer
     */
    function countMatches($items, $ruleKey, $ruleValue)
    {
        $res = 0;
        $ruleMap = ['type' => 0, 'color' => 1, 'name' => 2];
        foreach ($items as $item) {
            if ($item[$ruleMap[$ruleKey]] === $ruleValue)
                $res++;
        }
        return $res;
    }
}