const btnCalcular = document.getElementById("btnCalcular");
const telaResultado = document.getElementById("telaResultado");

btnCalcular.addEventListener("click", async function () {
    const dadosEnvio = {
        num_a: document.getElementById("num_a").value,
        num_b: document.getElementById("num_b").value,
        metodo: document.getElementById("metodo").value
    };

    const resposta = await fetch("calcular.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(dadosEnvio)
    });

    const dadosJson = await resposta.json();
    telaResultado.textContent = dadosJson.resultado;
});