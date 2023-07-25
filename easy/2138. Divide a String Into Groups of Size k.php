<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @param String $fill
     * @return String[]
     */
    public function divideString(string $s, int $k, string $fill): array
    {
        $l      = strlen($s);
        $groups = (int)ceil($l / $k);
        $res    = [];
        for ($g = 0; $g < $groups; $g++) {
            $res[] = substr($s, $g * $k, $k);
        }
        $last = array_pop($res);
        if (strlen($last) < $k) {
            $fillCount = $k - strlen($last);
            $res[]     = $last . str_repeat($fill, $fillCount);
        }else{
            $res[] = $last;
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => ['abcdefghi', 3, 'x'], 'output' => ["abc", "def", "ghi"]],
        ['input' => ['abcdefghij', 3, 'x'], 'output' => ["abc","def","ghi","jxx"]],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->divideString($case['input'][0], $case['input'][1], $case['input'][2]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();