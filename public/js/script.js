document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("country-form");
    const resultsElement = document.getElementById("results");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const country = document.getElementById("country-select").value;

        resultsElement.innerHTML = `
            <div class="results__loading">
                <p>Carregando dados...</p>
            </div>
        `;

        try {
            const response = await fetch(`/api/covid?pais=${country}`);
            if (!response.ok) throw new Error(`Erro na requisição: ${response.status}`);

            const data = await response.json();
            displayResults(data, country);

            const lastAccessResponse = await fetch(`/api/covid?lastAccess=true`);
            const lastAccess = await lastAccessResponse.json();
            displayLastAccess(lastAccess);
        } catch (error) {
            alert(error);
            resultsElement.innerHTML = `
                <div class="results__error">
                    <p>Erro ao carregar os dados. Tente novamente mais tarde.</p>
                </div>
            `;
        }
    });

    const displayResults = (data, country) => {
        let totalConfirmed = 0;
        let totalDeaths = 0;
        let stateDetails = "";

        if (Array.isArray(data)) {
            data.forEach((item, index) => {
                totalConfirmed += item.Confirmados ?? 0;
                totalDeaths += item.Mortos ?? 0;
                stateDetails += `
                    <li class="state-details__item" ${index == 0 ? "style='margin-top:36px;'" : ""}>
                       <span> ${item.ProvinciaEstado || "Estado desconhecido"}</span> <span>${item.Confirmados ?? 0} </span> <span>${item.Mortos ?? 0} </span>
                    </li>`;
            });
        }

        resultsElement.innerHTML = `
            <div class="results__container">
                <div class="results__left">
                    <div class="results__confirmed">
                        <h2 class="results__title">Resultados para ${country}</h2>
                        <p class="results__text"><strong>Total de casos confirmados:</strong> ${totalConfirmed}</p>
                    </div>
                    <div class="results__highlight">
                        <p class="results__text"><strong>Total de mortes:</strong> ${totalDeaths}</p>
                    </div>
                </div>

                <div class="results__state-details">
                    <ul class="state-details__list">
                    <li class="state-details__list-header">
                        <span>Estado</span>
                        <span>Casos</span>
                        <span>Mortes</span>
                    </li>
                        ${stateDetails || `<li class="state-details__item">Não há dados por estado disponíveis.</li>`}
                    </ul>
                </div>
            </div>
        `;
    };

    const displayLastAccess = (lastAccess) => {
        const footerElement = document.getElementById("footer");
        footerElement.innerHTML = `
            <div class="footer__last-access">
                <p class="access-title">Último acesso: </p> ${lastAccess.pais} em ${new Date(lastAccess.data_hora).toLocaleString()}
            </div>
        `;
    };
});
