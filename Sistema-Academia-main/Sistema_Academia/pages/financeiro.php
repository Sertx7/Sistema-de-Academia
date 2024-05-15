<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro</title>
    <link rel="stylesheet" href="../styles/financeiro.css">
</head>
<body>
    <div class="financeiro">
        <header>
            <h1>Financeiro</h1>
        </header>
        <main>
            <?php require_once '../php/financeiroSQL.php'; ?>
        </main>
        <footer>
            <p>&copy; 2024 FitFast Academia</p>
        </footer>
    </div>
    <script src="../functions/financeiro.js"></script>
</body>
</html>