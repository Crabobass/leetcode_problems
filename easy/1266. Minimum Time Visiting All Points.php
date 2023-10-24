<?php

class Solution
{
    /**
     * @param Integer[][] $points
     * @return Integer
     */
    public function minTimeToVisitAllPoints(array $points): int
    {
        $res = 0;
        $l = count($points);
        for ($i = 1; $i < $l; $i++){
            $res += max(abs($points[$i-1][0] - $points[$i][0]), abs($points[$i-1][1] - $points[$i][1]));
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [[1, 1], [3, 4], [-1, 0]], 'output' => 7],
        ['input' => [[3, 2], [-2, 2]], 'output' => 5],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->minTimeToVisitAllPoints($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();