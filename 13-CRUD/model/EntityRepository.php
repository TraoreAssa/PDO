<?php
namespace model;
// Dans ce ficher nous allons faire les connexion a la BDD (SELECT, INSERT, REMPLACE, DELETE) les fonctions sont aussi dans le CONTROLLER
class EntityRepository
{
    private $db;
    //data base
    public $table;
    public function getDb() // méthode permettant d'instancier la classe PDO et de créer un objet
    {
        if (!$this->db) // seulement si $this->db n'est pas rempli, il n'y a pas de connexion alors on la construit
        {
            //------------------------ CONNEXION AVEC LE XML ------------------------
            try {
                $xml = simplexml_load_file('app/config.xml'); //simplexml_load_file transforme mon fichier XML en objet
                // echo '<pre>'; var_dump($xml); echo '</pre>';
                $this->table = $xml->table; // on associe le nom de la table du fichier XML a la propriété de la classe, cette propriété nous servira pour toute nos requetes SQL (INSERT INTO $this->table)
                try 
                    //------------------------ CONNEXION AVEC LA BDD ------------------------
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
                die('Problème de fichier XML manquant'. $e->getMessage());
            }
        }
        return $this->db; // on retourne la connexion
    }

    //------------------------------------------ RECOLTE LES DONNEES des champs/colonne ------------------------------------------ 
    

    public function getFields()// permettant de recolter les données des champs/colonne de la table, c'est un code générique, on récuperera les données de m'importe quelle table
    {
        $q = $this->getDb()->query("DESC $this->table"); // DESC : decription de la table
        $r = $q->fetchALL(\PDO::FETCH_ASSOC);
        // return $r;
        return array_splice($r,1); // permet de ne pas recuperer le 1er champs idEmploye dans le form, dans la BDD grace a la fonction prédefini array_splice();
    }
/************ AFFICHE TOUT ... ************/
    public function selectAll()
    {
        $q = $this->getDb()->query("SELECT * FROM " . $this->table); // req permettant de selectionner toute une table, $this->table : représente dans notre cas la table 'employe'
        $r = $q->fetchAll(\PDO::FETCH_ASSOC);
        return $r;
    }

/************ AJOUTER ET MODIFIER (REMPLACE si id est n'est pas nul) ************/
    public function save()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 'NULL'; // verifie si id n'est pas nul pour ajouter ou motifier
        $q = $this->getDB()->query('REPLACE INTO ' . $this->table . '(id' . ucfirst($this->table) . ',' .  implode(',', array_keys($_POST)). ') VALUES (' . $id . ',' . "'"  . implode("','", $_POST) . "'" . ')');
    }

/************ AFFICHER UN .... ************/
    public function select($id) // Méthode permetant de recuperer les données d'un employe via id
    {
        $q = $this->getDb()->query("SELECT * FROM " . $this->table . " WHERE id" . ucfirst($this->table) . "=" . (int) $id);
        $r = $q->fetch(\PDO::FETCH_ASSOC);
        return $r;
    }
    // - ucfirst($this->table) --> idEmploye mettre la Maj sur le E
    // - array_keys($_POST) --> permet de recupérer tout les indice du formulaire tout les attributs 'name', c'est unc ode générique, quelque soit le formulaire, nous recupererons les bon indices
    // - implode(',', array_keys($_POST)) --> implode() permet d'extraire tout les indice du formulaire séparé par une virgule
    // -- si l'id est connu en BDD, la req REPLACE se comporte comme un UDAPTE 
    // -- si l'id n'est pas connu en BDD, la req REPLACE se comporte comme un INSERT, ca permet de faire 2 req en une seule 

/************ SUPPRIMER ************/
    public function delete($id)
    {
        $q = $this->getDb()->query("DELETE FROM " . $this->table . " WHERE id" . ucfirst($this->table) . '=' . (int) $id);
    }
}

$a = new EntityRepository; 
$a->getDb();


