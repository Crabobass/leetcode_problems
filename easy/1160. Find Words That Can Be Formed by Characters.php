<?php

class Solution
{
    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    public function countCharacters(array $words, string $chars): int
    {
        $res = 0;
        $c   = str_split($chars);
        foreach ($words as $word) {
            $calc     = true;
            $w        = str_split($word);
            $tmpChars = $c;
            foreach ($w as $l) {
                $haveC = false;
                foreach ($tmpChars as $i => $tmpC) {
                    if ($l === $tmpC) {
                        unset($tmpChars[$i]);
                        $haveC = true;
                        break;
                    }
                }
                if (!$haveC) {
                    $calc = false;
                    break;
                }
            }
            $res += ($calc) ? count($w) : 0;
        }
        return $res;
    }

    public function countCharacters2(array $words, string $chars): int
    {
        $res = 0;
        $c   = array_count_values(str_split($chars));
        foreach ($words as $word) {
            $w    = array_count_values(str_split($word));
            $calc = true;
            foreach ($w as $wl => $wc) {
                if (!isset($c[$wl]) || $c[$wl] < $wc) {
                    $calc = false;
                    break;
                }
            }
            if ($calc) {
                $res += strlen($word);
            }
        }
        return $res;
    }
}

function test()
{
    $cases = [
        ['input' => [["dyiclysmffuhibgfvapygkorkqllqlvokosagyelotobicwcmebnpznjbirzrzsrtzjxhsfpiwyfhzyonmuabtlwin", "ndqeyhhcquplmznwslewjzuyfgklssvkqxmqjpwhrshycmvrb", "ulrrbpspyudncdlbkxkrqpivfftrggemkpyjl", "boygirdlggnh", "xmqohbyqwagkjzpyawsydmdaattthmuvjbzwpyopyafphx", "nulvimegcsiwvhwuiyednoxpugfeimnnyeoczuzxgxbqjvegcxeqnjbwnbvowastqhojepisusvsidhqmszbrnynkyop", "hiefuovybkpgzygprmndrkyspoiyapdwkxebgsmodhzpx", "juldqdzeskpffaoqcyyxiqqowsalqumddcufhouhrskozhlmobiwzxnhdkidr", "lnnvsdcrvzfmrvurucrzlfyigcycffpiuoo", "oxgaskztzroxuntiwlfyufddl", "tfspedteabxatkaypitjfkhkkigdwdkctqbczcugripkgcyfezpuklfqfcsccboarbfbjfrkxp", "qnagrpfzlyrouolqquytwnwnsqnmuzphne", "eeilfdaookieawrrbvtnqfzcricvhpiv", "sisvsjzyrbdsjcwwygdnxcjhzhsxhpceqz", "yhouqhjevqxtecomahbwoptzlkyvjexhzcbccusbjjdgcfzlkoqwiwue", "hwxxighzvceaplsycajkhynkhzkwkouszwaiuzqcleyflqrxgjsvlegvupzqijbornbfwpefhxekgpuvgiyeudhncv", "cpwcjwgbcquirnsazumgjjcltitmeyfaudbnbqhflvecjsupjmgwfbjo", "teyygdmmyadppuopvqdodaczob", "qaeowuwqsqffvibrtxnjnzvzuuonrkwpysyxvkijemmpdmtnqxwekbpfzs", "qqxpxpmemkldghbmbyxpkwgkaykaerhmwwjonrhcsubchs"], "usdruypficfbpfbivlrhutcgvyjenlxzeovdyjtgvvfdjzcmikjraspdfp"], 'output' => 0],
        ['input' => [["cat", "bt", "hat", "tree"], 'atach'], 'output' => 6],
        ['input' => [["hello", "world", "leetcode"], 'welldonehoneyr'], 'output' => 10],
    ];

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->countCharacters($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
//        echo ' [' . $res . ']';
        echo ' ' . $time . "\r\n";
    }

    foreach ($cases as $case) {
        $start = microtime(true);
        $res   = (new Solution)->countCharacters2($case['input'][0], $case['input'][1]);
        $time  = round((microtime(true) - $start) * 100000, 3);
        echo $res === $case['output'] ? "TRUE" : "FALSE";
//        echo ' [' . $res . ']';
        echo ' ' . $time . "\r\n";
    }
}

test();