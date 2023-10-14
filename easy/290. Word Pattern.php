<?php

class Solution
{
    /**
     * @param String $pattern
     * @param String $s
     * @return Boolean
     */
    public function wordPattern(string $pattern, string $s): bool
    {
        $arS = explode(' ', $s);
        $m = $v = [];
        if (strlen($pattern) !== count($arS))
            return false;
        foreach ($arS as $i => $word){
            if (!isset($m[$word]) && !isset($v[$pattern[$i]])){
                $m[$word] = $pattern[$i];
                $v[$pattern[$i]] = $word;
                continue;
            }
            if ($m[$word] !== $pattern[$i] || $v[$pattern[$i]] !== $word){
                return false;
            }
        }
        return true;
    }
}

function test()
{
    $cases = [
        ['input' => ['jquery', 'jquery'], 'output' => false],
        ['input' => ['abba', 'dog cat cat dog'], 'output' => true],
        ['input' => ['abba', 'dog cat cat fish'], 'output' => false],
        ['input' => ['aaaa', 'dog cat cat dog'], 'output' => false],
        ['input' => ['abba', 'dog dog dog dog'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->wordPattern($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();