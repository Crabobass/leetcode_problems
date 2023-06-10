<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function reverseWords(string $s): string
    {
        $arS = explode(' ', $s);
        $result = array_map('strrev', $arS);
        return implode(' ', $result);
    }
}

function test()
{
    $cases = [
        ['input' => "Let's take LeetCode contest", 'output' => "s'teL ekat edoCteeL tsetnoc"],
        ['input' => "God Ding", 'output' => "doG gniD"],
        ['input' => "God", 'output' => "doG"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->reverseWords($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();