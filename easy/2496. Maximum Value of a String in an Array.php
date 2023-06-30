<?php

class Solution
{
    /**
     * @param String[] $strs
     * @return Integer
     */
    public function maximumValue(array $strs): int
    {
        $res = 0;
        foreach ($strs as $str) {
            $len = (ctype_digit($str)) ? (int) $str : strlen($str);
            if ($res < $len)
                $res = $len;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ["alic3","bob","3","4","00000"], 'output' => 5],
        ['input' => ["1","01","001","0001"], 'output' => 1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->maximumValue($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();