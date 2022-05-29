<?php
$number1 = (float) $_POST["number1"];
$number2 =(float) $_POST["number2"];
$func = $_POST["func"];

echo "First Number  " . $number1;
echo "<br>";
echo "Second Number " . $number2;
echo "<br>";
if($func == "Plus")
{
    echo $number1 + $number2;
}
if($func == "Minus")
{
    echo $number1 - $number2;
}
if($func == "Multiply")
{
    echo $number1 * $number2;
}
if($func == "Divide")
{
    echo $number1 / $number2;
}
?>