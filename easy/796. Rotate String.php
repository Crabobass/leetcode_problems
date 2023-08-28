<?php

class Solution
{
    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    public function rotateString(string $s, string $goal): bool
    {
        $ls = strlen($s);
        $lg = strlen($goal);

        if ($ls !== $lg) return false;

        $arS = str_split($s);
        for ($i = 0; $i < $ls; $i++) {
            $arS[] = $arS[0];
            unset($arS[0]);
            if (implode('', $arS) === $goal) {
                return true;
            }
            $arS = array_values($arS);
        }

        return false;
    }

    /**
     * @param String $s
     * @param String $goal
     * @return Boolean
     */
    public function rotateString2(string $s, string $goal): bool
    {
        if (strlen($s) !== strlen($goal)) {
            return false;
        }
        $s .= $s;
        return (strpos($s, $goal) !== false);
    }
}

function test()
{
    $cases = [
        ['input' => ['abcde', 'cdeab'], 'output' => true],
        ['input' => ['abcde', 'abced'], 'output' => false],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->rotateString($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();