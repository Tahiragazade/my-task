<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function task1()
    {

        for($i = 1; $i <= 30; $i++) {
            if($i % 5 == 0 && $i % 3 == 0) {
                echo "divisible by three and five"."<br>";
            } elseif($i % 3 == 0) {
                echo "divisible by three"."<br>";
            } elseif($i % 5 == 0) {
                echo "divisible by five"."<br>";
            } else {
                echo $i."<br>";

            }
        }
    }

    public function task2()
    {
        $array = [
            1,
            [2, 3],
            [4, [5, 6]],
            [7, [8, [9, 10]]]
        ];

        $result = self::recursiveSum($array);
        echo $result;
    }

    public function task3()
    {
        $books = [
            "Learning PHP" => "John Smith",
            "Understanding relational databases" => "Mary Little",
            "Freelancers" => "Robin Round",
            "I love LISP" => "Mary Little",
            "Python for dummies" => "John Smith",
        ];
        $result = [];
        foreach($books as $book => $author) {
            if(!isset($result[$author])) {
                $result[$author] = [];
            }

            $result[$author][] = $book;
        }
        return $result;
    }

    public function task4()
    {
        $data = '';

        $numeric = function($input) use (&$data) {
            if(is_numeric($input)) {
                $data .= $input;
            }
        };

        $numeric('1');
        $numeric('a');
        $numeric('0');

        return $data;
    }

    public function task5()
    {
        $str1 = 'yabadabadoo';
        $str2 = 'yaba';
        echo "<a href='https://www.php.net/manual/en/function.strpos.php'>reference</a><br>";
        echo "if it finds st1 then returns an integer value (position). so we have to check when it is not contain string<br>";
        if(strpos($str1, $str2) !== false) {
            echo "\"".$str1."\" contains \"".$str2."\"";
        } else {
            echo "\"".$str1."\" does not contain \"".$str2."\"";
        }
    }

    public function task6()
    {
        $rows = 6;

        for($i = 1; $i <= $rows; $i++) {
            for($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }

        for($i = $rows - 1; $i >= 1; $i--) {
            for($j = 1; $j <= $i; $j++) {
                echo "* ";
            }
            echo "<br>";
        }

    }

    public function task7()
    {
        $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $max = $array[0];
        foreach($array as $num) {
            if($num > $max) {
                $max = $num;
            }
        }

        return $max;
    }
    public function task8(){
        $input=5;
        echo "&nbsp;&nbsp;&nbsp;";
        for($i=1;$i<=$input;$i++){
            echo $i.' ';
        }
        echo '<br>';
        for($i=1;$i<=$input;$i++){
            echo $i.' ';
            for($j=1;$j<=$input;$j++){
                echo $i*$j.' ';
            }
            echo '<br>';
        }
    }
    public function task9(){
        $scores = [
            "John" => [7, 8, 7],
            "Sue" => [10, 8, 4],
            "Tommy" => [8, 8, 7],
            "Mary" => [7, 6, 6]
        ];
        $averages = [];
        $places = [];

        foreach ($scores as $player => $values) {
            // in previous version it divides only $values[2] to 3
            $averages[$player] = ($values[0] + $values[1] + $values[2]) / 3;
        }

        arsort($averages);

        $place = 0;
        $lastscore = null;

        foreach ($averages as $player => $average) {
            // if we use "=" here it wont check it and take that as true
            if ($lastscore != null && $lastscore == $average) {
                echo sprintf("Place %s (tie) - %s<br>", $place, $player);
            } else {
                $place++;
                echo sprintf("Place %s - %s<br>", $place, $player);
            }
            $lastscore = $average;
        }

    }

    public static function recursiveSum($array)
    {
        $sum = 0;

        foreach($array as $item) {
            if(is_array($item)) {
                $sum += self::recursiveSum($item);
            } else {
                $sum += $item;
            }
        }

        return $sum;
    }

}
