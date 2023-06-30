<?php

class Solution
{
    /**
     * @param String[] $arr
     * @param Integer $k
     * @return String
     */
    public function kthDistinct(array $arr, int $k): string
    {
        $map     = array_count_values($arr);
        $counter = 0;
        foreach ($arr as $item) {
            if ($map[$item] === 1) {
                $counter++;
                if ($k === $counter) {
                    return $item;
                }
            }
        }
        return '';
    }
}

function test()
{
    $cases = [
        ['input' => [["d", "b", "c", "b", "c", "a"], 2], 'output' => 'a'],
        ['input' => [["aaa", "aa", "a"], 1], 'output' => 'aaa'],
        ['input' => [["a", "b", "a"], 3], 'output' => ''],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->kthDistinct($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();