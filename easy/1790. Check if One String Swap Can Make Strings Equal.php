<?php

class Solution
{
    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    public function areAlmostEqual(string $s1, string $s2): bool
    {
        if ($s1 === $s2)
            return true;

        $ars1 = array_count_values(str_split($s1));
        $ars2 = array_count_values(str_split($s2));
        if (count(array_diff_assoc($ars1, $ars2)) > 0)
            return false;

        $l = strlen($s1);
        $r = 0;
        for ($i = 0; $i < $l; $i++) {
            if ($s1[$i] !== $s2[$i])
                $r++;
            if ($r > 2)
                return false;
        }
        return true;

    }
}

function test()
{
    $cases = [
        ['input' => ['abcd', 'dcba'], 'output' => false],
        ['input' => ['attack', 'defend'], 'output' => false],
        ['input' => ['bank', 'kanb'], 'output' => true],
        ['input' => ['kelb', 'kelb'], 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->areAlmostEqual($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();