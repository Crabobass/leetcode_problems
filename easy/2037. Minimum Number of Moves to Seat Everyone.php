<?php

class Solution
{
    /**
     * @param Integer[] $seats
     * @param Integer[] $students
     * @return Integer
     */
    static function minMovesToSeat($seats, $students)
    {
        sort($seats);
        sort($students);
        $n = count($students);
        $result = 0;
        for ($i = 0; $i <= $n; $i++) {
            $result += abs($seats[$i] - $students[$i]);
        }
        return $result;
    }
}