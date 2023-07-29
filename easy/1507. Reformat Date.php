<?php

class Solution
{
    /**
     * @param String $date
     * @return String
     */
    public function reformatDate(string $date): string
    {
        return date('Y-m-d', strtotime($date));
    }
}

function test()
{
    $cases = [
        ['input' => '20th Oct 2052', 'output' => '2052-10-20'],
        ['input' => '6th Jun 1933', 'output' => '1933-06-06'],
        ['input' => '26th May 1960', 'output' => '1960-05-26'],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->reformatDate($case['input']);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
        echo "\r\n";
        print_r($res);
        echo ' ' . $time . "\r\n";
    }
}

test();