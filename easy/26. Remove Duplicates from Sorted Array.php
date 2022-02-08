<?php

/**
 * @param Integer[] $nums
 * @return Integer
 */
function removeDuplicates(&$nums) {
    $last = '';
    foreach ($nums as $i => $num){
        if ($num === $last){
            unset($nums[$i]);
        }
        $last = $num;
    }
    return count($nums);
}

$arTests = [
    ['test' => [1,1,2], 'result' => 2],
    ['test' =>  [0,0,1,1,1,2,2,3,3,4], 'result' => 5],
];

foreach ($arTests as $testCase) {
    if (removeDuplicates($testCase['test']) !== $testCase['result']) {
        echo ' wrong output: ';
        print_r($testCase['test']);
        echo (removeDuplicates($testCase['test']));
        die();
    }
}

echo 'success';