<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function areOccurrencesEqual(string $s): bool
    {
        $len = strlen($s);
        $tmp = [];
        for($i = 0; $i < $len; $i++){
            if (isset($tmp[$s[$i]])){
                $tmp[$s[$i]]++;
            }else{
                $tmp[$s[$i]] = 1;
            }
        }
        if (count($tmp) === 1)
            return true;
        $l = array_shift($tmp);
        foreach ($tmp as $letter) {
            if ($letter !== $l)
                return false;
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => "abacbc", 'output' => true],
        ['input' => "aaabb", 'output' => false],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->areOccurrencesEqual($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();