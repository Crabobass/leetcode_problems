<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function finalString(string $s): string
    {
        $res = '';
        $l = strlen($s);
        for($i = 0; $i < $l; $i++){
            if ($s[$i] === 'i'){
                $res = strrev($res);
            }else{
                $res .= $s[$i];
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'string', 'output' => 'rtsng'],
        ['input' => 'poiinter', 'output' => 'ponter'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->finalString($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();