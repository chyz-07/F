<?php
    echo "請輸入數字 : \n";

    while(($line = readline()) !== false)
    {
        // 去掉行尾的空格和换行符
        $numbers = trim($line);
        
        if($numbers === '')
            break;

        $numbers = intval($numbers);

        if($numbers < 2)
            echo "N\n";
        else if($numbers == 2)
            echo "Y\n";
        else
        {
            $YN = true;
            for($i = 2; $i <= sqrt($numbers); $i++)  //sqrt($number) $number的平方根，可以提高效率
            {                                       //如果存在一个大于其平方根且能整除它的數，那么一定存在一个小于其平方根且能整除它的數
                if($numbers % $i == 0)
                {
                    $YN = false;
                    break;
                }
            }
            if($YN)
                echo "Y\n";
            else
                echo "N\n";
        }
    }