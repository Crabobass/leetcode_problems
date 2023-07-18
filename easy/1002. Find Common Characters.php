<?php

class Solution
{
    /**
     * @param String[] $words
     * @return String[]
     */
    public function commonChars(array $words): array
    {
        $res = array_count_values(str_split($words[0]));
        foreach ($words as $i => $word) {
            $w = array_count_values(str_split($word));
            foreach ($res as $letter => $count) {
                if (isset($w[$letter])) {
                    if ($w[$letter] < $res[$letter]) {
                        $res[$letter] = $w[$letter];
                    }
                } else {
                    unset($res[$letter]);
                }
            }
        }

        $r = [];
        foreach ($res as $l => $c) {
            $i = 1;
            while($i <= $c){
                $r[] = $l;
                $i++;
            }
        }

        return $r;
    }
}

function test()
{
    $cases = [
        ['input' => ["bella", "label", "roller"], 'output' => ["e", "l", "l"]],
        ['input' => ["cool", "lock", "cook"], 'output' => ["c", "o"]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->commonChars($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();