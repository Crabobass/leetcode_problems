<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function minimumMoves(string $s): int
    {
        $res = 0;
        $l   = strlen($s);
        for ($i = 0; $i < $l; $i++) {
            if ($s[$i] === 'O') {
                continue;
            } else {
                $i += 2;
                $res++;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'XXX', 'output' => 1],
        ['input' => 'XXOX', 'output' => 2],
        ['input' => 'OOOO', 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->minimumMoves($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();