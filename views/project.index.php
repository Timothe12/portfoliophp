<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-between align-items-center mt-3 fontProject">
            <h4>LISTE DES PROJETS</h4>
            <a href="/project/create" class="btn btnCustom">
                <i class="fa fa-plus me-2"></i>
                Créer un nouveau projet
            </a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table class="table table-stripped table-bordered">
                <thead class="table-dark">
                <tr>
                    <td>ID</td>
                    <td>Titre</td>
                    <td>Catégorie</td>
                    <td>Date</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php \Carbon\Carbon::setLocale('fr'); ?>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->id ?></td>
                    <td><?= $project->title ?></td>
                    <td><?= \App\Enums\Category::getDescription($project->category_id) ?></td>
                    <td><?= \Carbon\Carbon::parse($project->date)->diffForHumans() ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="/project/<?= $project->id ?>/edit">
                            <i class="fa fa-edit me-2"></i>Modifier
                        </a>
                        <a href="/project/<?= $project->id ?>/deleteProject" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash-can"></i> Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>