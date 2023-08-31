<?php

class Solution
{
    /**
     * @param String[] $list1
     * @param String[] $list2
     * @return String[]
     */
    function findRestaurant($list1, $list2)
    {
        $list1  = array_flip($list1);
        $list2  = array_flip($list2);
        $minSum = PHP_INT_MAX;
        $result = [];

        foreach ($list1 as $word => $index) {
            if (isset($list2[$word])){
                $sum = $index + $list2[$word];
                if ($sum === $minSum){
                    $result[] = $word;
                }
                if ($sum < $minSum){
                    $result = [];
                    $minSum = $sum;
                    $result[] = $word;
                }
            }
        }

        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => [["happy", "sad", "good"], ["sad", "happy", "good"]], 'output' => ["sad", "happy"]],
        ['input' => [["Shogun", "Tapioca Express", "Burger King", "KFC"], ["Piatti", "The Grill at Torrey Pines", "Hungry Hunter Steakhouse", "Shogun"]], 'output' => ["Shogun"]],
        ['input' => [["Shogun", "Tapioca Express", "Burger King", "KFC"], ["KFC", "Shogun", "Burger King"]], 'output' => ["Shogun"]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->findRestaurant($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}


test();