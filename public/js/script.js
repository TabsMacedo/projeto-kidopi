document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("country-form");
    const resultsElement = document.getElementById("results");

    resultsElement.innerHTML = "<p>Escolha um país para ver os dados.</p>";

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const country = document.getElementById("country-select").value;

        resultsElement.innerHTML = "<p>Carregando dados...</p>";

        try {
            const response = await fetch(`https://dev.kidopilabs.com.br/exercicio/covid.php?pais=${country}`);
            if (!response.ok) throw new Error(`Erro na requisição: ${response.status}`);

            const data = await response.json();
            displayResults(data, country);
        } catch (error) {
            console.error("Erro ao carregar os dados:", error);
            resultsElement.innerHTML = "<p>Erro ao carregar os dados. Tente novamente mais tarde.</p>";
        }
    });

    const displayResults = (data, country) => {
        let totalConfirmed = 0;
        let totalDeaths = 0;
        let stateDetails = "";

        Object.values(data).forEach(item => {
            totalConfirmed += item.Confirmados ?? 0;
            totalDeaths += item.Mortos ?? 0;
            stateDetails += `<li>${item.ProvinciaEstado || "Estado desconhecido"}: ${item.Confirmados ?? 0} casos, ${item.Mortos ?? 0} mortes</li>`;
        });

        showModal(`
            <h2>Resultados para ${country}</h2>
            <p><strong>Total de casos confirmados:</strong> ${totalConfirmed}</p>
            <p><strong>Total de mortes:</strong> ${totalDeaths}</p>
            <h3>Detalhes por estado/província:</h3>
            <ul>${stateDetails || "<li>Não há dados por estado disponíveis.</li>"}</ul>
        `);

        resultsElement.innerHTML = "<p>Escolha um país para ver os dados.</p>";
    };

    const showModal = (content) => {
        // Cria o modal
        const modal = document.createElement("div");
        modal.className = "modal";
        modal.innerHTML = `
            <div class="modal__content">
                <span class="modal__close-btn">&times;</span>
                ${content}
            </div>
        `;
        document.body.appendChild(modal);


        modal.querySelector(".modal__close-btn").addEventListener("click", () => modal.remove());

        modal.addEventListener("click", (e) => {
            if (e.target === modal) modal.remove();
        });

        modal.style.display = "flex";
    };
});
