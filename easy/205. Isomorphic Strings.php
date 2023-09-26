<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isIsomorphic(string $s, string $t): bool
    {
        $symMapS = $symMapT = [];
        $l       = strlen($s);
        for ($i = 0; $i < $l; $i++) {
            $noT = (isset($symMapT[$t[$i]]) && $symMapT[$t[$i]] !== $s[$i]);
            $noS = (isset($symMapS[$s[$i]]) && $symMapS[$s[$i]] !== $t[$i]);
            if ($noT || $noS) {
                return false;
            }
            $symMapS[$s[$i]] = $t[$i];
            $symMapT[$t[$i]] = $s[$i];
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => ['foo', 'bar'], 'output' => false],
        ['input' => ['badc', 'baba'], 'output' => false],
        ['input' => ['egg', 'add'], 'output' => true],
        ['input' => ['paper', 'title'], 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isIsomorphic($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();