<?php

class Solution
{

    /**
     * @param Integer $n
     * @return String
     */
    public function generateTheString(int $n): string
    {
        return ($n % 2 === 0) ? str_pad('a', $n - 1, 'a') . 'b' : str_pad('a', $n, 'a');
    }
}

function test()
{
    $cases = [
        ['input' => 4, 'output' => 'pppz'],
        ['input' => 2, 'output' => 'xy'],
        ['input' => 7, 'output' => 'holasss'],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->generateTheString($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();