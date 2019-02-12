<?php
// var_dump($donnees);
// echo '<pre>';print_r($fields); echo '</pre>';
?>
<div>
    <a href="?op=add" class="btn btn-larg btn-info"><i class="fas fa-plus"></i> Ajouter une nouvelle donnée</a>
    <br>
</div> <br>
<!-- Faites en sorte  d'avoir 3 colonnes en plus :
    - une colonne permettant de  voir le detail de l'employé
    - une colonne permettant de modifier 
    - une colonne permettant de supprimer
 -->
<!------------------------------ Récuperer les données ------------------------------>
<table class="table table-bordered text-center">

<thead><tr>
    <th>ID</th> 
    <!-- a cause du array_splice permettant de ne pas afficher le champs 1 dans le formulaire d'ajout, on déclare manuellementun entete, sinon décalage  -->
<?php foreach($fields as $colonne):?>
    
    <th>
        <?= $colonne['Field']; ?>
    </th>
    <?php endforeach;?>

<!-- Faites en sorte  d'avoir 3 colonnes en plus :
    - une colonne permettant de  voir le detail de l'employé
    - une colonne permettant de modifier 
    - une colonne permettant de supprimer
 -->
    <th>Afficher le détail</th>
    <th>Modifier</th>
    <th>Supprimer</th>


    
    </tr></thead>
   


    <!----------- Récuperer les données interieur du tableau ----------->
    <?php foreach ($donnees as $value):
    // echo '<pre>';print_r($value); echo '</pre>';
    // $value possede un tableau ARRAY avec les données d'un employé par tour de boucle
    // implode() permet d'extraire les données de chaque tableau ARRAY par employé
    ?>
    <tr>
        <td>
        <?=implode('</td><td>', $value)?>
        </td>
        <td>
        <a href="?op=select&id=<?=$value[$id] ?>"class="text-dark"><i class="fas fa-search"></i></a>
        </td>
        <td>
        <a href="?op=update&id=<?=$value[$id] ?>"class="text-dark"><i class="fas fa-wrench"></i></a>
        </td>
        <td>
        <a href="?op=delete&id=<?=$value[$id] ?>" class="text-dark"><i class="fas fa-trash-alt"></i></a>
        </td>
    </tr>
    <?php endforeach;?>

</table>
