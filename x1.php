<?php
class SocksMachine
{
    public function countUnpaired(array $socks)
    {
        $flag = 0;
        foreach ($socks as $sock)
        {
            if ((is_numeric($sock) != 'true')||(preg_match('/\./', $sock))||($sock > 1000)||($sock < 0))
            { $flag = 1;}
        }
        if ($flag == 1)
        {
            return "Code Error";
        }
        else
            {
                $numb = 0;
                $socks = array_count_values($socks); /*Функция считает кол-во повторяющихся элементов в массиве и
                приписывает эти значения элиментам в качестве ключей */
                while ($key  = current($socks))
                {
                    if ($key == '1')
                    {
                        $numb++;
                    } //считаем количество ключей-единиц
                    next($socks);//перемещает указатель массива на один элемент вперед
                }
        return $numb;
            }
    }
}
//для проверки
$obj = new SocksMachine();
fwrite(STDOUT, "Socks: ");
$line = trim(fgets(STDIN));
$line = preg_split("/[\s,]+/", $line);
fwrite (STDOUT, "Ответ:"  .$obj -> countUnpaired($line));
unset($line);
?>