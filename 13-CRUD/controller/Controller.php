<?php
namespace Controller;

class Controller
{
    private $db;
    public function __construct()
    {
        $this->db = new \model\EntityRepository; // permet de récuperer une connexion a la BDD qui se trouve dans le fichier EntityRepository.php
    }    
    public function handlerRequest() // permet de savoir ce que l'internaute demande (afficher/modifier/supprimer), action de l'internaute 
    {
        try
        {
            $op = isset($_GET['op']) ? $_GET['op'] : NULL; // si op est definie dans l'URL, on le recupere, on le stock dans $op sinon, si rien n'est definie dans l'URL,on stock NULL dans $op
            if ($op == 'add' || $op == 'update') $this->save($op); // si on ajoute ou modifie un employé, on appel la méthode save();
            elseif($op == 'select')$this->select(); // si on selectionne un employé, on appel la méthode selcet();
            elseif($op == 'delete')$this->delete(); // si on supprime un employé, on appel la méthode delete();
            else $this->selectAll(); // permettra d'afficher l'ensemble des employés();  
        }
        catch(Exception $e)
        {
            throw new Exception($e->getMassage());// permet d'afficher un message en cas d'erreur
            
        }
    }   
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
    // $this->render('layout.php', 'donnees.php', 'parametres' );
    public function render($layout, $template, $parameters = array())// sert a tout prendre et revoyer sur l'index
    {
        extract($parameters);// permet d'avoir mes paramettres dans une variable
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
    public function save($op)
    {
        $title = $op;
        if($_POST)
        {
            $r = $this->db->save(); // lorque l'on valide le formulaire d'ajout, on execute la methode save() du fichier EntityRepository .
        }
        $this->render('layout.php', 'donnees-form.php', array(
            "title"=>"Données : $title ", 
            "op"=>$op, 
            "fields" =>$this->db->getFields() // cest ce qui va nous permettre de recuperer le nom des champs pour les définir de facon générique
        ));
    }
    public function select()
    {
        if($_POST)
        {
            $r = $this->db->select();
        }
        $this->render('layout.php', 'donnees-form.php', array(
            // "title"=>"Données : $title ", 
            "op"=>$op, 
            "fields" =>$this->db->selectAll()
        ));
    }

    public function delete()
    {
        if($_POST)
        {
            $r = $this->db->delete(); 
        }
        $this->render('layout.php', 'donnees-form.php', array(
            "title"=>"Données : $title ", 
            "op"=>$op, 
            "fields" =>$this->db->delete()
        ));
    }
}
//
