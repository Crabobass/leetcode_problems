<?php

class Solution
{
    /**
     * @param String $number
     * @return String
     */
    public function reformatNumber(string $number): string
    {
        $number = str_replace(['-', ' '], '', $number);
        $l      = strlen($number);
        $groups = [];
        $tmp    = '';
        for ($i = 1; $i <= $l; $i++) {
            $tmp .= $number[$i - 1];
            if ($i % 3 === 0) {
                $groups[] = $tmp;
                $tmp      = '';
            }
        }
        $lt = strlen($tmp);
        if ($lt === 1) {
            $lastg    = array_pop($groups);
            $groups[] = $lastg[0] . $lastg[1];
            $groups[] = $lastg[2] . $tmp;
        }
        if ($lt === 2) {
            $groups[] = $tmp;
        }
        return implode('-', $groups);
    }
}

function test()
{
    $cases = [
        ['input' => '12', 'output' => "12"],
        ['input' => '123', 'output' => "123"],
        ['input' => '1233', 'output' => "12-33"],
        ['input' => '1-23-45 6', 'output' => "123-456"],
        ['input' => '123 4-567', 'output' => "123-45-67"],
        ['input' => '123 4-5678', 'output' => "123-456-78"],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->reformatNumber($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();