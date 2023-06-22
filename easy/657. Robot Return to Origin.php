<?php

class Solution
{

    /**
     * @param String $moves
     * @return Boolean
     */
    public function judgeCircle(string $moves): bool
    {
        $len = strlen($moves);
        $x = $y = 0;
        for($i = 0; $i < $len; $i++){
            if ($moves[$i] === 'U'){
                $y++;
            }elseif ($moves[$i] === 'D'){
                $y--;
            }elseif ($moves[$i] === 'L'){
                $x--;
            }elseif ($moves[$i] === 'R'){
                $x++;
            }
        }
        return $x === 0 && $y === 0;
    }

    /**
     * @param String $moves
     * @return Boolean
     */
    public function judgeCircle2(string $moves): bool
    {
        return substr_count($moves, 'U') === substr_count($moves, 'D') &&
            substr_count($moves, 'L') === substr_count($moves, 'R');
    }
}

function test()
{
    $cases = [
        ['input' => "UD", 'output' => true],
        ['input' => "LL", 'output' => false],

    ];

    foreach ($cases as $c) {
        $result = (new Solution)->judgeCircle2($c['input']) === $c['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();