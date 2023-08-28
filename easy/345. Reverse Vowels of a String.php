<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function reverseVowels(string $s): string
    {
        $l     = strlen($s);
        $vowels = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $right = -1;
        for ($i = 0; $i < ($l + $right); $i++) {
            if (!in_array($s[$i], $vowels)){
                continue;
            }
            for ($j = $right; $i < ($l - $right); $j--) {
                $right--;
                if (!in_array($s[$j], $vowels)){
                    continue;
                }
                $tmp = $s[$i];
                $s[$i] = $s[$j];
                $s[$j] = $tmp;
                break;
            }
        }
        return $s;
    }
}

function test()
{
    $cases = [
        ['input' => 'aA', 'output' => 'Aa'],
        ['input' => 'hello', 'output' => 'holle'],
        ['input' => 'leetcode', 'output' => 'leotcede'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->reverseVowels($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();