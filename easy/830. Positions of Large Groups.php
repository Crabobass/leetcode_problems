<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer[][]
     */
    public function largeGroupPositions(string $s): array
    {
        $res       = [];
        $ars       = str_split($s);
        $prev      = '';
        $prevCount = 0;
        $startInd  = 0;
        foreach ($ars as $index => $value) {
            if ($prev !== $value) {
                if ($prevCount >= 2) {
                    $res[] = [$startInd, $index-1];
                }
                $startInd = $index;
                $prevCount = 0;
            } else {
                $prevCount++;
            }

            if (empty($prev)) {
                $prev = $value;
            }else{
                $prev = $value;
            }
        }

        if ($prevCount >= 2){
            $res[] = [$startInd, count($ars)-1];
        }

        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'bababbabaa', 'output' => []],
        ['input' => 'aaa', 'output' => [[0, 2]]],
        ['input' => 'abbxxxxzzy', 'output' => [[3, 6]]],
        ['input' => 'abc', 'output' => []],
        ['input' => 'abcdddeeeeaabbbcd', 'output' => [[3, 5], [6, 9], [12, 14]]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->largeGroupPositions($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();