<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function countBinarySubstrings(string $s): int
    {
        $l        = strlen($s);
        $groups   = [];
        $tmpGroup = $s[0];
        $res      = 0;
        for ($i = 1; $i < $l; $i++) {
            if ($s[$i] !== $tmpGroup[-1]) {
                $groups[] = $tmpGroup;
                $tmpGroup = $s[$i];
            } else {
                $tmpGroup .= $s[$i];
            }
        }

        if ($tmpGroup !== '') {
            $groups[] = $tmpGroup;
        }

        foreach ($groups as $ind => $group) {
            if (!isset($groups[$ind + 1])) {
                break;
            }
            $res += min(strlen($group), strlen($groups[$ind + 1]));
        }

        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => '000111000', 'output' => 6],
        ['input' => '00110', 'output' => 3],
        ['input' => '00110011', 'output' => 6],
        ['input' => '10101', 'output' => 4],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->countBinarySubstrings($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();