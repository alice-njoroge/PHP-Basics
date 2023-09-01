<?php require base_url('views/partials/head.php') ?>

<?php require base_url('views/partials/nav.php') ?>
<?php require base_url('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <a href="/notes" type="button"> Back </a>
                <p>
                    <?= htmlspecialchars($note['title']) ?>
                </p>
        </div>
    </main>

<?php require base_url('views/partials/footer.php') ?>