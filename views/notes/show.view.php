<?php require base_url('views/partials/head.php') ?>

<?php require base_url('views/partials/nav.php') ?>
<?php require base_url('views/partials/banner.php') ?>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <a href="/notes" type="submit"
               class="rounded-md mb-10 bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Back
            </a>
                <p>
                    <?= htmlspecialchars($note['title']) ?>
                </p>

            <a href="/note/edit?id=<?= $note['id'] ?>" type="submit"
                    class="rounded-md mt-10 bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Edit
            </a>

            <form class="mb-6" method="POST" action="/note">
                <input type="hidden" name="_method" value="DELETE"/>
                <input type="hidden" name="id" value="<?= $note['id'] ?>" >
                <button > Delete  </button>
            </form>

        </div>
    </main>

<?php require base_url('views/partials/footer.php') ?>