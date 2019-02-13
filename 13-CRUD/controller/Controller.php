<?php
namespace Controller;
// EXECUTION DES FONCTIONS (qui sont dans EntityRepository qu'ont rappel pour les fonctionnalité d'affichage  )
class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \model\EntityRepository; // permet de récuperer une connexion a la BDD qui se trouve dans le fichier EntityRepository.php
    }    
    public function handlerRequest() // permet de savoir ce que l'internaute demande (afficher/modifier/supprimer), action de l'internaute 
    {
        // Action de l'internaut! (afficher/modifier/supprimer) si...
        try
        {
            $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si op est definie dans l'URL, on le recupere, on le stock dans $op sinon, si rien n'est definie dans l'URL,on stock NULL dans $op
            if ($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employé, on appel la méthode save();
            elseif($op == 'select')$this->select(); // si on selectionne un employé, on appel la méthode select();
            elseif($op == 'delete')$this->delete(); // si on supprime un employé, on appel la méthode delete();
            else $this->selectAll(); // permettra d'afficher l'ensemble des employés();  
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMassage());// permet d'afficher un message en cas d'erreur
            
        }
    }   
    
    //------------------------------------------ AFFICHER SUR L'INDEX ------------------------------------------ 

    // $this->render('layout.php', 'donnees.php', 'parametres' );
    public function render($layout, $template, $parameters = array())// sert a tout prendre et revoyer sur l'index
    {
        extract($parameters);// permet d'avoir mes paramettres (des tableau en) dans une variable
        ob_start(); //commence la temporisation, ob_start()demarrer la temporisation de sortie

        // require "view/donnees.php";
        require "view/$template";
        # $content = require "view/$template";
        
        $content = ob_get_clean(); // tout ce qui se trouve dans $template sera stocké dans $content
        # $content = "view/$template"; 

        ob_start(); //temporiser la sortie de l'affichage
        require "view/$layout";
        return ob_end_flush(); // permet de liberer l'affichage et fait tout apparaitre sur la page
    }

    //------------------------------------------ REDIRIGE VERS  ------------------------------------------ 
    public function redirect($url)// methode permettant d'effectuer un redirection
    {
        header("Location:" . $url); // fonction prédefinie permettant d'effectuer une redirection
    }

   
    
    //------------------------------------------ AFFICHER TOUT EMPLOYES ------------------------------------------
    public function selectAll()
    {
    // echo 'Methode selectAll()';
    // $r = $this->db->selectAll();
    // echo '<pre>';print_r($r); echo '</pre>';
 
        $this->render('layout.php', 'donnees.php', array(
            'title'=>'Toute les données', // $title  dans l'index
            'donnees'=>$this->db->selectAll(), // $donnees dans l'index
            'fields' =>$this->db->getFields(),
            'id' => 'id' . ucfirst($this->db->table)// affiche idEmployes, cela servira a pointé sur l'indice idEmploye du tableau de données envoyer dans le layout pour les lien voir/modifier/supprimer
        ));
 
 
     }
    //------------------------------------------ AFFICHER UN EMPLOYE  ------------------------------------------ 

    public function select()
    {
    $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';
               
        $this->render('layout.php', 'detailEmployes.php', array(
            "title"=>"Détail de l'employé : $id", 
            "fields" =>$this->db->getFields(),
            'donnees'=>$this->db->select($id),
            'id' => 'id' . ucfirst($this->db->table)

        ));
    }
    //------------------------------------------ AJOUTER OU MOTIFIER  ------------------------------------------ 
    public function save($op)
    {
        $title = $op;

        $id = isset($_GET['id']) ? $_GET['id'] : 'NULL'; // permet de savoir si un id a été envoyé dans l'URL, si on clique sur 'modifier' on envoi l'id dans l'URL et on le recupere, sinon c'est un ajout

        $values = ($op == 'update') ? $this->db->select($id) : ''; // si on a envoyé un id dans l'URL, on l'envoi en argument de la méthode select() de EntityRepository, cela permettra de selectionner toute les données de l'employé pour les modification.

        //$value = ($op == 'add') ? $this->db->select($id) : ''; 
        //var_dump($values);

        if($_POST)
        {
            $r = $this->db->save(); // lorque l'on valide le formulaire d'ajout, on execute la methode save() du fichier EntityRepository .
            $this->redirect('index.php');
        }
        $this->render('layout.php', 'donnees-form.php', array(
            "title"=>"Données : $title ", 
            "op"=>$op, 
            'donnees'=>$this->db->selectAll(),
            "fields" =>$this->db->getFields(), // cest ce qui va nous permettre de recuperer le nom des champs pour les définir de facon générique
            "values" => $values // recuperer toute les donnée de l'employé en cas de modif
        ));
        
    }

    //------------------------------------------ SUPPRIMER  ------------------------------------------ 
    public function delete()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : 'NULL';
        $r = $this->db->delete($id);
        $this->redirect('index.php');
 
    }
   
  
}
/* 
    title => $title dans layout;
    fields => $fields dasn tout mes fichiers(permet de recuperer les nom de colonne de la BDD);
    donnees => $donnees


*/


