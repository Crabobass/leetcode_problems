<?php

class Solution
{
    /**
     * @param String $paragraph
     * @param String[] $banned
     * @return String
     */
    public function mostCommonWord(string $paragraph, array $banned): string
    {
        $paragraph = strtolower(str_replace(['!','?',"'",',', ';', '.', '"'], ' ', $paragraph));
        $arWords   = array_count_values(explode(' ', $paragraph));
        arsort($arWords);
        foreach ($arWords as $word => $count) {
            if (in_array($word, $banned) || empty($word)) continue;
            return $word;
        }
    }
}

function test()
{
    $cases = [
        ['input' => ['Bob. hIt, baLl', ["bob", "hit"]], 'output' => 'ball'],
        ['input' => ['Bob hit a ball, the hit BALL flew far after it was hit.', ['hit']], 'output' => 'ball'],
        ['input' => ['a.', []], 'output' => 'a'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->mostCommonWord($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();