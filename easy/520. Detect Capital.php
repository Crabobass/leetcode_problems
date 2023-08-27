<?php

class Solution
{
    /**
     * @param String $word
     * @return Boolean
     */
    public function detectCapitalUse(string $word): bool
    {
        $l = strlen($word);
        $firstUpper = ord($word[0]) <= 90;
        $upperCount = 0;
        for($i = 0; $i < $l; $i++){
            if (ord($word[$i]) <= 90){
                $upperCount++;
            }
        }
        return $upperCount === $l || ($firstUpper && $upperCount === 1) || $upperCount === 0;
    }
}

function test()
{
    $cases = [
        ['input' => 'USA', 'output' => true],
        ['input' => 'FlaG', 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->detectCapitalUse($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();