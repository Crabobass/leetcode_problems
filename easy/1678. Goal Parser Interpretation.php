<?php

class Solution
{

    /**
     * @param String $command
     * @return String
     */
    public function interpret($command): string
    {
        return str_replace(['()', '(al)'], ['o', 'al'], $command);
    }
}

function test()
{
    $cases = [
        ['input' => 'G()(al)', 'output' => 'Goal'],
        ['input' => 'G()()()()(al)', 'output' => 'Gooooal'],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->interpret($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();