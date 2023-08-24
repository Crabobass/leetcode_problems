<?php

class Solution
{
    /**
     * @param String $blocks
     * @param Integer $k
     * @return Integer
     */
    public function minimumRecolors(string $blocks, int $k): int
    {
        $res = 100;
        $l   = strlen($blocks);

        if (strpos($blocks, str_repeat('B', $k)) !== false)
            return 0;

        for ($i = 0; $i <= $l-$k; $i++) {
            $operations = 0;
            $targetLength = 0;
            for ($j = $i; $j < $l; $j++) {
                if ($blocks[$j] === 'W'){
                    $operations++;
                }
                $targetLength++;

                if ($targetLength === $k)
                    break;
            }
            $res = min($res, $operations);
        }

        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ['WBBWWWWBBWWBBBBWWBBWWBBBWWBBBWWWBWBWW', 15], 'output' => 6],
        ['input' => ['BWWWBB', 6], 'output' => 3],
        ['input' => ['WBBWWBBWBW', 7], 'output' => 3],
        ['input' => ['WBWBBBW', 2], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->minimumRecolors($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();