<?php
// echo '<pre>';print_r($fields); echo '</pre>';
// on passe en revue les champs récupérés via le Controller, et on crée un champs pas tour de boucle, en fonction de la table (employe)
?>

<form action="" method="post" class="col-md-6 offset-md-3 text-center">
    <?php foreach($fields as $value):?>

        <div class="form-group">
            <label for="<?=$value['Field'] ?>"><?=$value['Field'] ?></label>
            <input type="text" class="form-control" name="<?=$value['Field'] ?>" id="<?=$value['Field'] ?>" aria-describedby="<?=$value['Field'] ?>" placeholder="<?=$value['Field'] ?>">
        </div>

    <?php endforeach;?>

    <input type="submit" class="col-md-12 btn btn-dark mb-2">
</form>



<?php
// echo '<pre>';print_r($fields); echo '</pre>';
?>