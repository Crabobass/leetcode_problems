<?php

class Solution
{

    /**
     * @param String $s
     * @return String[]
     */
    public function cellsInRange(string $s)
    {
        $alphabetA = [];
        $alphabetI = [];
        foreach( range('A', 'Z') as $k => $v) {
            $alphabetA[$v] = $k;
        }
        foreach( range('A', 'Z') as $k => $v) {
            $alphabetI[$k] = $v;
        }
        $result = [];
        list($r, $c) = explode(':', $s);

        for($y = $alphabetA[$r[0]]; $y <= $alphabetA[$c[0]]; $y++){
            for($x = $r[1]; $x <= $c[1]; $x++){
                $result[] = $alphabetI[$y].$x;
            }
        }

        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => "A1:F1", 'output' => ["A1", "B1", "C1", "D1", "E1", "F1"]],
        ['input' => "K1:L2", 'output' => ["K1", "K2", "L1", "L2"]],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->cellsInRange($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();