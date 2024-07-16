<?php
    echo "請輸入羅馬數字: \n";

    $romaMap = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    while(($line = readline()) != false)
    {
        // 去掉行尾的空格和换行符
        $romaNumber = trim($line);

        $result = 0;
        $value = 0;

        if($romaNumber === '')
            break;

        for($i = strlen($romaNumber) - 1; $i>=0; $i--)
        {
            $currentChar = $romaNumber[$i];
            $currentValue = $romaMap[$currentChar];

            //如果小於前一個數字表示從結果減去那個數字
            if($currentValue < $value)
            {
                $result -= $currentValue;
            }
            //如果大於前一個數字表示從結果加上那個數字
            else
            {
                $result += $currentValue;
            }

            //更新上一個值
            $value = $currentValue;
        }

        echo $result . "\n";
    }
?>