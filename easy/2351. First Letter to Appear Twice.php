<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function repeatedCharacter(string $s): string
    {
        $a   = [];
        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            ++$a[$s[$i]];
            if ($a[$s[$i]] === 2) {
                return $s[$i];
            }
        }
    }
}

function test()
{
    $cases = [
        ['input' => "abccbaacz", 'output' => "c"],
        ['input' => "abcdd", 'output' => 'd'],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->repeatedCharacter($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();