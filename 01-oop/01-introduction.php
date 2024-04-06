<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>01- Introduction</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <nav class="controls">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff" d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM231 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L376 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-182.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L119 273c-9.4-9.4-9.4-24.6 0-33.9L231 127z" />
            </svg>
        </a>
    </nav>
    <main>
        <form action="" method="post">
            <label>
                <p>Number 1:</p>
                <input type="range" name="n1" step="1" value="0" oninput="o1.value=this.value">
                <output id="o1">0</output>
            </label>

            <label>
                <p>Number 2:</p>
                <input type="range" name="n2" step="1" value="0" oninput="o2.value=this.value">
                <output id="o2">0</output>
            </label>
            <button> Calc</button>
        </form>
        <div class="result">
            <?php
            if ($_POST) {
                $sum = new Adition();
                $sum->num1 = $_POST['n1'];
                $sum->num2 = $_POST['n2'];
                echo "<br>La suma de {$sum->num1} y {$sum->num2} es: " . $sum->getResult();
            }
            ?>
        </div>
    </main>
</body>

</html>

<?php
# Linar Programing
$num1 = 54;
$num2 = 32;

echo "<br>";
echo "{$num1} * {$num2} = " . ($num1 * $num2);
echo "<br>";

$string = "Hello";

echo " MD5({$string} = " . md5($string);
echo "<br>";
echo "PASSWORD_HASH({$string}) = " . password_hash($string, PASSWORD_DEFAULT);
echo "<br>";

$hash = password_hash($string, PASSWORD_DEFAULT);

if (password_verify($string, $hash)) {
    echo "Verifed Successful";
}


# Structured Programming

function adition($num1, $num2 = 7)
{
    return ($num1 + $num2);
}

$rs = adition(34, 890);
echo "<br>" . $rs . "<br>";
$rs = adition(89);
echo $rs;


# Object Oriented Programming

class Adition
{
    public $num1;
    public $num2;

    public function getResult()
    {
        return ($this->num1 + $this->num2); # hay que fijarse en los signos $ al momento de llamar a las variables
    }
}
$sum = new Adition();
$sum->num1 = 1024;
$sum->num2 = 512;
echo "<br>La suma de {$sum->num1} y {$sum->num2} es: " . $sum->getResult();

?>