<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function greatestLetter(string $s): string
    {
        $res = '';
        $l = strlen($s);
        $upper = [];
        $lower = [];
        for($i = 0; $i < $l; $i++){
            if (ctype_upper($s[$i])){
                $upper[$s[$i]] = (isset($lower[strtolower($s[$i])])) ? 1 : 0;
            }
            if (ctype_lower($s[$i])){
                $lower[$s[$i]] = 0;
                if (isset($upper[strtoupper($s[$i])])){
                    $upper[strtoupper($s[$i])] = 1;
                }
            }
        }
        foreach ($upper as $k => $v) {
            if ($v === 1 && $k > $res){
                $res = $k;
            }
        }
        return $res;
    }

    /**
     * not optimal
     * @param String $s
     * @return String
     */
    public function greatestLetter2(string $s): string
    {
        $res = '';
        $ar = str_split($s);
        asort($ar);
        foreach ($ar as $item) {
            if (ctype_upper($item)){
                if ($item > $res && in_array(strtolower($item), $ar)){
                    $res = $item;
                }
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'lEeTcOdE', 'output' => 'E'],
        ['input' => 'arRAzFif', 'output' => 'R'],
        ['input' => 'AbCdEfGhIjK', 'output' => ''],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->greatestLetter($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();