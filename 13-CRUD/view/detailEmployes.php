<?php
// var_dump($donnees);
echo '<pre>';print_r($donnees); echo '</pre>';
echo '<pre>';var_dump($donnees); echo '</pre>';
?>
<!------------------------------ Récuperer les données ------------------------------>
<table class="table table-bordered text-center">

<thead><tr>

    <th>IdEmploye</th> 

    <?php foreach($fields as $colonne):?>
    
    <th>
        <?= $colonne['Field']; ?>
    </th>
    <?php endforeach;?>

    <th>
        Modifier
    </th>
    <th>
        Supprimer
    </th>
 
    </tr></thead>
   
    <!----------- Récuperer les données interieur du tableau ----------->
    <?php foreach ($donnees as $value):
    var_dump($value);
    ?>
       <td>
        <?=$value?>
        </td>
    <?php endforeach;?>
    <td>
        <a href="?op=update&id=<?=$donnees[$id] ?>" class="text-dark"><i class="fas fa-wrench"></i></a>
    </td>
    <td>
        <a href="?op=delete&id=<?=$donnees[$id] ?>" class="text-dark"><i class="fas fa-trash-alt"></i></a>
    </td>

</table>

<!-- Autre presentation d'affichage-->

<ul class="col-md-4 offset-md-4 list-group texte-center mb-4">
<?php foreach ($donnees as $key=> $value):?>
<li class="list-group-item text-center"><?=$value?></li>

<?php endforeach;?>

</ul>
