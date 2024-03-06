<?php

abstract class Databases {
    // Atributes
    protected $host;
    protected $user;
    protected $pass;
    protected $dbname;
    protected $conx;

    // Methods
    public function __construct($dbname, $host='localhost', $user='root', $pass='') {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }

    public function connect() {
        try {
            $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully 😊<br>";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    abstract public function getAllPokemon();
}

class Pokemon extends Databases {
    public function getAllPokemon() {
        try {
            $stmt = $this->conx->prepare("SELECT * FROM pokemons");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$db = new Pokemon('adso2613934');
$db->connect();
$pokemonList = $db->getAllPokemon();
echo "<pre>";
print_r($pokemonList);
echo "</pre>";

?>
