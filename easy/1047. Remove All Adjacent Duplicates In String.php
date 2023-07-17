<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function removeDuplicates(string $s): string
    {
        $res = $s;
        while (true) {
            $f   = false;
            $tmp = '';
            $l   = strlen($res);
            for ($i = 0; $i < $l; $i++) {
                if ($res[$i] === $res[$i + 1]) {
                    $f = true;
                    $i++;
                } else {
                    $tmp .= $res[$i];
                }
            }
            $res = $tmp;
            if ($f !== true) {
                return $res;
            }
        }
    }

    public function removeDuplicates2(string $s): string
    {
        while (true) {
            $l = strlen($s);
            $tmp = $s;
            for($i = 0; $i < $l; $i++){
                $tmp = str_replace($s[$i].$s[$i], '', $tmp);
            }
            $s = $tmp;
            if (strlen($tmp) === $l){
                return $s;
            }
        }
    }

    public function removeDuplicates3(string $s): string
    {
        $end = -1;
        $l = strlen($s);
        for ($i = 0; $i < $l; $i++)
            if (0 <= $end && $s[$end] === $s[$i])
                $end--;
            else
                $s[++$end] = $s[$i];
        return substr($s, 0, $end + 1);
    }
}

function test()
{
    $cases = [
        ['input' => 'abbacaacyza', 'output' => 'yza'],
        ['input' => 'abbaca', 'output' => 'ca'],
        ['input' => 'azxxzy', 'output' => 'ay'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->removeDuplicates3($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();