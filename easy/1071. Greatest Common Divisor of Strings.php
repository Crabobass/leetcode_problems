<?php

class Solution
{
    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */
    public function gcdOfStrings(string $str1, string $str2): string
    {
        $l1 = strlen($str1);
        $l2 = strlen($str2);
        if ($str1 === $str2) {
            return $str2;
        }

        $r = min($l1, $l2);
        $tmpStr = '';
        $results = [];
        for ($i = 0; $i < $r; $i++) {
            $tmpStr .= $str2[$i];
            if ($tmpStr !== '') {
                $repCount1 = $l1 / strlen($tmpStr);
                $repCount2 = $l2 / strlen($tmpStr);
                if (str_repeat($tmpStr, $repCount1) === $str1 && $str2 === str_repeat($tmpStr, $repCount2)) {
                    $results[] = $tmpStr;
                }
            }
        }

        return (!empty($results)) ? end($results) : '';
    }
}

function test()
{
    $cases = [
        ['input' => ['ABABABAB', 'ABAB'], 'output' => 'ABAB'],
        ['input' => ['ABCDEF', 'ABC'], 'output' => ''],
        ['input' => ['TAUXXTAUXXTAUXXTAUXXTAUXX', 'TAUXXTAUXXTAUXXTAUXXTAUXXTAUXXTAUXXTAUXXTAUXX'], 'output' => 'TAUXX'],
        ['input' => ['ABCABC', 'ABC'], 'output' => 'ABC'],
        ['input' => ['ABABAB', 'ABAB'], 'output' => 'AB'],
        ['input' => ['LEET', 'CODE'], 'output' => ''],
    ];
    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->gcdOfStrings($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();