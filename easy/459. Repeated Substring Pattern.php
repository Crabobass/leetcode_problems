<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function repeatedSubstringPattern(string $s): bool
    {
        $l         = strlen($s);
        $arLetters = array_count_values(str_split($s));
        if ($l === 1) {
            return false;
        }

        if (count($arLetters) === 1) {
            return true;
        }

        $pattern = '';
        for ($i = 0; $i < $l; $i++) {
            $pattern    .= $s[$i];
            $patternLen = strlen($pattern);
            if ($l % $patternLen !== 0 || $l === $patternLen || $patternLen === 1)
                continue;
            $tmpL = $l / $patternLen;
            for ($j = 0; $j < $tmpL; $j++) {
                $sub = substr($s, $j * $patternLen, $patternLen);
                if ($pattern !== $sub)
                    continue(2);
                if ($j === $tmpL-1) {
                    return true;
                }
            }
        }

        return false;
    }

    function fastSolution(string $s): bool
    {
        $n = strlen($s);
        $crop = max(1, intdiv($n, 3));
        $t = substr(str_repeat($s, 2), $crop, -$crop);
        return str_contains($t, $s);
    }
}

function test()
{
    $cases = [
        ['input' => 'babbabbabbabbab', 'output' => true],
        ['input' => 'abcdab', 'output' => false],
        ['input' => 'abab', 'output' => true],
        ['input' => 'abcabcabcabc', 'output' => true],
        ['input' => 'aba', 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->fastSolution($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();