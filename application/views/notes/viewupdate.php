<form id="update-form" class="d-flex flex-column w-100 mt-3 mb-3">
    <input type="hidden" name="idnote" id="idnote" value="<?= $note->id ?>">
    <input type="text" name="content" id="content" placeholder="Ingresa una nueva nota" class="w-100 mb-2 pt-4 pb-4 pr-3 pl-3 form-control" value="<?= $note->content ?>" required>
    <div class="d-flex">
        <input type="date" name="creation-date" id="creation-date" class="w-75 mr-2 pt-4 pb-4 pr-3 pl-3 form-control" value="<?= $note->creation_date ?>" required>
        <button class="btn btn-primary w-auto pr-5 pl-5 mr-2">Editar</button>
        <a href="" class="btn btn-secondary d-flex align-items-center">Cancelar</a>
    </div>
</form>