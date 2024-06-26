<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03- visibility</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            }

            table {
                border-collapse: collapse;

                tr {
                    td {
                        background-color: rgba(116, 41, 3, 0.365);
                        padding: 8px;
                        border: 1px solid #8e8383;
                        color: white;
                    }

                    /* Para pintar una tabla con los impares
                    td:nth-child(odd) {
                        background-color: red;
                    }
                    para pintar los pares
                    td:nth-child(even) {
                        background-color: green;
                    }*/
                }

                tr:nth-child(even) {
                    background-color: rgba(58, 244, 182, 0.246);
                }
            }

            form {
                border: 2px solid #fff6;
                background-color: #fff3;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                padding: 10px;
                width: 300px;

                label {
                    display: flex;
                    justify-content: space-between;
                    gap: 1.4rem;
                }

                output {
                    font-size: 1.4rem;
                }

                button {
                    background-color: #994bde;
                    border: 2px solid #fff6;
                    border-radius: 8px;
                    color: #fff9;
                    cursor: pointer;
                    font-size: 1rem;
                    width: 300px;
                    padding: 1rem;
                }

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
        <h1>03- visibility</h1>
        <section>
            <?php
            class tableMaker
            {
                // Atributes
                private $nr; // Number of Rows
                private $nc; // Number of Columns

                // Methods
                public function __construct($nr, $nc)
                {
                    $this->nr = $nr;
                    $this->nc = $nc;
                }

                public function drawTable()
                {
                    echo $this->startTable();
                    echo $this->contentTable();
                    echo $this->endTable();
                }

                private function startTable()
                {
                    return '<table>';
                }

                private function contentTable()
                {
                    $content = "";
                    for ($i = 0; $i < $this->nr; $i++) {
                        $content .= "<tr>";
                        for ($j = 0; $j < $this->nc; $j++) {
                            $content .= "<td>" . $i . "-" . $j. "</td>";
                        }
                        $content .= "</tr>";
                    }
                    return $content;
                }

                private function endTable()
                {
                    return '</table>';
                }
            }
            if (isset($_POST['nr']) && isset($_POST['nc'])) {
                $rows = $_POST['nr'];
                $columns = $_POST['nc'];
                $table = new tableMaker($rows, $columns);
                $table->drawTable();
            }
            ?>

            <h2>Table Maker</h2>
            <form action="" method="post">
                <label>
                    <p>Rows:</p>
                    <input type="range" name="nr" min="1" max="20" step="1" value="1" oninput="o1.value=this.value">
                    <output id="o1">0</output>
                </label>

                <label>
                    <p>Columns:</p>
                    <input type="range" name="nc" min="1" max="20" step="1" value="1" oninput="o2.value=this.value">
                    <output id="o2">0</output>
                </label>
                <button>Make Table</button>
            </form>
        </section>
    </main>
</body>

</html>