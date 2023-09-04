<?php view( 'partials/head.php') ?>
<?php view('partials/nav.php') ?>
<?php require base_url('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <p class= "ml-60 mb-10">
                <a href="notes/create" class="text-green-500 hover:underline"> Create a note</a>
            </p>
            <ul>
                <?php foreach ($notes as $note): ?>
                    <li>
                        <a href="note?id= <?= $note['id'] ?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['title']) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>

<?php view('partials/footer.php') ?>