<?php

class Solution
{

    /**
     * @param String $sentence
     * @return Boolean
     */
    public function checkIfPangram(string $sentence): bool
    {
        $slen   = strlen($sentence);
        $t      = [];
        for ($i = 0; $i < $slen; $i++) {
            if (!isset($t[$sentence[$i]]))
                $t[$sentence[$i]] = null;

            if (count($t) === 26)
                return true;
        }
        return false;
    }
}

function test()
{
    $cases = [
        ['input' => "thequickbrownfoxjumpsoverthelazydog", 'output' => true],
        ['input' => "leetcode", 'output' => false],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->checkIfPangram2($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();