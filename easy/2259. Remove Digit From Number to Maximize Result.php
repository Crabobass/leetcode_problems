<?php

class Solution
{
    /**
     * @param String $number
     * @param String $digit
     * @return String
     */
    public function removeDigit(string $number, string $digit): string
    {
        $res      = 0;
        $l = strlen($number);
        for($i = 0; $i < $l; $i++){
            if ($number[$i] === $digit) {
                $number[$i] = '_';
                $res          = max($res, str_replace('_', '', $number));
                $number[$i] = $digit;
            }
        }
        return (string)$res;
    }
}

function test()
{
    $cases = [
        ['input' => ['133235', '3'], 'output' => '13325'], // 13235 13235 13325
        ['input' => ['1231', '1'], 'output' => '231'],
        ['input' => ['123', '3'], 'output' => '12'],
        ['input' => ['551', '5'], 'output' => '51'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->removeDigit($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();