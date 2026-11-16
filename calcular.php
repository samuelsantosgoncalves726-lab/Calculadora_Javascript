<?php
header("Content-Type: application/json; charset=UTF-8");

$saidaCalculo = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $dados = json_decode(file_get_contents("php://input"), true);

    $n1 = floatval($dados["num_a"] ?? 0);
    $n2 = floatval($dados["num_b"] ?? 0);
    $metodo = $dados["metodo"] ?? "";

    switch ($metodo) {
        case "adicionar":
            $saidaCalculo = $n1 + $n2;
            break;

        case "subtrair":
            $saidaCalculo = $n1 - $n2;
            break;

        case "multiplicar":
            $saidaCalculo = $n1 * $n2;
            break;

        case "dividir":
            if ($n2 == 0) {
                $saidaCalculo = "Erro: Divisão por zero não permitida.";
            } else {
                $saidaCalculo = $n1 / $n2;
            }
            break;

        default:
            $saidaCalculo = "Por favor, escolha uma operação válida.";
    }

    echo json_encode([
        "resultado" => $saidaCalculo
    ]);
}
?>