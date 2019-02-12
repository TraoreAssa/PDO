<?php
namespace model;

class EntityRepository
{
    private $db;
    //data base
    public $table;
    public function getDB() // méthode permettant d'instancier la classe PDO et de créer un objet
    {
        if (!$this->db) // seulement si $this->db n'est pas rempli, il n'y a pas de connexion alors on la construit
        {
            try {
                $xml = simplexml_load_file('app/config.xml'); //simplexml_load_file transforme mon fichier XML en objet
                // echo '<pre>'; var_dump($xml); echo '</pre>';
                $this->table = $xml->table; // on associe le nom de la table du fichier XML a la propriété de la classe, cette propriété nous servira pour toute nos requetes SQL (INSERT INTO $this->table)
                try 
                {
                    $this->db = new \PDO("mysql:dbname=". $xml->db . ";host=" . $xml->host, $xml->user, $xml->password, array(\PDO::ATTR_ERRMODE =>\PDO::ERRMODE_EXCEPTION)); // Connexion a la BDD, si jamais on change de BDD nous n'aurons pas besoin de modifier ce code, c'est un code genéric, c'est le ficher config.xml que l'on modifira
                    // echo '<pre>'; var_dump($this->db); echo '</pre>';
                    // echo '<pre>'; print_r(get_class_methods($this->db)); echo '</pre>';

                } 
                catch (\PDOException $e) { // on entre ici en cas de mauvaise connexion a la BDD
                    die('Problème de connexion BDD' . $e->getMessage());
                }
            } 
            catch (\PDOException $e) {
                die('Problème de fichier XML manquant');
            }
        }
        return $this->db; // on retourne la connexion
    }

    public function getFields()// permettant de recolter les données des champs/colonne de la table, c'est un code générique, on récuperera les données de m'importe quelle table
    {
        $q = $this->getDB()->query("DESC $this->table"); // DESC : decription de la table
        $r = $q->fetchALL(\PDO::FETCH_ASSOC);
        // return $r;
        return array_splice($r,1); // permet de ne pas recuperer le 1er champs idEmploye dans le form, dans la BDD grace a la fonction prédefini array_splice();
    }

    public function selectAll()
    {
        $q = $this->getDB()->query("SELECT * FROM $this->table"); // req permettant de selectionner toute une table, $this->table : représente dans notre cas la table 'employe'
        $r = $q->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }
    public function save()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';
        $q = $this->getDB()->query('REPLACE INTO ' . $this->table . '(id' . ucfirst($this->table) . ',' .  implode(',', array_keys($_POST)). ') VALUES (' . $id . ',' . "'"  . implode("','", $_POST) . "'" . ')');
    }
    // - ucfirst($this->table) --> idEmploye mettre la Maj sur le E
    // - array_keys($_POST) --> permet de recupérer tout les indice du formulaire tout les attributs 'name', c'est unc ode générique, quelque soit le formulaire, nous recupererons les bon indices
    // - implode(',', array_keys($_POST)) --> implode() permet d'extraire tout les indice du formulaire séparé par une virgule
    // -- si l'id est connu en BDD, la req REPLACE se comporte comme un UDAPTE 
    // -- si l'id n'est pas connu en BDD, la req REPLACE se comporte comme un INSERT, ca permet de faire 2 req en une seule 

    public function delete()
    {
        // $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';
        $q = $this->getDB()->query('DELETE' . $this->table);
    }
}

$a = new EntityRepository; 
$a->getDB();
// <!-- 4 -->

