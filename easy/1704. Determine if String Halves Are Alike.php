<?php

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function halvesAreAlike(string $s): bool
    {
        $strLen = strlen($s);
        $ar = ['a', 'e', 'i', 'o', 'u'];
        $a = $b = 0;
        for($i = 0; $i < $strLen; $i++){
            if ($i+1 <= $strLen/2){
                $a += in_array(strtolower($s[$i]), $ar) ? 1 : 0;
            }else{
                $b += in_array(strtolower($s[$i]), $ar) ? 1 : 0;
            }
        }
        return $a === $b;
    }
}

function test()
{
    $cases = [
        ['input' => "book", 'output' => true],
        ['input' => "textbook", 'output' => false],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->halvesAreAlike($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();