<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function minLength(string $s): int
    {
        while (true) {
            $l  = strlen($s);
            $s  = str_replace(['AB', 'CD'], '', $s);
            $dl = strlen($s);
            if ($dl === $l)
                break;
        }
        return $l;
    }
}

function test()
{
    $cases = [
        ['input' => 'ABFCACDB', 'output' => 2],
        ['input' => 'ACBBD', 'output' => 5],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->minLength($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();