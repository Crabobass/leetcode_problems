<?php

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function checkRecord(string $s): bool
    {
        $l = strlen($s);
        $countA = 0;
        $countL = 0;
        for ($i = 0; $i < $l; $i++){
            if (($s[$i] === 'L' && $s[$i-1] === 'L') && $i !== 0){
                if ($countL === 0){
                    $countL++;
                }
                $countL++;
                if ($countL >= 3){
                    return false;
                }
            }else{
                $countL = 0;
            }
            if ($s[$i] === 'A'){
                $countA++;
                if ($countA < 2) return false;
            }
        }

        return true;
    }
}

function test()
{
    $cases = [
        ['input' => 'PPALLL', 'output' => false],
        ['input' => 'PPALLP', 'output' => true],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->checkRecord($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();