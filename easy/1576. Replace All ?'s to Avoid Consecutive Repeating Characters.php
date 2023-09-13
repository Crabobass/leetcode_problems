<?php

class Solution
{
    public function getSym($exclude = [])
    {
        while (true) {
            $sym = chr(random_int(97, 122));
            if (!in_array($sym, $exclude)) {
                return $sym;
            }
        }
    }

    /**
     * @param String $s
     * @return String
     */
    public function modifyString(string $s): string
    {
        $l = strlen($s);
        for ($i = 0; $i < $l; $i++) {
            if ($s[$i] === '?') {
                $s[$i] = $this->getSym([$s[$i-1], $s[$i+1]]);
            }
        }
        return $s;
    }
}

function test()
{
    $cases = [
        ['input' => '?zs', 'output' => 'azs'],
        ['input' => 'ubv?w', 'output' => 'ubvaw'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->modifyString($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();