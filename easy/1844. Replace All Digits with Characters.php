<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function replaceDigits(string $s): string
    {
        $lenS = strlen($s);
        for ($i = 0; $i < $lenS; $i++) {
            if (is_numeric($s[$i])) {
                $s[$i] = chr(ord($s[$i - 1]) + $s[$i]);
            }
        }
        return $s;
    }
}

function test()
{
    $cases = [
        ['input' => "a1c1e1", 'output' => "abcdef"],
        ['input' => "a1b2c3d4e", 'output' => "abbdcfdhe"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->replaceDigits($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();