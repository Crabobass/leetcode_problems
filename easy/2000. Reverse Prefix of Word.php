<?php

class Solution
{
    /**
     * @param String $word
     * @param String $ch
     * @return String
     */
    public function reversePrefix(string $word, string $ch): string
    {
        $tmps = '';
        $lenWord = strlen($word);
        for($i = 0; $i < $lenWord; $i++){
            $tmps .= $word[$i];
            if ($word[$i] === $ch){
                for($j = 0; $j <= $i; $j++){
                    $word[$j] = $tmps[$i-$j];
                }
                break;
            }
        }
        return $word;
    }
}

function test()
{
    $cases = [
        ['input' => ['abcdefd', 'd'], 'output' => "dcbaefd"],
        ['input' => ['xyxzxe', 'z'], 'output' => "zxyxxe"],
        ['input' => ['abcd', 'z'], 'output' => "abcd"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->reversePrefix($case['input'][0], $case['input'][1]) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();