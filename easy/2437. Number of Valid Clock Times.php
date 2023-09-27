<?php

class Solution
{
    /**
     * @param String $time
     * @return Integer
     */
    public function countTime(string $time): int
    {
        $h1 = $time[0];
        $h2 = $time[1];
        $m1 = $time[3];
        $m2 = $time[4];

        $mv = 1;
        if ($m1 === '?') {
            if ($m2 === '?') {
                $mv = 60;
            } else {
                    $mv = 6;
            }
        } else {
            if ($m2 === '?') {
                if ($m1 > 5) {
                    $mv = 1;
                } else {
                    $mv = 10;
                }
            }
        }

        $hv = 1;
        if ($h1 === '?') {
            if ($h2 === '?') {
                $hv = 24;
            } else {
                if ($h2 >= 4) {
                    $hv = 2;
                }else{
                    $hv = 3;
                }
            }
        } else {
            if ($h2 === '?') {
                if ($h1 > 1) {
                    $hv = ($mv > 1 || ($m1.$m2 !== '00')) ? 4 : 5;
                } else {
                    $hv = 10;
                }
            }
        }

        return $hv * $mv;
    }
}

function test()
{
    $cases = [
        ['input' => '?9:?0', 'output' => 12],
        ['input' => '07:?3', 'output' => 6],
        ['input' => '?3:1?', 'output' => 30],
        ['input' => '?2:16', 'output' => 3],
        ['input' => '?4:22', 'output' => 2],
        ['input' => '2?:44', 'output' => 4],
        ['input' => '0?:0?', 'output' => 100],
        ['input' => '2?:??', 'output' => 240],
        ['input' => '?5:00', 'output' => 2],
        ['input' => '??:??', 'output' => 1440],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->countTime($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();