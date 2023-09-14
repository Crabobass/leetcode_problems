<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function isSubsequence(string $s, string $t): bool
    {
        $ls = strlen($s);
        $ns = '';
        $lt = strlen($t);
        $tmpj = 0;
        for ($i = 0; $i < $ls; $i++) {
            for ($j = $tmpj; $j < $lt; $j++) {
                if ($s[$i] === $t[$j]) {
                    $ns .= $s[$i];
                    $tmpj = ++$j;
                    continue(2);
                }
            }
        }
        return $s === $ns;
    }
}

function test()
{
    $cases = [
        ['input' => ['leeeet', 'leet'], 'output' => false],
        ['input' => ['leet', 'leeet'], 'output' => true],
        ['input' => ['aaaaaa', 'bbaaaa'], 'output' => false],
        ['input' => ['abc', 'ahbgdc'], 'output' => true],
        ['input' => ['axc', 'ahbgdc'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isSubsequence($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();