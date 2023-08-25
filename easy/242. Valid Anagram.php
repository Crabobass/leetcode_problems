<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isAnagram(string $s, string $t): bool
    {
        $a = array_count_values(str_split($s));
        $b = array_count_values(str_split($t));
        return $s !== $t && empty(array_diff_assoc($a, $b)) && count($a) === count($b);
    }
}

function test()
{
    $cases = [
        ['input' => ['anagram', 'nagaram'], 'output' => true],
        ['input' => ['rat', 'car'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isAnagram($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();