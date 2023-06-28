<?php

class Solution
{
    /**
     * @param String $word
     * @return Integer
     */
    public function minTimeToType(string $word): int
    {
        $res    = 0;
        $circle = implode('', range('a', 'z'));

        $lenW      = strlen($word);
        $lenCircle = strlen($circle);

        $nowInd = 0;
        for ($i = 0; $i < $lenW; $i++) {
            for ($j = 0; $j < $lenCircle; $j++) {
                $tmpRI = ($nowInd + $j >= $lenCircle) ? abs($lenCircle - ($nowInd + $j)) : $nowInd + $j;
                $tmpLI = ($nowInd - $j < 0) ? abs($lenCircle + ($nowInd - $j)) : $nowInd - $j;
                $r = $word[$i] === $circle[$tmpRI];
                $l = $word[$i] === $circle[$tmpLI];
                if ($r || $l) {
                    $res += $j + 1;
                    $nowInd =  ($r) ? $tmpRI : $tmpLI;
                    break;
                }
            }
        }

        return $res;
    }

    function minTimeToType2($word) {
        $typeTime = strlen($word);
        $resultTime = $typeTime;
        $cursor = "a";
        for ($i = 0; $i < $typeTime; $i++) {
            if ($cursor !== $word[$i]) {
                $temp = abs(ord($cursor) - ord($word[$i])) > 13 ? 26 - abs(ord($cursor) - ord($word[$i])) : abs(ord($cursor) - ord($word[$i]));
                $resultTime += $temp;
                $cursor = $word[$i];
            }
        }

        return $resultTime;
    }
}

function test()
{
    $cases = [
        ['input' => "bza", 'output' => 7],
        ['input' => "pdy", 'output' => 31],
        ['input' => "abc", 'output' => 5],
        ['input' => "zjpc", 'output' => 34],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $result = (new Solution)->minTimeToType($case['input']) === $case['output'];
        $time =  round((microtime(true) - $start)*1000000, 5);
        echo $result ? "TRUE" : "FALSE";
        echo ' '.$time."\r\n";
    }
    echo "--------------------\r\n";
    foreach ($cases as $case) {
        $start = microtime(true);
        $result = (new Solution)->minTimeToType2($case['input']) === $case['output'];
        $time =  round((microtime(true) - $start)*1000000, 5);
        echo $result ? "TRUE" : "FALSE";
        echo ' '.$time."\r\n";
    }
}

test();