<?php

class Solution
{
    /**
     * @param String $s1
     * @param String $s2
     * @return String[]
     */
    public function uncommonFromSentences(string $s1, string $s2): array
    {
        $res = [];
        $a1  = explode(' ', $s1);
        $a2  = explode(' ', $s2);
        foreach ($a1 as $item) {
            if (!isset($res[$item])) {
                $res[$item] = 1;
            } else {
                $res[$item]++;
            }
        }
        foreach ($a2 as $item) {
            if (!isset($res[$item])) {
                $res[$item] = 1;
            } else {
                $res[$item]++;
            }
        }
        foreach ($res as $word => $count) {
            if ($count > 1)
                unset($res[$word]);
        }
        return array_keys($res);
    }

    /**
     * @param String $s1
     * @param String $s2
     * @return String[]
     */
    function uncommonFromSentences2($s1, $s2)
    {
        $cnts   = array_count_values(explode(' ', $s1 . ' ' . $s2));
        $result = [];
        foreach ($cnts as $w => $c) {
            if ($c === 1) {
                $result[] = $w;
            }
        }

        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => ["this apple is sweet", "this apple is sour"], 'output' => ["sweet", "sour"]],
        ['input' => ["apple apple", "banana"], 'output' => ["banana"]],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->uncommonFromSentences($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();