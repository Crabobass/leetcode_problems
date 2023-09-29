<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer[]
     */
    public function diStringMatch(string $s): array
    {
        $res      = [];
        $l        = strlen($s);
        $counterI = 0;
        $counterD = $l;
        for ($i = 0; $i <= $l; $i++) {
            if ($s[$i] === 'I') {
                $res[] = $counterI;
                $counterI++;
            } else {
                $res[] = $counterD;
                $counterD--;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'IDID', 'output' => [0, 4, 1, 3, 2]],
        ['input' => 'III', 'output' => [0, 1, 2, 3]],
        ['input' => 'DDI', 'output' => [3, 2, 0, 1]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->diStringMatch($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();