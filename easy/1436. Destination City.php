<?php

class Solution
{

    /**
     * @param String[][] $paths
     * @return String
     */
    public function destCity(array $paths): string
    {
        if (count($paths) === 1)
            return $paths[0][1];
        $tmp = [];
        foreach ($paths as $path) {
            foreach ($path as $i => $city) {
                if (isset($tmp[$city])){
                    unset($tmp[$city]);
                }else{
                    $tmp[$city] = $i;
                }
            }
        }
        return array_flip($tmp)[1];
    }
}

function test()
{
    $cases = [
        ['input' => [["London", "New York"], ["New York", "Lima"], ["Lima", "Sao Paulo"]], 'output' => 'Sao Paulo'],
        ['input' => [["B", "C"], ["D", "B"], ["C", "A"]], 'output' => "A"],
        ['input' => [["A", "Z"]], 'output' => "Z"],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->destCity($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();