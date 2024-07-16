<?php
    echo "請輸入數字 : \n";

    while(($line = readline()) !== false)
    {
        $number = intval(trim($line));

        if($line == "")
            break;

        $fifty_q = intdiv($number, 50);     //intdiv 除完後取整數
        $fifty_r = $number%50;

        $ten_q = intdiv($fifty_r, 10);
        $ten_r = $fifty_r%10;

        $five_q = intdiv($ten_r, 5);
        $five_r = $ten_r%5;

        $total = $fifty_q + $ten_q + $five_q + $five_r;

        echo "1 $five_r\n";
        echo "5 $five_q\n";
        echo "10 $ten_q\n";
        echo "50 $fifty_q\n";
        echo $total . "\n";
    }