<?php

class Solution
{
    /**
     * @param String $current
     * @param String $correct
     * @return Integer
     */
    public function convertTime(string $current, string $correct): int
    {
        $day = 60 * 24;
        $f   = 60 * (int)($current[0] . $current[1]) + (int)($current[3] . $current[4]);
        $t   = 60 * (int)($correct[0] . $correct[1]) + (int)($correct[3] . $correct[4]);
        $res = $tmp = $minInd = 0;
        $inc  = [60, 15, 5, 1];

        if ($f < $t) {
            $d = $t - $f;
        } else if ($f > $t) {
            $d = $day - $f + $t;
        } else {
            return 0;
        }
        while (true) {
            $tmp += $inc[$minInd];
            $res++;
            if ($tmp === $d){
                return $res;
            }
            if ($tmp > $d){
                $res--;
                $tmp -= $inc[$minInd];
                $minInd++;
            }
        }
    }
}

function test()
{
    $cases = [
        ['input' => ['02:30', '04:35'], 'output' => 3],
        ['input' => ['11:00', '11:01'], 'output' => 1],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->convertTime($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();