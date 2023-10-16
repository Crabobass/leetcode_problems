<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function validPalindrome(string $s): bool
    {
        $l = strlen($s);
        for ($i = 0; $i < $l; $i++){
            $j = $l-1-$i;
            if ($s[$i] !== $s[$j]){
                $s1 = substr_replace($s, '', $i, 1);
                $s2 = substr_replace($s, '', $j, 1);
                return $s1 === strrev($s1) || $s2 === strrev($s2);
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => 'caa', 'output' => true],
        ['input' => 'aac', 'output' => true],
        ['input' => 'abca', 'output' => true],
        ['input' => 'aba', 'output' => true],
        ['input' => 'abc', 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->validPalindrome($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();