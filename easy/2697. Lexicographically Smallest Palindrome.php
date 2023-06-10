<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function makeSmallestPalindrome(string $s): string
    {
        $len = strlen($s);
        for($i = 0; $i < $len; $i++){
            if ($s[$i] === $s[$len-$i-1]) {
                continue;
            }
            if ($s[$i] > $s[$len-$i-1]) {
                $s[$i] = $s[$len-$i-1];
            } else{
                $s[$len-$i-1] = $s[$i];
            }
        }
        return $s;
    }
}

function test()
{
    $cases = [
        ['input' => "egcfe", 'output' => 'efcfe'],
        ['input' => "abcd", 'output' => "abba"],
        ['input' => "seven", 'output' => "neven"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->makeSmallestPalindrome($case['input']) === $case['output'];
        echo $result ? "TRUE" : "FALSE" ;
        echo '[ '.$result." ]\r\n";
    }
}

test();