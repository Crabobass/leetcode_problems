<?php

class Solution
{
    /**
     * @param String $s
     * @param String $letter
     * @return Integer
     */
    public function percentageLetter(string $s, string $letter): int
    {
        $ex = substr_count($s, $letter);
        return ($ex > 0) ? (int)(round(100/(strlen($s)/$ex), 4)) : 0;
    }
}

function test()
{
    $cases = [
        ['input' => ['zfofxbalronosyryeaqvbgpaqksinnhhmjahafkrcqgawkkhabwnabahastkgoggzzkjlaatdadsacsxupfaqaadiaauaaoaennb', 'a'], 'output' => 22],
        ['input' => ['uhrzdkchossxszoi', 's'], 'output' => 18],
        ['input' => ['foobar', 'o'], 'output' => 33],
        ['input' => ['jjjj', 'k'], 'output' => 0],
    ];
    foreach ($cases as $case) {
        $result = (new Solution)->percentageLetter($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();