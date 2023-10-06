<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function longestNiceSubstring($s)
    {
        $l          = strlen($s);
        $res        = '';
        $substrings = [];
        $checkedSym = [];
        $optimizedS = '';
        for ($i = 0; $i < $l; $i++) {
            $lowSym = strtolower($s[$i]);
            if (!isset($checkedSym[$lowSym])) {
                for ($j = $i + 1; $j < $l; $j++) {
                    if ((strtolower($s[$i]) === ($s[$j]) || strtolower($s[$j]) === ($s[$i])) && $s[$i] !== $s[$j]) {
                        $checkedSym[$lowSym] = 1;
                    }
                }
            }
            if (isset($checkedSym[$lowSym])) {
                $optimizedS .= $s[$i];
            } else {
                if (strlen($optimizedS) > 1) {
                    $substrings[] = $optimizedS;
                }
                $optimizedS = '';
            }
        }
        if (strlen($optimizedS) > 1) {
            $substrings[] = $optimizedS;
        }
        if (count($substrings) === 1) {
            if ($s === current($substrings)) {
                return $s;
            }
        }
        $max = 0;
        foreach ($substrings as $string) {
            $str = $this->longestNiceSubstring($string);
            if (strlen($str) > $max) {
                $max = strlen($str);
                $res = $str;
            }
        }

        return ($max === 0) ? '' : $res;
    }
}


function test()
{
    $cases = [
        ['input' => 'LSXRkkxIimqTMsfyQIbMjxFbbpkinkrkXKckLwBCtYlXo', 'output' => 'Ii'], // my - kk
        ['input' => 'XqLJWaEEcAjslIXxKZgufikxFwVVYUlvYrIeGRyS', 'output' => 'Xx'], // my - EE
        ['input' => 'qlERNCNVvWLOrrkAaDcXnlaDQxNEneRXQMKnrNN', 'output' => 'NEne'], // my - Vv
        ['input' => 'jcJ', 'output' => ''],
        ['input' => 'YazaAay', 'output' => 'aAa'],
        ['input' => 'Bb', 'output' => 'Bb'],
        ['input' => 'c', 'output' => ''],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->longestNiceSubstring($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();