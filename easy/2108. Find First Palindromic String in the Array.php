<?php

class Solution
{
    /**
     * memory optimal
     * @param String[] $words
     * @return String
     */
    function firstPalindrome_($words) {
        foreach ($words as $word) {
            $count = strlen($word);
            if ($count === 1)
                return $word;
            $half = (int)($count / 2);;
            for ($i = 0; $i <= $half; $i++) {
                if ($word[$i] === $word[$count -1 - $i]) {
                    continue;
                }
                continue(2);
            }
            return $word;
        }
        return "";
    }

    /**
     * short and fast solution
     * @param String[] $words
     * @return String
     */
    function firstPalindrome(array $words)
    {
        foreach ($words as $word) {
            if ($word === strrev($word))
                return $word;
        }
        return "";
    }
}

function test()
{
    $cases = [
        ['input' => ["abc", "car", "ada", "racecar", "cool"], 'output' => "ada"],
        ['input' => ["notapalindrome", "racecar"], 'output' => "racecar"],
        ['input' => ["def", "ghi"], 'output' => ""],
        ['input' => ["xngla","e","itrn","y","s","pfp","rfd"], 'output' => "e"],
        ['input' => ["dwcblqnxtrwtqmtqenidhxnifdbmdvobwmcvwjxgbyjzgvrqzlskjbfirauguhyyjhlotuckssrkqzppzbqd","gxdq","paesyowqeguvxozbixjqppeagycjx","glstauwugkidegnllapgzbzchckepmhbameuigsiqywbilwolxuwzzjwzouqknhlkbjzejxtponmkqjlojurxnryxyqy","inyhioiwanafuhsprudtkqztoakxhbmqcmibsxlhycbmqrvtfabsncmiymthcxwkwkq","djknenppuleedpptrfjgqfejcoghnxjlvjalxkyvnujgiiwdbtvgqvgsivkzqcrbfcvooyhqmrlacyiozytmampjwpknrj","zzrpjoogwkdmdxdkdwgwugqtmzryrgtelnvydyqewpdzzptqzvffppgnhhcaiqotmyslntlwjajzuzbawidpxjtyxryg","xmegifttkamzbpjqbghgwdrkvtnuwfmjdmwehdqiyvgpxxlbkcvkemjbmhbyeqyfssytuwaeysvgnidhcgpncxdxxzhrkbvyqfrs","wgljaiyhyfdijjgihseciabfcoqfojhswewpkpartzmaaglvdfifpptycyonigwcgyklapzojivgojcrevugspejmwanolg","oceurgzgvvctgydqexhghwcochhmtoxjugreqfdnsshffngchetrwedhinosdhwlgviohpkjowr","dyl","vjxkcihfmnmmz","aheg","dwsomlqmaqifihkwahvywzqamgominhxfsgrgbgvoiopnikhxonpetelfsguvhxgiujrij","pdrjgfqzyqczpwdsfzypgkmsvnpboutmcffqrwuzkchaufymmczrdwulbvbanungpxqk","eudbizaabgfzqytowifsuovmxmkjgajtliyfycbrkxeaarakapqoihawmdzmglfnglpwqnfd","txdclnfwxevu","kslqrafjshhadqszeljcekrpnpxqgppbnadmzmpufvadcghxqdqmafpbnutifigstxyilmgx","yhhvhyoolv","sjtubggxcla","vydf"], 'output' => ""],
    ];

    foreach ($cases as $case) {
        $result = (new Solution)->firstPalindrome($case['input']) === $case['output'];
        echo $result ? "TRUE\r\n" : "FALSE\r\n";
    }
}

test();