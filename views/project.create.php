<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 fontProject">
            <h4>CREATION DE PROJETS</h4>
        </div>
    </div>
    <form action="/project/store" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label" for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="date">Date de réalisation</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="category_id">Catégorie</label>
                <select class="form-select" name="category_id">
                    <option>Sélectionner une catégorie</option>
                    <?php
                    /** @var array $categories */
                    foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['label'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="images" class="form-label">Sélectionner des images</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btnCustom">Enregistrer</button>
            </div>
        </div>
    </form>
</div>