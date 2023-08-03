<?php

class Solution
{
    /**
     * @param String $title
     * @return String
     */
    public function capitalizeTitle(string $title): string
    {
        $title = explode(' ', strtolower($title));
        foreach ($title as $ind => $word) {
            if ( strlen($word) > 2){
                $title[$ind] = ucfirst($word);
            }
        }
        return implode(' ', $title);
    }
}

function test()
{
    $cases = [
        ['input' => 'capiTalIze tHe titLe', 'output' => 'Capitalize The Title'],
        ['input' => 'First leTTeR of EACH Word', 'output' => 'First Letter of Each Word'],
        ['input' => 'i lOve leetcode', 'output' => 'i Love Leetcode'],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->capitalizeTitle($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();