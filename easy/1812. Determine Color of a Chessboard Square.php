<?php

class Solution
{

    /**
     * @param String $coordinates
     * @return Boolean
     */
    public function squareIsWhite(string $coordinates): bool
    {
        return (ord($coordinates[0]) + $coordinates[1]) % 2 !== 0;
    }
}

function test()
{
    $cases = [
        ['input' => "a1", 'output' => false],
        ['input' => "h3", 'output' => true],
        ['input' => "c7", 'output' => false],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->squareIsWhite($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();