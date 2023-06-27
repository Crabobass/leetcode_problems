<?php

class Solution
{
    /**
     * @param String[] $strs
     * @return Integer
     */
    public function minDeletionSize(array $strs): int
    {
        $res = 0;
        $ly  = count($strs);
        $lx  = strlen($strs[0]);

        for ($x = 0; $x < $lx; $x++) {
            for ($y = 1; $y < $ly; $y++) {
                if ($strs[$y][$x] < $strs[$y-1][$x]) {
                    $res++;
                    break;
                }
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["zyx", "wvu", "tsr"], 'output' => 3],
        ['input' => ["cekjd", "ihpzr", "zvzzx"], 'output' => 0],
        ['input' => ["cba", "daf", "ghi"], 'output' => 1],
        ['input' => ["a", "b"], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->minDeletionSize($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();