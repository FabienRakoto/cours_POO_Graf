<h1>Administrer les articles</h1>

<p>
    <a href="?page=posts.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
        <tr>
          <td>ID</td>
          <td>Titre</td>
          <td>Actions</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= $post->id; ?></td>
            <td><?= $post->titre; ?></td>
            <td>
                <a class="btn btn-primary" href="?page=admin.posts.edit&id=<?= $post->id; ?>">Editer</a>
                <form action="?page=add.delete" method="post" style="display: inline">
                    <input type="hidden" name="id" value="<?= $post->id ?>">
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
