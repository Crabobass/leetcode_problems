<?php

class Solution
{
    /**
     * @param Integer $n
     * @return String[]
     */
    public function fizzBuzz(int $n): array
    {
        $res = [];
        for ($i = 1; $i <= $n; $i++) {
            $d3 = $i % 3 === 0;
            $d5 = $i % 5 === 0;
            if ($d3 && $d5) {
                $res[] = 'FizzBuzz';
            } else if ($d3) {
                $res[] = 'Fizz';
            } else if ($d5) {
                $res[] = 'Buzz';
            } else {
                $res[] = (string)$i;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 3, 'output' => ["1", "2", "Fizz"]],
        ['input' => 5, 'output' => ["1", "2", "Fizz", "4", "Buzz"]],
        ['input' => 15, 'output' => ["1", "2", "Fizz", "4", "Buzz", "Fizz", "7", "8", "Fizz", "Buzz", "11", "Fizz", "13", "14", "FizzBuzz"]],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->fizzBuzz($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();