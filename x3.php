<html>
<head>
    <title>Серега и холодильник</title>
</head>
<body>
<form method="post">
<input type="text" name="check" /><br/>
<input type="submit" value="Ok"/>
</form>

<?php
class Food
{
    public function Meal(array $dishes)
    {
        $flag = 0;
        foreach ($dishes as $dish)
        {
            if ((is_numeric($dish) != 'true')||(preg_match('/\./', $dish))||($dish > 100)||($dish < 0))
            { $flag = 1;}
        }
        if ($flag == 1)
        {
            return "Code Error";
        }
        else
        {
            $numb = 0;
            $dishes = array_count_values($dishes); /*Функция считает кол-во повторяющихся элементов в массиве и
                приписывает эти значения элиментам в качестве ключей */
            while ($key  = current($dishes))
            {   //вычисляем максимальное значение ключа
                if ($numb <= $key)
                {
                    $numb = $key;
                }
                next($dishes);//перемещает указатель массива на один элемент вперед
            }
            return $numb;
        }
    }
}
//альтернативный вариант ввода
/*$obj = new Food();
fwrite(STDOUT, "Dishes: ");
$line = trim(fgets(STDIN));
$line = preg_split("/[\s,]+/", $line);
fwrite (STDOUT, "Ответ:"  .$obj -> Meal($line));
unset($line);*/
if (isset($_POST['check']))
{
    $obj = new Food();
   $arr = $_POST['check'];
   echo "Ввод",'<br/>';
   echo $arr, '<br/>';
   $arr = preg_split("/[\s,]+/", $arr);
   echo "Вывод", '<br/>';
   echo $obj -> Meal($arr);
   unset($arr);
}
?>
</body>
</html>