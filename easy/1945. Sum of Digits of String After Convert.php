<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    public function getLucky(string $s, int $k): int
    {
        $numsSum = 0;
        for ($i = 1; $i <= $k; $i++) {
            if (empty($numsSum)) {
                foreach (str_split($s) as $letter) {
                    $code = (string) (ord($letter) - 96);
                    if (strlen($code) > 1) {
                        $len = strlen($code);
                        for ($j = 0; $j < $len; $j++) {
                            $numsSum += (int) $code[$j];
                        }
                    } else {
                        $numsSum += (int)$code;
                    }
                }
            } else {
                foreach (str_split($numsSum) as $ind => $num) {
                    if ($ind === 0) {
                        $numsSum = 0;
                    }
                    $numsSum += $num;
                }
            }
        }
        return $numsSum;
    }
}

function test()
{
    $cases = [
        ['input' => ['leetcode', 2], 'output' => 6],
        ['input' => ['iiii', 1], 'output' => 36],
        ['input' => ['zbax', 2], 'output' => 8],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->getLucky($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();