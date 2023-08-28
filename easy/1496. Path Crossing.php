<?php

class Solution
{
    /**
     * @param String $path
     * @return Boolean
     */
    function isPathCrossing(string $path): bool
    {
        $x = 0;
        $y = 0;
        $ar = [];
        $l = strlen($path);
        for ($i = 0; $i < $l; $i++) {
            $ar[$x][$y] = true;
            switch ($path[$i]){
                case 'N': ++$y; break;
                case 'S': --$y; break;
                case 'W': --$x; break;
                case 'E': ++$x; break;
            }
            if ($ar[$x][$y] === true)
                return true;
        }
        return false;
    }
}

function test()
{
    $cases = [
        ['input' => 'NNSWWEWSSESSWENNW', 'output' => true],
        ['input' => 'NES', 'output' => false],
        ['input' => 'NESWW', 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->isPathCrossing($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();