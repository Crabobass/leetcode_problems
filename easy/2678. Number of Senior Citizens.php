<?php

class Solution
{

    /**
     * @param String[] $details
     * @return Integer
     */
    public function countSeniors(array $details): int
    {
        $result = 0;
        foreach ($details as $detail) {
            $years = $detail[11].$detail[12];
            if ($years > 60)
                $result++;
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => ["7868190130M7522", "5303914400F9211", "9273338290F4010"], 'output' => 2],
        ['input' => ["1313579440F2036", "2921522980M5644"], 'output' => 0],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->countSeniors($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();