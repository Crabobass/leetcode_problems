<?php

class Solution
{
    /**
     * @param String[] $words
     * @return String
     */
    public function oddString(array $words): string
    {
        $n   = strlen($words[0])-1;
        $res = [];
        foreach ($words as $ind => $s) {
            $ar = [];
            for ($j = 0; $j < $n; $j++) {
                $ar[] = (ord($s[$j + 1]) - 96) - (ord($s[$j]) - 96);
            }
            $key = implode('', $ar);
            $res[$key]['count']++;
            $res[$key]['str'] = $s;
        }
        return (current($res)['count'] === 1) ? current($res)['str'] : end($res)['str'];
    }

}

function test()
{
    $cases = [
        ['input' => ["aaa", "bob", "ccc", "ddd"], 'output' => 'bob'],
        ['input' => ["adc", "wzy", "abc"], 'output' => 'abc'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->oddString($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();