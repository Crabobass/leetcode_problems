<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function sortString(string $s): string
    {
        $stringArray = array_count_values(str_split($s));
        ksort($stringArray);
        $frontDirect = true;
        $res         = '';
        while (true) {
            $letter = key($stringArray);
            $count  = current($stringArray);
            if (empty($stringArray) || $count === false) {
                return $res;
            }
            if ($count !== 0) {
                $res .= $letter;
                $stringArray[$letter]--;
            }

            if (!empty($stringArray) && $frontDirect && next($stringArray) === false) {
                end($stringArray);
                $frontDirect = false;
                continue;
            }
            if (!empty($stringArray) && !$frontDirect) {
                if (prev($stringArray) === false) {
                    reset($stringArray);
                    $frontDirect = true;
                }
            }
            if (strlen($res) === strlen($s))
                return $res;
        }
    }
}

function test()
{
    $cases = [
        ['input' => 'aabbcc', 'output' => 'abccba'],
        ['input' => 'rat', 'output' => 'art'],
        ['input' => 'jkzkydvxewqjfx', 'output' => 'defjkqvwxyzxkj'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->sortString($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();