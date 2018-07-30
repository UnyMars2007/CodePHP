<html>
<head>
    <title>gryadki</title>
</head>
<body>
<?php

class Bed
{
    public $result;
    public function emptyС($cell, $dis)
    {
        $flag = 0;
        foreach ($cell as $c)
        {
            if (is_numeric($c) != 'true')
            { $flag = 1;}
        }

        if ((is_numeric($dis) != 'true')||($dis < 0))
            { $flag = 1;}

        if ($flag == 1)
        {
            $result = 'Code Error';
        }
        else
        {
            $result = 0;
            for ($i = 0; $i < (count($cell) - 1); $i++)
            {
                if ($cell[$i] < $cell[$i+1])
                {
                    if (($cell[$i] + $dis) < ($cell[$i + 1] - $dis))
                    {
                    $result = $result + 2;
                    }

                    if (($cell[$i] + $dis) == ($cell[$i + 1] - $dis))
                    {
                    $result++;
                    }
                }
                else
                    {
                        $result = 'Incorrect coordinate input';
                        break;
                    }
            }

        }
        return $result;
    }
}

if(isset($_POST))
{
$obj = new Bed();
$url = json_decode(file_get_contents('php://input'),True);
echo json_encode(['result' => ($obj -> emptyС($url["cells"],$url["distance"]))]);
}

?>
</body>
</html>