<?php 
    echo "请输入每行两个整数，用空格分隔（输入 '-1' 作为第一个数字以结束输入）：\n";

    while(($line = readline()) !== false) { 
    $numbers = explode(' ', $line); 
    $num1 = $numbers[0]; 
    if($num1 === '-1') 
    break; 
    $num2 = $numbers[1]; 
    echo $num1 + $num2; 
    echo "\n"; 
    }
?>