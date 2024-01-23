<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Models\Image;
use App\Models\Project;
use App\Utils\File;
use App\Utils\Redirect;
use App\Utils\View;

class ProjectController
{
    public function create()
    {
        View::render('project.create', [
            'categories' => Category::getList()
        ]);
    }

    public function store()
    {

        $project = Project::create([
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        $this->handleImages($project);

        Redirect::to('/project/index', [
            'success' => 'Projet créé avec succès'
        ]);
    }

    public function index()
    {
        $projects = Project::all();
        View::render('project.index', ['projects' => $projects]);
    }
    public function edit($id)
    {
        $project = Project::find($id);
        View::render('project.edit', [
            'project' => $project,
            'categories' => Category::getList()
        ]);
    }

    private function handleImages(Project $project)
    {
        $images = File::cleanUpload($_FILES['images']);

        foreach($images as $image) {
            //Vérification si on a bien une image
            if (!empty($image['name'])&& $image['tmp_name']) {
                $path ='/images/'.$project->id.'/'.$image['name'];
                if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$project->id.'/')) {
                    mkdir($_SERVER['DOCUMENT_ROOT'].'/images/'.$project->id.'/', 0777, true);
                }
                file_put_contents($_SERVER['DOCUMENT_ROOT'].$path, file_get_contents($image['tmp_name']));
                Image::create([
                    'path' => $path,
                    'name' => $image['name'],
                    'project_id' => $project->id,
                ]);
            }
        }
    }

    public function update($id)
    {
        if(empty($_POST['category_id']) || $_POST['category_id'] === 'Sélectionner une catégorie') {
            Redirect::to('/project/'.$id.'/edit', [
                'error' => 'Veuillez sélectionner une catégorie',
            ]);
        }

        $project = Project::find($id);
        $this->handleImages($project);

        Project::update($id,
            [
            'title' => $_POST['title'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'description' => $_POST['description'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);
        Redirect::to('/project/index', [
            'success' => 'Projet modifié avec succès !'
        ]);

    }

    public function deleteProject($id)

    {
        $project = Project::find($id);
        $projectId = $project->project_id;
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $project->path)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $project->path);
        }
        Project::deleteProject($id);
        Redirect::to('/project/index', [
            'success' => 'Projet supprimé avec succès !'
        ]);

    }
}