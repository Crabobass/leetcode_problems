<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function reformat(string $s): string
    {
        $nums = preg_replace('/\D/', '', $s);
        $sym  = preg_replace('/\d/', '', $s);
        $lenn = strlen($nums);
        $lens = strlen($sym);

        if (abs($lenn - $lens) > 1)
            return '';

        $res = '';
        $m   = max($lenn, $lens);
        for ($i = 0; $i < $m; $i++) {
            $res .= ($lenn > $lens) ? $nums[$i] . $sym[$i] : $sym[$i] . $nums[$i];
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'a0b1c2', 'output' => '0a1b2c'],
        ['input' => 'leetcode', 'output' => ''],
        ['input' => '1229857369', 'output' => ''],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->reformat($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();