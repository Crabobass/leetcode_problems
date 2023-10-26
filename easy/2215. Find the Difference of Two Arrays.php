<?php

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[][]
     */
    public function findDifference(array $nums1, array $nums2) {
        $res[] = array_unique(array_diff($nums1, $nums2));
        $res[] = array_unique(array_diff($nums2, $nums1));
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [[1,2,3], [2,4,6]], 'output' => [[1,3],[4,6]]],
        ['input' => [[1,2,3,3], [1,1,2,2]], 'output' => [[3],[]]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->findDifference($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();