<?php
function fib($n)
{
    $prevNum = 0;
    $currNum = 1;
    for($i = 1; $i < $n; $i++)
    {
        $tmp = $prevNum + $currNum;
        $prevNum = $currNum;
        $currNum = $tmp;
    }
    return $currNum;
}

function fibDigit($n)
{
    $prevNum = 0;
    $currNum = 1;
    for($i = 1; $i < $n; $i++)
    {
        $tmp = $prevNum + $currNum;
        $prevNum = $currNum % 10;
        $currNum = $tmp;
    }
    return $currNum;
}

function fibModulo($n, $m)
{
    $arr = [0, 1];
    for($i = 2; $i < 6*$m; $i++)
    {
        $tmp = ($arr[$i-1] + $arr[$i-2]) % $m;
        $arr[] = $tmp;
        if($arr[$i-1] === 0 and $arr[$i] === 1){
            $num = $n % (count($arr)-2);
            return $arr[$num];
        }
    }
}

$num1 = fibDigit(696352);
$num2 = fibDigit(796354);
$num3 = fibModulo(10, 2);
$str = "$num2";

echo 'Пятое число Фибоначчи: ' . fib(5) . PHP_EOL;
echo 'Последняя цифра 696352 числа Фибоначчи: ' . $num1%10 . PHP_EOL;
echo 'Последняя цифра 796354 числа Фибоначчи: ' . substr($str, -1)  . PHP_EOL;
echo 'Остаток от деления 10-го числа Фибоначчи на 2: ' . $num3 . PHP_EOL;
?>
