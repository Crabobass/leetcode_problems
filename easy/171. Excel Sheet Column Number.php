<?php

class Solution
{
    /**
     * @param String $columnTitle
     * @return Integer
     */
    public function titleToNumber(string $columnTitle): int
    {
        $res = 0;
        $n   = 26;
        $map = array_flip(range('A', 'Z'));
        $l   = strlen($columnTitle);
        for ($i = 0; $i < $l; $i++) {
            $sym  = $columnTitle[-1 - $i];
            $code = $map[$sym] + 1;
            if ($i > 0) {
                $res += $n ** $i * $code;
            } else {
                $res += $code;
            }
        }
        echo $res . "\r\n";
        return $res;
    }

    /**
     * @param String $columnTitle
     * @return Integer
     */
    public function titleToNumber2(string $columnTitle): int
    {
        $columns = str_split($columnTitle);
        $result  = 0;
        foreach ($columns as $col) {
            $value  = ord(strtoupper($col)) - ord('A') + 1;
            $result = $result * 26 + $value;
        }
        echo $result . "\r\n";
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => 'A', 'output' => 1],
        ['input' => 'AB', 'output' => 28],
        ['input' => "ZY", 'output' => 701],
        ['input' => "ZZZ", 'output' => 701],
    ];

    foreach ($cases as $case) {
//        $start  = microtime(true);
        $result = (new Solution)->titleToNumber2($case['input']) === $case['output'];
//        $time   = round((microtime(true) - $start) * 100000, 3);
//        echo $result ? "TRUE" : "FALSE";
//        echo ' ' . $time . "\r\n";
    }
}

test();