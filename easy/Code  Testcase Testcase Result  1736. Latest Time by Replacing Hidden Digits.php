<?php

class Solution
{
    /**
     * @param String $time
     * @return String
     */
    public function maximumTime(string $time): string
    {
        $res = '';
        if ($time[0] === '?') {
            if ($time[1] !== '?') {
                $res .= ($time[1] > 3) ? 1 : 2;
            } else {
                $res .= 2;
            }
        } else {
            $res .= $time[0];
        }

        if ($time[1] === '?') {
            $res .= ($res[0] > 1) ? 3 : 9;
        } else {
            $res .= $time[1];
        }

        $res .= ':';
        $res .= ($time[3] === '?') ? '5' : $time[3];
        $res .= ($time[4] === '?') ? '9' : $time[4];

        return $res;
    }

    /**
     * @param String $time
     * @return String
     */
    public function shortSolution(string $time): string
    {
        ($time[0] === '?') && $time[0] = ((int)$time[1] <= 3) ? '2' : '1';
        ($time[1] === '?') && $time[1] = ((int)$time[0] === 2) ? '3' : '9';
        ($time[3] === '?') && $time[3] = '5';
        ($time[4] === '?') && $time[4] = '9';

        return $time;
    }
}

function test()
{
    $cases = [
        ['input' => '??:?0', 'output' => '23:50'],
        ['input' => '0?:3?', 'output' => '09:39'],
        ['input' => '1?:22', 'output' => '19:22'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->maximumTime($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();