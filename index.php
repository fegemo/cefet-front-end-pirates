<?php
  // faz a conexão com o banco de dados
  $db = mysqli_connect("localhost", "root", "", "piratas");
  $db->set_charset("utf8");

  // verifica se a conexão funcionou...
  if (!$db) {
    // encerra a execução do script php, dando um erro
    $descricaoErro = "Erro: não foi possível conectar ao banco de dados. ";
    $descricaoErro = $descricaoErro . "Detalhes: " . mysqli_connect_error();
    die($descricaoErro);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Controle de Estoque dos Tesouros</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="calice.ico">
  </head>
  <body>
    <h1>Gerenciador de Tesouros (by <?php echo "Coutinho" ?>)</h1>
    <?php
      // faz uma consulta no banco de dados para pegar todos os tesouros cadastrados
      $sql = "SELECT * FROM tesouros";
      $result = $db->query($sql);
    ?>
    <table>
      <caption>Estes são os tesouros acumulados do Barba-Ruiva em suas aventuras</caption>
      <thead>
        <tr>
          <th>Tesouro</th>
          <th>Nome</th>
          <th>Valor unitário</th>
          <th>Quantidade</th>
          <th>Valor total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($resultado as $tesouroAtual) {
          $total += $tesouroAtual["valorUnitario"] * $tesouroAtual["quantidade"];
        ?>
        <tr>
          <td><img src="<?= $tesouroAtual["icone"] ?>"></td>
          <td><?= $tesouroAtual["nome"] ?></td>
          <td><?= number_format($tesouroAtual["valorUnitario"], 0, ",", ".") ?></td>
          <td><?= $tesouroAtual["quantidade"] ?></td>
          <td><?= number_format($tesouroAtual["valorUnitario"] * $tesouroAtual["quantidade"], 0, ",", ".") ?></td>
        </tr>
      <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4">Total geral</td>
          <td><?=number_format($total, 0, ",", ".")?></td>
        </tr>
      </tfoot>
    </table>
    <p>Yarr Harr, marujo! Aqui é o temido Barba-Ruiva e você deve me ajudar
      a contabilizar os espólios das minhas aventuras!</p>
  </body>
</html>
