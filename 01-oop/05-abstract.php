<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05- Abstract</title>
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
            div {
                padding: 20px;
                width: 100%;
                height: 600px;
                overflow: auto;
                scrollbar-width: none;
            }

            table {
                width: 100%;
                border-collapse: collapse;

                thead {
                    background-color: rgba(17, 8, 102, 0.236);
                    text-align: center;
                    border: 5px solid #0009;


                    th {
                        padding: 30px;
                        border: 1px solid #0009;
                        color: white;
                    }
                }

                tbody {
                    tr {

                        th {
                            color: rgb(175, 224, 253);
                            padding: 10px;
                            border: 1px solid #0009;

                            img {
                                width: 50px;

                            }
                        }

                    }

                }

                tbody th:nth-child(odd) {
                    background-color: rgba(255, 192, 203, 0.3);
                }

                tbody th:nth-child(even) {
                    background-color: rgba(255, 0, 255, 0.8, 0.5);
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
        <h1>05- Abstract</h1>
        <section>
            <?php
            abstract class DataBase
            {
                // Attributes
                protected $host;
                protected $user;
                protected $pass;
                protected $dbname;
                protected $conx;

                // Methods
                public function __construct(
                    $dbname,
                    $host = 'localhost',
                    $user = 'root',
                    $pass = ''
                ) {
                    $this->host   = $host;
                    $this->user   = $user;
                    $this->pass   = $pass;
                    $this->dbname = $dbname;
                }

                public function connect()
                {
                    try {
                        return $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass); 
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
            }

            class Pokemon extends DataBase
            {
            }

            $db = new Pokemon('adso2613934');
            $connection = $db->connect();
            $query = "SELECT * FROM pokemons";
            $results = $connection->query($query);
            
            echo "<div>
            <table>
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Health</th>
                        <th>Image</th>
                    </thead>";
            while ($row = $results->fetch(PDO::FETCH_ASSOC)) {
                echo "<tbody>
                    <th>" . $row['id'] . "</th>
                    <th>" . $row['name'] . "</th>
                    <th>" . $row['type'] . "</th>
                    <th>" . $row['health'] . "</th>
                    <th><img src='images/" . $row["image"] . "' alt='pokemon'/></th>
                </tbody>";
            }
            "</table>
            echo </div>";

            ?>
        </section>
    </main>
</body>

</html>