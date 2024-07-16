<?php
    echo "請輸入數字 : \n";

    while(($line = readline()) !== false)
    {
        $number = intval(trim($line));

        if($line == "")
            break;

        $stack = [[$number, $number, []]];
        $results = [];

        while(!empty($stack))
        {
            list($n, $max, $prefix) = array_pop($stack);

            if($n == 0)
            {
                $results[] = $prefix;
                continue;
            }

            for($i = $max; $i >= 1; $i--)
            {
                if ($i <= $n) {
                    $newPrefix = array_merge($prefix, [$i]);
                    $stack[] = [$n - $i, $i, $newPrefix];
                }
            }
        }

        // 按行排序，每行中的数字按降序排列，然后整体按降序排列
        usort($results, function($a, $b) {
            for ($i = 0; $i < count($a) && $i < count($b); $i++) {
                if ($a[$i] != $b[$i]) {
                    return $b[$i] - $a[$i];
                }
            }
            return count($a) - count($b);
        });

        foreach ($results as $result) {
            echo implode(' ', $result) . "\n";
        }
    }
?>
