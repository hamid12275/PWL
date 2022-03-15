<html>
WHILE<br> 
<?php //-------ini while
$n = 5;$fact=1;
echo "Factorial dari $n adalah: ";
while($n>0)
{
$fact=$fact*$n;
$n--;
}
echo $fact;
?>

<br>Dowhile<br>
<?php //--------ini Do while 
$fact1 = 1;$n1=5;
echo "Factorial dari $n1 adalah:";
do {
  $fact1 *= $n1;
  $n1 = $n1 - 1;
} while ($n1 > 0);
echo $fact1;
?>

<br>FOR<br>
<?php //--------ini Do while 
$n2 = 5;  
$fact2 = 1;  
for ($x=$n2; $x>=1; $x--)   
{  
  $fact2 = $fact2 * $x;  
}  
echo "Factorial dari $n2 adalah: $fact2";  
?>
</html>