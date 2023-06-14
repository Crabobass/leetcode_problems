<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function freqAlphabets(string $s): string
    {
        $result = '';
        $len    = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i+2] === '#'){
                $num = (int) $s[$i].$s[$i+1];
                $result .= chr(96 + $num);
                $i += 2;
            }else{
                $result .= chr(96 + $s[$i]);
            }
        }
        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => "10#11#12", 'output' => "jkab"],
        ['input' => "1326#", 'output' => "acz"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->freqAlphabets($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();