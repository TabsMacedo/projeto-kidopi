<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/public/img/faviconkidopi.ico" type="image/x-icon">
    <title>Painel Informativo - Covid</title>
    <link rel="stylesheet" href="/public/css/reset.css">
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>
    <header class="header">
        <div class="header__logo">
            <img src="/public/img/logo_kidopi.png" alt="Logo Kidopi">
            <h1 class="hero__title">Painel Informativo sobre o Coronavírus</h1>
        </div>
        <nav class="header__nav">
            <a href="/" class="header__nav-link" role="button">Painel Geral</a>
        </nav>
    </header>

    <main class="main">
        <section class="hero">
            <p class="hero__subtitle">Monitore casos, recuperações e mortes em diferentes países e regiões do mundo.</p>
            <form id="country-form" class="form" aria-label="Formulário de seleção de país">
                <div class="form__group">
                    <label for="country-select" class="form__label">Escolha um país para obter informações
                        detalhadas:</label>
                    <select id="country-select" name="country" class="form__select" aria-label="Lista de países">
                        <option value="Brazil">Brasil</option>
                        <option value="Canada">Canadá</option>
                        <option value="Australia">Austrália</option>
                    </select>
                    <button type="submit" class="form__button"
                        aria-label="Buscar dados do país selecionado">Buscar</button>
                </div>
            </form>
        </section>

        <section id="results" class="results" aria-live="polite">
            <div id="state-province-details" class="results__state-details">
                <ul class="results__state-details-list"></ul>
            </div>
        </section>
    </main>

    <footer id="footer" class="footer">
        <p class="footer__text">Dados atualizados regularmente. Fonte: Organização Mundial da Saúde (OMS).</p>
    </footer>

    <script src="/public/js/script.js"></script>
</body>

</html>