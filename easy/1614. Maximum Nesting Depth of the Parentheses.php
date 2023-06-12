<?php

class Solution
{

    /**
     * @param String $s
     * @return Integer
     */
    public function maxDepth(string $s): int
    {
        $stack = [];
        $depth = 0;
        $len   = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i] !== '(' && $s[$i] !== ')')
                continue;
            if ($s[$i] === '(') {
                $stack[] = $s[$i];
                $depth   = max(count($stack), $depth);
            } else {
                if ($s[$i] === array_pop($stack)) {
                    return 0;
                }
            }
        }
        return $depth;
    }
}

function test()
{
    $cases = [
        ['input' => "(1+(2*3)+((8)/4))+1", 'output' => 3],
        ['input' => "(1)+((2))+(((3)))", 'output' => 3], //(()(()))
        ['input' => "()", 'output' => 1],
        ['input' => "()()", 'output' => 1],
        ['input' => "(())", 'output' => 2],
        ['input' => "", 'output' => 0],
    ];

    foreach ($cases as $case) {
//        $s = new Solution();
//        echo $s->maxDepth($case['input'])."\r\n";
        $result = (new Solution)->maxDepth($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();