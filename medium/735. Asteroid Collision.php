<?php

class Solution
{
    /**
     * @param Integer[] $asteroids
     * @return Integer[]
     */
    public function asteroidCollision(array $asteroids): array
    {
        while (true) {
            $c = count($asteroids);
            for ($i = 0; $i < $c; $i++) {
                $a = $asteroids[$i];
                $b = $asteroids[$i + 1];
                if (($a > 0 && $b > 0) || ($a < 0 && $b < 0)) {
                    continue;
                }

                if (($a > 0 && $b < 0) && (abs($a) === abs($b))) {
                    unset($asteroids[$i], $asteroids[$i + 1]);
                    $i++;
                }

                if ($a > 0 && $b < 0) {
                    if (abs($a) > abs($b)) {
                        unset($asteroids[$i + 1]);
                        break;
                    } else {
                        unset($asteroids[$i]);
                    }
                }
            }
            $asteroids = array_values($asteroids);

            if ($c === count($asteroids))
                return $asteroids;
        }
    }
}

function test()
{
    $cases = [
        ['input' => [10, 2, -5], 'output' => [10]],
        ['input' => [5, 10, -5], 'output' => [5, 10]],
        ['input' => [8, -8], 'output' => []],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $result = (new Solution)->asteroidCollision($case['input']) === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo ' ' . $time . "\r\n";
    }
}

test();