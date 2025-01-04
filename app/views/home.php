<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casos de Covid - Kidopi</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1 class="header__title">Casos de Covid por País</h1>
        </header>

        <form id="country-form" class="form">
            <label for="country-select" class="form__label">Escolha um país:</label>
            <select id="country-select" name="country" class="form__select">
                <option value="Brazil">Brazil</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
            </select>
            <button type="submit" class="form__button">Buscar</button>
        </form>

        <div id="results" class="results">
            <h2 class="results__title">Resultados:</h2>
            <p class="results__message">Escolha um país para ver os dados.</p>
        </div>

        <div id="modal" class="modal">
            <div class="modal__content">
                <span class="modal__close-btn">&times;</span>
                <h2 class="modal__header">Dados do Covid</h2>
                <div id="modal-content"></div>
            </div>
        </div>
    </div>

    <script src="/public/js/script.js"></script>
</body>
</html>
