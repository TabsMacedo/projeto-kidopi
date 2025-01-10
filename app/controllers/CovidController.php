<?php
class CovidController
{
    private $covidModel;

    public function __construct()
    {
        global $conn;
        $this->covidModel = new CovidModel($conn);
    }

    public function getCovidData($country)
    {
        if (isset($_GET['lastAccess']) && $_GET['lastAccess'] === 'true') {
            $this->getLastAccess();
            return;
        }

        $url = "https://dev.kidopilabs.com.br/exercicio/covid.php?pais=" . urlencode($country);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Erro ao acessar a API externa: ' . curl_error($ch));
        }

        curl_close($ch);

        if ($response === false) {
            echo json_encode(['error' => 'Erro ao acessar os dados do Covid.']);
            return;
        }

        $data = json_decode($response, true);

        if (isset($data['error'])) {
            echo json_encode(['error' => $data['error']]);
        } else {
            $this->saveLastAccess($country);
            echo json_encode($data);
        }
    }

    public function saveLastAccess($country)
    {
        date_default_timezone_set("America/Sao_Paulo");
        $lastAccess = [
            'pais' => $country,
            'data_hora' => date('Y-m-d H:i:s')
        ];
        $this->covidModel->saveAccess($lastAccess);
    }

    public function getLastAccess()
    {
        $lastAccess = $this->covidModel->getLastAccess();

        if ($lastAccess) {
            echo json_encode($lastAccess);
        } else {
            echo json_encode(['error' => 'Nenhum acesso registrado ainda.']);
        }
    }
}
