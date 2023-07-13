<?php

class Solution
{
    /**
     * @param String[] $words
     * @return String[]
     */
    public function findWords(array $words): array
    {
        $res = [];
        $map = [
            str_split('qwertyuiop'),
            str_split('asdfghjkl'),
            str_split('zxcvbnm'),
        ];
        foreach ($words as $word) {
            $s    = strtolower($word[0]);
            $line = null;
            foreach ($map as $l => $k) {
                if (in_array($s, $k)) {
                    $line = $l;
                }
            }
            $l = strlen($word);
            for ($i = 1; $i < $l; $i++) {
                if (!in_array(strtolower($word[$i]), $map[$line], true)) {
                    continue(2);
                }
            }
            $res[] = $word;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["Aasdfghjkl","Qwertyuiop","zZxcvbnm"], 'output' => ["Aasdfghjkl","Qwertyuiop","zZxcvbnm"]],
        ['input' => ["Hello", "Alaska", "Dad", "Peace"], 'output' => ["Alaska", "Dad"]],
        ['input' => ["omk"], 'output' => []],
        ['input' => ["adsdf", "sfd"], 'output' => ["adsdf", "sfd"]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->findWords($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();