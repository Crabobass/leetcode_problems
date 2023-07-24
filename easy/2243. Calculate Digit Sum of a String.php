<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    public function digitSum(string $s, int $k): string
    {
        while (true) {
            $l = strlen($s);
            if ($l <= $k)
                return $s;

            $groups = (int)ceil($l / $k);
            $tmp    = '';
            for ($g = 0; $g < $groups; $g++) {
                $tmp .= (int)array_sum(str_split(substr($s, $g * $k, $k)));
            }
            $s = $tmp;
        }
    }
}

function test()
{
    $cases = [
        ['input' => ['00000000', 3], 'output' => '000'],
        ['input' => ['11111222223', 3], 'output' => '135'],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->digitSum($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();