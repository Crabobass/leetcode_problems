<?php

class Solution
{
    /**
     * @param String $sentence
     * @param String $searchWord
     * @return Integer
     */
    public function isPrefixOfWord(string $sentence, string $searchWord): int
    {
        $words = explode(' ', $sentence);
        $l = strlen($searchWord);
        foreach ($words as $ind => $word) {
            $wl = strlen($word);
            if ($wl >= $l && strpos($word, $searchWord) === 0){
                return $ind+1;
            }
        }
        return -1;
    }
}

function test()
{
    $cases = [
        ['input' => ['i love eating burger', 'burg'], 'output' => 4],
        ['input' => ['this problem is an easy problem', 'pro'], 'output' => 2],
        ['input' => ['i am tired', 'you'], 'output' => -1],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->isPrefixOfWord($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();