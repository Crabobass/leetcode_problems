<?php

class Solution
{
    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    public function canBeEqual(string $s1, string $s2): bool
    {
        if ($s1 === $s2) return true;

        $as1    = str_split($s1);
        $tmp    = $as1[0];
        $as1[0] = $as1[2];
        $as1[2] = $tmp;
        if (implode('', $as1) === $s2)
            return true;

        $tmp    = $as1[1];
        $as1[1] = $as1[3];
        $as1[3] = $tmp;
        if (implode('', $as1) === $s2)
            return true;

        $as1    = str_split($s1);
        $tmp    = $as1[1];
        $as1[1] = $as1[3];
        $as1[3] = $tmp;
        if (implode('', $as1) === $s2)
            return true;

        return false;
    }
}


function test()
{
    $cases = [
        ['input' => ['bnxw', 'bwxn'], 'output' => true],
        ['input' => ['cmpr', 'rmcp'], 'output' => false],
        ['input' => ['abcd', 'cbad'], 'output' => true],
        ['input' => ['cmrp', 'rpmc'], 'output' => false],
        ['input' => ['cmrp', 'rpcm'], 'output' => true],
        ['input' => ['abcd', 'cdab'], 'output' => true],
        ['input' => ['abcd', 'dacb'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->canBeEqual($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();