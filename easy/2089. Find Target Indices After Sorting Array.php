<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public static function targetIndices($nums, $target)
    {
        $result = [];
        sort($nums);
        foreach ($nums as $i => $num) {
            if ($target == $num)
                $result[] = $i;
        }
        return $result;
    }
}

// tests
$arTests = [
    ['test' => [[1, 2, 5, 2, 3], 2], 'result' => [1, 2]],
    ['test' => [[1, 2, 5, 2, 3], 3], 'result' => [3]],
    ['test' => [[1, 2, 5, 2, 3], 5], 'result' => [4]],
];

foreach ($arTests as $t) {
    $a1 = $t['test'][0];
    $a2 = $t['test'][1];
    $result = Solution::targetIndices($a1, $a2);
    if ($result !== $t['result']) {
        print_r(Solution::targetIndices($a1, $a2));
        var_dump($result);
        die();
    }
}

echo 'success';
die();