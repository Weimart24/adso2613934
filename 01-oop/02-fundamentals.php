<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>02- fundamentals</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 1px;

            h2 {
                margin: 0;
            }

            figure {
                font-size: 4rem;
            }
        }

        /* Estilos de los botones */
        .botton {
            display: flex;
            justify-content: center;
        }

        .botton button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s ease-in;
        }

        /* Estilos para el botón RUN */
        .botton button:nth-child(1) {
            background-color: #0072CE;
            /* Azul */
            color: #FFFFFF;
            /* Blanco */

            &:is(:hover) {
                background-color: #093ABD;
                transform: scale(1.05);
            }
        }

        /* Estilos para el botón STOP */
        .botton button:nth-child(2) {
            background-color: #FF0000;
            /* Rojo */
            color: #FFFFFF;
            /* Blanco */

            &:is(:hover) {
                background-color: #AD1010;
                transform: scale(1.05);
            }
        }

        /* Estilos para el botón JUMP */
        .botton button:nth-child(3) {
            background-color: #FFCB05;
            /* Amarillo */
            color: #000000;
            /* Negro */

            &:is(:hover) {
                background-color: #EAA506;
                transform: scale(1.05);
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
        <h1>02- Fundamentals</h1>
        <section>
            <figure>
                <?php
                class Runner
                {
                    // Attributes
                    private $name;
                    private $age;
                    private $number;

                    // Methods
                    public function __construct($name, $age, $number)
                    {
                        $this->name   = $name;
                        $this->age    = $age;
                        $this->number = $number;
                    }

                    public function run()
                    {
                        echo '<img src="img/sonicRun.gif" alt="sonic" width="300" height="250">';
                    }

                    public function stop()
                    {
                        echo '<img src="img/sonicStop.png" alt="sonic" width="300" height="250">';
                    }

                    public function jump()
                    {
                        echo '<img src="img/sonicJump.gif" alt="sonic" width="300" height="250">';
                    }
                }

                $runner = new Runner('Sonic', '4', '24');
                if (isset($_POST['action'])) {
                    switch ($_POST['action']) {
                        case 'run':
                            $runner->run();
                            break;
                        case 'stop':
                            $runner->stop();
                            break;
                        case 'jump':
                            $runner->jump();
                            break;
                        default:
                            break;
                    }
                } else {
                    $runner->stop();
                }

                ?>
            </figure>
            <!-- Aquí cre los botones de acciones -->
            <div class="botton">
                <form action="" method="post">
                    <button type="submit" name="action" value="run">RUN</button>
                    <button type="submit" name="action" value="stop">STOP</button>
                    <button type="submit" name="action" value="jump">JUMP</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>