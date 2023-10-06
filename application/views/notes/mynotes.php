<?php
$idUser = $_SESSION['user_id'];
?>

<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Notas</th>
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cont = 0;
        foreach ($notes as $note) {
            if ($note->id_user === $idUser) {
        ?>
                <tr id="item<?= $note->id ?>">
                    <th scope="row"><?= $cont + 1 ?></th>
                    <td><?= $note->content ?></td>
                    <td><?= $note->creation_date ?></td>
                    <td class="d-flex">
                        <button class="btn btn-outline-warning btn-sm mr-1" id="btn-editar<?= $cont ?>" value="<?= $note->id ?>">Editar</button>
                        <button class="btn btn-outline-danger btn-sm" id="btn-delete<?= $cont ?>" value="<?= $note->id ?>">Borrar</button>
                    </td>
                </tr>
        <?php
                $cont += 1;
            }
        }
        ?>
    </tbody>
</table>
<input type="hidden" name="countnotes" id="countnotes" value="<?= $cont ?>">