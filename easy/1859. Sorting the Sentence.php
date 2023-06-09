<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    public function sortSentence(string $s): string
    {
        $result = [];
        $e = explode(' ', $s);
        foreach ($e as $word) {
            $result[substr($word,-1)] = preg_replace('/\d/','',$word);
        }
        ksort($result);
        return implode(' ', $result);
    }
}

function test()
{
    $cases = [
        ['input' => "is2 sentence4 This1 a3", 'output' => 'This is a sentence'],
        ['input' => "Myself2 Me1 I4 and3", 'output' => "Me Myself and I"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->sortSentence($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();