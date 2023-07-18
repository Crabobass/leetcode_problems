<?php

class Solution
{
    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    public function addStrings(string $num1, string $num2): string
    {
        $res = '';
        $n1  = strlen($num1);
        $n2  = strlen($num2);

        $num1 = strrev($num1);
        $num2 = strrev($num2);

        $max = ($n1 > $n2) ? $n1 : $n2;
        $d   = '0';
        for ($i = 0; $i < $max; $i++) {
            if (isset($num1[$i]) && !isset($num2[$i])) {
                $tmp = (string)($num1[$i] + $d);
            } else if (isset($num2[$i]) && !isset($num1[$i])) {
                $tmp = (string)($num2[$i] + $d);
            } else {
                $tmp = (string)($num1[$i] + $num2[$i] + $d);
            }
            if (strlen($tmp) === 1) {
                $res = $tmp . $res;
                $d   = '0';
            } else {
                $d   = $tmp[0];
                $res = $tmp[1] . $res;
            }
        }
        if ($d !== '0'){
            $res = $d . $res;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["88", "88"], 'output' => "176"],
        ['input' => ["1", "9"], 'output' => "10"],
        ['input' => ["456", "77"], 'output' => "533"],
        ['input' => ["11", "123"], 'output' => "134"],
        ['input' => ["0", "0"], 'output' => "0"],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->addStrings($case['input'][0], $case['input'][1]) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();