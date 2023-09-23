<?php

class Solution
{
    /**
     * @param String $arriveAlice
     * @param String $leaveAlice
     * @param String $arriveBob
     * @param String $leaveBob
     * @return Integer
     */
    public function countDaysTogether(string $arriveAlice, string $leaveAlice, string $arriveBob, string $leaveBob): int
    {
        $a1 = strtotime('2023-'.$arriveAlice);
        $a2 = strtotime('2023-'.$leaveAlice);
        $b1 = strtotime('2023-'.$arriveBob);
        $b2 = strtotime('2023-'.$leaveBob);
        $s = 86400;
        $a = [];
        $b = [];
        for($i = $a1; $i <= $a2; $i += $s){
            $a[] = date('d.m.Y', $i);
        }
        for($i = $b1; $i <= $b2; $i += $s){
            $b[] = date('d.m.Y', $i);
        }
        return count(array_intersect($a, $b));
    }
}

function test()
{
    $cases = [
        ['input' => ['08-15', '08-18', '08-16', '08-19'], 'output' => 3],
        ['input' => ['10-01', '10-31', '11-01', '12-31'], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->countDaysTogether($case['input'][0], $case['input'][1], $case['input'][2], $case['input'][3]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();