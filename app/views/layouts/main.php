<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'PointageTellyteck' ?></title>

    <link rel="stylesheet" href="<?= ASSET_URL ?>/css/output.css">
    <link rel="stylesheet" href="<?= ASSET_URL ?>/css/user.css?v=1">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>
<body class="p-0 m-0">

    <?php if (!empty($_SESSION['flash']['success'])): ?>
        <div class="fixed left-1/2 top-4 z-50 w-[calc(100%-2rem)] max-w-xl -translate-x-1/2 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 shadow">
            <?= htmlspecialchars($_SESSION['flash']['success']) ?>
        </div>
        <?php unset($_SESSION['flash']['success']); ?>
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
    <script src="<?= ASSET_URL ?>/js/navbar.js"></script>
    <script src="<?= ASSET_URL ?>/js/conge_etudiant.js"></script>
    <script src="<?= ASSET_URL ?>/js/qrcode_admin.js"></script>

</body>
</html>
