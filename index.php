<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Controle de Estoque dos Tesouros</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="icon" href="calice.ico">
  </head>
  <body>
    <h1>Gerenciador de Tesouros <?php echo "(by Coutinho)"?></h1>
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
        foreach ($result as $tesouro) {
          $total += $tesouro["valorUnitario"] * $tesouro["quantidade"];
        ?>
        <tr>
          <td><img src="<?php echo $tesouro["icone"] ?>"></td>
          <td><?php echo $tesouro["nome"] ?></td>
          <td><?php echo number_format($tesouro["valorUnitario"], 0, ",", ".") ?></td>
          <td><?php echo $tesouro["quantidade"] ?></td>
          <td><?php echo number_format($tesouro["valorUnitario"] * $tesouro["quantidade"], 0, ",", ".") ?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4">Total</td>
          <td><?=number_format($total, 0, ",", ".")?></td>
        </tr>
      </tfoot>
    </table>
    <p>Yarr Harr, marujo! Aqui é o temido Barba-Ruiva e você deve me ajudar
      a contabilizar os espólios das minhas aventuras!</p>
  </body>
</html>
