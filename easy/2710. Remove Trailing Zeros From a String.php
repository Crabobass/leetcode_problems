<?php

class Solution
{
    /**
     * @param String $num
     * @return String
     */
    public function removeTrailingZeros(string $num): string
    {
        $lenNum = strlen($num)-1;
        $countDel = 0;
        for ($i = $lenNum; $i >= 0; $i--){
            if ($num[$i] === '0'){
                $countDel--;
            }else{
                break;
            }
        }
        return ($countDel === 0) ? $num : substr($num, 0, $countDel);
    }

    // OR =)
    public function removeTrailingZeros2(string $num): string
    {
        return rtrim($num, '0');
    }
}

function test()
{
    $cases = [
        ['input' => "51230100", 'output' => '512301'],
        ['input' => "123", 'output' => "123"],
        ['input' => "0000000", 'output' => ""],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->removeTrailingZeros($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }


    foreach ($cases as $case) {
        $result = (new Solution)->removeTrailingZeros2($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();