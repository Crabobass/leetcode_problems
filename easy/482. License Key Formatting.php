<?php

class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    public function licenseKeyFormatting(string $s, int $k): string
    {
        $res = '';
        $groupCount = 0;
        $s = str_replace('-', '', $s);
        for ($i = strlen($s)-1; $i >= 0; $i--){
            $groupCount++;
            $res = $s[$i].$res;
            if ($groupCount === $k && $i !== 0){
                $res = '-'.$res;
                $groupCount = 0;
            }
        }
        return strtoupper($res);
    }
}

function test()
{
    $cases = [
        ['input' => ['--aaa--', 2], 'output' => 'АА-АА'],
        ['input' => ['5F3Z-2e-9-w', 4], 'output' => '5F3Z-2E9W'],
        ['input' => ['2-5g-3-J', 2], 'output' => '2-5G-3J'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->licenseKeyFormatting($case['input'][0], $case['input'][1]);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();