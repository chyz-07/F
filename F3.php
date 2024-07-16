<?php
    echo "請輸入數字 : \n";

    while(($line = readline()) !== false)
    {
        $number = trim($line);

        if($number === "")
            break;

        $num = intval($number);

        if($num == 0)
            $result = 0;
        else if($num == 1)
            $result = 1;
        else
        {
            $fib0 = 0;
            $fib1 = 1;
            for($i = 2; $i <= $num; $i++)
            {
                $fibn = $fib0 + $fib1;
                $fib0 = $fib1;
                $fib1 = $fibn;
            }
            $result = $fib1;
        }

        echo "Fibonacci($num) = $result\n";
    }
?>