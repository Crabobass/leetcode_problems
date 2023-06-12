<?php

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    public function removeOuterParentheses(string $s): string
    {
        $result = '';
        $lenS   = strlen($s);
        $stack  = [];
        $depth  = 0;
        for ($i = 0; $i < $lenS; $i++) {
            if ($s[$i] === '(') {
                $stack[$i] = null;
                $depth++;
                if ($depth > 1)
                    $result .= $s[$i];
            } else {
                array_pop($stack);
                $depth--;
                if ($depth >= 1)
                    $result .= $s[$i];
            }
        }

        return $result;
    }
}

function test()
{
    $cases = [
        ['input' => "(()())(())", 'output' => "()()()"],
        ['input' => "(()())(())(()(()))", 'output' => "()()()()(())"],
        ['input' => "()()", 'output' => ""],
    ];

    foreach ($cases as $case) {
//        echo (new Solution)->removeOuterParentheses($case['input']) . "\r\n";
        $result = (new Solution)->removeOuterParentheses($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();