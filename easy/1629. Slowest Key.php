<?php

class Solution
{
    /**
     * @param Integer[] $releaseTimes
     * @param String $keysPressed
     * @return String
     */
    public function slowestKey(array $releaseTimes, string $keysPressed): string
    {
        $maxT = 0;
        $maxS = 0;
        foreach ($releaseTimes as $ind => $time) {
            $dt = (int) $time - $releaseTimes[$ind-1];
            if ($maxT < $dt){
                $maxT = $dt;
                $maxS = $keysPressed[$ind];
            }
            if($maxT === $dt && $keysPressed[$ind] > $maxS){
                $maxS = $keysPressed[$ind];
            }
        }
        return $maxS;
    }
}

function test()
{
    $cases = [
        ['input' => [[9, 29, 49, 50], 'cbcd'], 'output' => 'c'],
        ['input' => [[12, 23, 36, 46, 62], 'spuda'], 'output' => 'a'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->slowestKey($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();