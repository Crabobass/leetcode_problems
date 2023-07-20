<?php

class Solution
{
    /**
     * @param Integer[] $widths
     * @param String $s
     * @return Integer[]
     */
    public function numberOfLines(array $widths, string $s): array
    {
        $line       = 1;
        $lineStatus = 0;
        $l          = strlen($s);
        for ($i = 0; $i < $l; $i++) {
            $symWidth = $widths[ord($s[$i]) - 97];
            if (($lineStatus + $symWidth) > 100) {
                $line++;
                $lineStatus = 0;
            }
            $lineStatus += $symWidth;
        }
        return [$line, $lineStatus];
    }
}

function test()
{
    $cases = [
        ['input' => [[4, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10], 'bbbcccdddaaa'], 'output' => [2, 4]],
        ['input' => [[10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10], 'abcdefghijklmnopqrstuvwxyz'], 'output' => [3, 60]],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->numberOfLines($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();