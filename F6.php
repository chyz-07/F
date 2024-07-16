<?php
    echo "請輸入括號 : \n";

    while(($line = readline()) !== false)
    {
        $brackets = trim($line);

        if($brackets == '')
            break;

        $maxlength = 0;
        $stack = [-1];  //初始化堆疊，放入-1以處理邊界狀況

        for($i = 0; $i < strlen($brackets); $i++)
        {
            if($brackets[$i] == "(")
            {
                array_push($stack, $i);  //array_push() 函數向陣列尾部插入一個或多個元素
            }
            else
            {
                array_pop($stack);
                if(empty($stack))
                    array_push($stack, $i);
                else 
                    $maxlength = max($maxlength, $i - end($stack));
            }
        }
        echo $maxlength . "\n";
    }
?>