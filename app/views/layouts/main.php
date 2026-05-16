<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'PointageTellyteck' ?></title>

    <link rel="stylesheet" href="<?= ASSET_URL ?>/css/output.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-0 m-0">

    <?php if (!empty($_SESSION['flash']['success'])): ?>
        <div class="fixed left-1/2 top-4 z-50 w-[calc(100%-2rem)] max-w-xl -translate-x-1/2 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 shadow">
            <?= htmlspecialchars($_SESSION['flash']['success']) ?>
        </div>
        <?php unset($_SESSION['flash']['success']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['flash']['error'])): ?>
        <div class="fixed left-1/2 top-4 z-50 w-[calc(100%-2rem)] max-w-xl -translate-x-1/2 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700 shadow">
            <?= htmlspecialchars($_SESSION['flash']['error']) ?>
        </div>
        <?php unset($_SESSION['flash']['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['flash']['reset_link'])): ?>
        <div class="fixed left-1/2 top-24 z-50 w-[calc(100%-2rem)] max-w-2xl -translate-x-1/2 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-900 shadow">
            <p class="font-semibold">Lien temporaire de réinitialisation</p>
            <a class="mt-2 block break-all text-blue-700 underline" href="<?= htmlspecialchars($_SESSION['flash']['reset_link']) ?>">
                <?= htmlspecialchars($_SESSION['flash']['reset_link']) ?>
            </a>
        </div>
        <?php unset($_SESSION['flash']['reset_link']); ?>
    <?php endif; ?>

    <?= $content ?>

</body>
</html>
