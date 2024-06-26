<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>04- Inheritance</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
                
            }

            div {
                display: flex;
                position: relative;
                overflow: hidden;
                justify-content: center;

                span {
                    color: white;
                    position: absolute;
                    bottom: -100px;
                    background-color: rgba(3, 10, 88, 0.419);
                    width: 90%;
                    transition: bottom 0.4s ease-out;
                    text-align: center;
                    height: 100px;

                    p {

                        font-size: 10px;
                    }
                }


            }

            div:hover span {
                bottom: 15px;
            }

            div:active span {
                bottom: 15px;
                border: 3px white solid;
            }
        }
    </style>
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
        <h1>04- Inheritance</h1>
        <section>
            <?php
            class Pokemon
            {
                // Attributes
                protected $name;
                protected $type;
                protected $healt;
                protected $img;

                // Methods
                public function __construct($name, $type, $healt, $img)
                {
                    $this->name = $name;
                    $this->type = $type;
                    $this->healt = $healt;
                    $this->img = $img;
                }

                public function attack()
                {
                    return "Attack";
                }
                public function defense()
                {
                    return "Defense";
                }
                public function show()
                {
                    return
                        '<div>
                            <img src="' . $this->img . '" alt="pokemon"/>
                            <span>Stats:
                                <p>' .
                                'Name: ' . $this->name . '<br/>' .
                                'Type: ' . $this->type . '<br/>' .
                                'Health: ' . $this->healt .
                                '</p>
                            </span>
                        </div>';
                }
            }

            class Evolve extends Pokemon
            {
                public function levelUp($name, $type, $healt, $img) {
                
                parent::__construct($name, $type, $healt, $img); // En la función hijo llamamos exactamente el metodo contructor padre

                }
            }

            $pk = new Evolve('Charmander', 'Fire', 150, "images/charmander.png");
            echo $pk->show();
            $pk->levelUp('Charmelon', 'Fire', 250, "images/charmeleon.png");
            echo $pk->show();
            $pk->levelUp('Charizard', 'Fire-Fly', 250, "images/charizard.png");
            echo $pk->show();
            ?>
        </section>
    </main>
</body>

</html>