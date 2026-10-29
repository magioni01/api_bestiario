<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Configuração da Base de Dados XAMPP (MariaDB / MySQL)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_bestiario"; // Altere se o nome da sua base de dados for diferente

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(json_encode(["erro" => "Falha na conexão: " . $conn->connect_error]));
}

$conn->set_charset("utf8");

// Criar tabela se não existir
$sqlTabela = "CREATE TABLE IF NOT EXISTS criaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(100) NOT NULL,
    habitat VARCHAR(100),
    nivel_ameaca VARCHAR(50),
    imagem_url TEXT,
    descricao TEXT
)";
$conn->query($sqlTabela);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $resultCheck = $conn->query("SELECT COUNT(*) as total FROM criaturas");
    $rowCheck = $resultCheck->fetch_assoc();
    
    if ($rowCheck['total'] == 0) {
        $elencoMassivoLocal = [
            [
                "Mordecai", 
                "Gaio-Azul", 
                "Parque", 
                "Perigoso", 
                "img/mordecai.png", 
                "Gaio-azul de 23 anos, especialista em videojogos e melhor amigo do Rigby."
            ],
            [
                "Rigby", 
                "Guaxinim", 
                "Parque", 
                "Perigoso", 
                "img/rigby.png", 
                "Guaxinim hiperativo e brincalhão, mestre em inventar desculpas para fugir ao trabalho."
            ],
            [
                "Skips", 
                "Yeti Imortal", 
                "Parque", 
                "Inofensivo", 
                "img/skips.png", 
                "Yeti sábio e musculado que resolve todos os problemas sobrenaturais do parque."
            ],
            [
                "Pairulito", 
                "Homem-Pirulito", 
                "Mansão", 
                "Destruidor de Mundos", 
                "img/pairulito.png", 
                "Cavalheiro alegre com cabeça de pirulito dotado de um poder cósmico avassalador."
            ],
            [
                "Benson", 
                "Máquina de Goma", 
                "Parque", 
                "Perigoso", 
                "img/benson.png", 
                "Gerente do parque temperamental que perde a paciência facilmente com o Mordecai e o Rigby."
            ],
            [
                "Musculoso", 
                "Humanoide Verde", 
                "Parque", 
                "Irritante", 
                "img/musculoso.png", 
                "Conhecido pelas suas famosas anedotas sobre a mãe e pela grande força física."
            ],
            [
                "Fantasminha", 
                "Fantasma com Mão na Cabeça", 
                "Parque", 
                "Inofensivo", 
                "img/fantasminha.png", 
                "Melhor amigo do Musculoso, um fantasma leal e divertido."
            ],
            [
                "Thomas", 
                "Cabra Humanoide", 
                "Parque", 
                "Inofensivo", 
                "img/thomas.png", 
                "Estagiário calmo e esforçado do parque que esconde um passado surpreendente."
            ],
            [
                "Pai do Pairulito", 
                "Homem-Pirulito Gigante", 
                "Mansão", 
                "Destruidor de Mundos", 
                "img/maellard.png", 
                "Dono multimilionário do parque e pai severo, mas protetor do Pairulito."
            ],
            [
                "Margaret", 
                "Cardeal Vermelho", 
                "Cafetaria", 
                "Inofensivo", 
                "img/margaret.png", 
                "Trabalha na cafetaria local e foi o interesse amoroso de longa data do Mordecai."
            ],
            [
                "Eileen", 
                "Toupeira Humanoide", 
                "Universidade", 
                "Inofensivo", 
                "img/eileen.png", 
                "Amiga inteligente da Margaret e namorada dedicada do Rigby."
            ],
            [
                "CJ", 
                "Nuvem Humanoide", 
                "Cidade", 
                "Perigoso", 
                "img/cj.png", 
                "Nuvem temperamental que muda de forma conforme as suas emoções."
            ],
            [
                "Morte", 
                "Entidade Sobrenatural", 
                "Submundo", 
                "Destruidor de Mundos", 
                "img/morte.png", 
                "A Morte em pessoa, que usa um impermeável e adora braço de ferro."
            ],
            [
                "Guardião do Tempo", 
                "Entidade Temporal", 
                "Dimensão do Tempo", 
                "Destruidor de Mundos", 
                "img/guardiao.png", 
                "Um bebé gigante que controla a linha temporal e as regras do universo."
            ],
            [
                "Garrett Bobby Ferguson", 
                "Cabeça Gigante", 
                "Arcade", 
                "Perigoso", 
                "img/gbf.png", 
                "O recordista mundial de videojogos com uma cabeça desproporcional."
            ],
            [
                "Bebé Pato", 
                "Anatídeo Mutante", 
                "Lago do Parque", 
                "Inofensivo", 
                "img/patos.png", 
                "Patinhos fofos que se fundem num robô gigante com artes marciais."
            ]
        ];

        foreach ($elencoMassivoLocal as $p) {
            $stmt = $conn->prepare("INSERT INTO criaturas (nome, especie, habitat, nivel_ameaca, imagem_url, descricao) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $p[0], $p[1], $p[2], $p[3], $p[4], $p[5]);
            $stmt->execute();
        }
    }

    $result = $conn->query("SELECT * FROM criaturas ORDER BY id DESC");
    $dados = [];
    while ($row = $result->fetch_assoc()) {
        $dados[] = $row;
    }
    echo json_encode($dados);
} 
else if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if (!empty($data['nome']) && !empty($data['especie'])) {
        $stmt = $conn->prepare("INSERT INTO criaturas (nome, especie, habitat, nivel_ameaca, imagem_url, descricao) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $data['nome'], $data['especie'], $data['habitat'], $data['nivel_ameaca'], $data['imagem_url'], $data['descricao']);
        if ($stmt->execute()) {
            echo json_encode(["sucesso" => true, "id" => $stmt->insert_id]);
        } else {
            echo json_encode(["erro" => "Erro ao inserir registo."]);
        }
    } else {
        echo json_encode(["erro" => "Campos obrigatórios em falta."]);
    }
}
$conn->close();
?>