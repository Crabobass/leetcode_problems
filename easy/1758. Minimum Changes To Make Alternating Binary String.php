<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function minOperations(string $s): int
    {
        $res1 = 0;
        $res2 = 0;

        $prev1 = $s[0];
        $prev2 = (int)!($s[0]);
        foreach (str_split($s) as $i => $item) {
            if ($i === 0)
                continue;

            if ($item == $prev1){
                $res1++;
                $prev1 = (int)!($item);
            }else{
                $prev1 = $item;
            }

            if ($item == $prev2){
                $res2++;
                $prev2 = (int)!($item);
            }else{
                $prev2 = $item;
            }
        }
        $res2++;
        return min($res1, $res2);
    }
}

function test()
{
    $cases = [
        ['input' => '1100010111', 'output' => 3],
        ['input' => '10010100', 'output' => 3],
        ['input' => '1111', 'output' => 2],
        ['input' => '0100', 'output' => 1],
        ['input' => '10', 'output' => 0],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->minOperations($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();