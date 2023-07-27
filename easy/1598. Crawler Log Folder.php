<?php

class Solution
{
    /**
     * @param String[] $logs
     * @return Integer
     */
    public function minOperations(array $logs): int
    {
        $res = 0;
        foreach ($logs as $log) {
            if ($log === '../') {
                $res--;
                $res = ($res < 0) ? 0 : $res;
            } else if ($log === './') {

            } else {
                $res++;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["d1/", "d2/", "../", "d21/", "./"], 'output' => 2],
        ['input' => ["d1/", "d2/", "./", "d3/", "../", "d31/"], 'output' => 3],
        ['input' => ["d1/", "../", "../", "../"], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->minOperations($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();