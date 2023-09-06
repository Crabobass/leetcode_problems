<?php

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function longestPalindrome(string $s): int
    {
        $ars = array_count_values(str_split($s));
        rsort($ars);
        $haveOdd = false;
        $res = 0;
        foreach ($ars as $symCount) {
            if ($haveOdd === false && $symCount % 2 !== 0) {
                $res += $symCount;
                $haveOdd = true;
                continue;
            }
            if ($haveOdd && $symCount % 2 !== 0 && $symCount > 2){
                $res += $symCount-1;
                continue;
            }
            if ($symCount % 2 === 0){
                $res += $symCount;
                continue;
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => 'civilwartestingwhetherthatnaptionoranynartionsoconceivedandsodedicatedcanlongendureWeareqmetonagreatbattlefiemldoftzhatwarWehavecometodedicpateaportionofthatfieldasafinalrestingplaceforthosewhoheregavetheirlivesthatthatnationmightliveItisaltogetherfangandproperthatweshoulddothisButinalargersensewecannotdedicatewecannotconsecratewecannothallowthisgroundThebravelmenlivinganddeadwhostruggledherehaveconsecrateditfaraboveourpoorponwertoaddordetractTgheworldadswfilllittlenotlenorlongrememberwhatwesayherebutitcanneverforgetwhattheydidhereItisforusthelivingrathertobededicatedheretotheulnfinishedworkwhichtheywhofoughtherehavethusfarsonoblyadvancedItisratherforustobeherededicatedtothegreattdafskremainingbeforeusthatfromthesehonoreddeadwetakeincreaseddevotiontothatcauseforwhichtheygavethelastpfullmeasureofdevotionthatweherehighlyresolvethatthesedeadshallnothavediedinvainthatthisnationunsderGodshallhaveanewbirthoffreedomandthatgovernmentofthepeoplebythepeopleforthepeopleshallnotperishfromtheearth', 'output' => 983],
        ['input' => 'ccc', 'output' => 3],
        ['input' => 'abccccdd', 'output' => 7],
        ['input' => 'a', 'output' => 1],
    ];

    foreach ($cases as $case) {
        $start  = microtime(true);
        $output = (new Solution)->longestPalindrome($case['input']);
        $result = $output === $case['output'];
        $time   = round((microtime(true) - $start) * 100000, 3);
        echo $result ? "TRUE" : "FALSE";
        echo "[exp: {$case['output']}; output: $output] ";
        echo ' ' . $time . "\r\n";
    }
}

test();