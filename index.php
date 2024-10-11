<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./styles.css" rel="stylesheet">
</head>
<body>
    <?php
        $studenti = array();
        $nomeStudenti = ["Mirko", "Niccolò", "Luca"];
        $cognomeStudenti = ["Rossi", "Mancini", "Esposito"];
        for ($i = 0; $i < count($nomeStudenti); $i++) {
            $studenti[$i] = creaStudente($nomeStudenti[$i], $cognomeStudenti[$i], $i);
            stampaStudente($studenti, $i);
        }

        function creaStudente($nome, $cognome, $i) {
            $studente = array ("nome" => $nome, "cognome" => $cognome, "listaVoti" => []);
            for ($v = 0; $v < 3; $v++) {
                $studente["listaVoti"][$v] = rand(2, 10);
            }
            return $studente;
        }

        function stampaStudente($studenti, $i) {
            echo "<h2>". $studenti[$i]["nome"] ." ". $studenti[$i]["cognome"] ."</h2>";
            echo "<ul> <li>". $studenti[$i]["nome"] ."</li> <li>". $studenti[$i]["cognome"] ."</li> <li>Lista voti: </li> <ol>";
            foreach ($studenti[$i]["listaVoti"] as $voto) {
                echo "<li>$voto</li>";
            }
            echo "</ol> </ul>";
        }
    ?>
    <table>
        <tr>
            <th>Nome studente</th>
            <th>Cognome studente</th>
            <th>Media voti</th>
            <th>Voto massimo</th>
        </tr>
        <?php
            foreach ($studenti as $studente) {
                $media = round(array_sum($studente["listaVoti"]) / count($studente["listaVoti"]), 2);
                $votoMassimo = max($studente["listaVoti"]);
                echo "<tr> <td>". $studente["nome"]. "</td> <td>". $studente["cognome"]. "</td> <td>". $media. "</td> <td>". $votoMassimo ."</td> </tr>";
            }
        ?>
    </table>
</body>
</html>