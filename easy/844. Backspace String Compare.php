<?php

class Solution
{
    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    public function backspaceCompare(string $s, string $t): bool
    {
        for ($i = 0; $i < 2; $i++) {
            $ar = ($i === 0) ? str_split($s) : str_split($t);
            $a = [];
            foreach ($ar as $letter) {
                if (ord($letter) >= 97 && ord($letter) <= 122) {
                    $a[] = $letter;
                }
                if ($letter === '#') {
                    array_pop($a);
                }
            }
            $res[] = implode('', $a);
        }
        return $res[0] === $res[1];
    }
}

function test()
{
    $cases = [
        ['input' => ['ab##', 'c#d#'], 'output' => true],
        ['input' => ['ab#c', 'ad#c'], 'output' => true],
        ['input' => ['a#c', 'b'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->backspaceCompare($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();