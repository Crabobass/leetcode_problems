<?php

class Solution
{
    /**
     * @param String[] $event1
     * @param String[] $event2
     * @return Boolean
     */
    public function haveConflict(array $event1, array $event2): bool
    {
        $e1from = strtotime($event1[0]);
        $e1to   = strtotime($event1[1]);
        $e2from = strtotime($event2[0]);
        $e2to   = strtotime($event2[1]);
        return ($e1from >= $e2from) ? $e1from <= $e2to : $e2from <= $e1to;
    }
}

function test()
{
    $cases = [
        ['input' => [["01:15", "02:00"], ["02:00", "03:00"]], 'output' => true],
        ['input' => [["01:00", "02:00"], ["01:20", "03:00"]], 'output' => true],
        ['input' => [["10:00", "11:00"], ["14:00", "15:00"]], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->haveConflict($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}


test();