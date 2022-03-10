<?php

include('conectar.php');

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Aba de Busca</title>
    </head>
    <body>
    <h1><strong>Buscar Consultas</strong></h1>
    <form method="GET">
        <input type="text" name="nomeBusca" value="<?php if(isset($_GET['busca'])) echo $_GET['nomeBusca']; ?>" placeholder="Digite o Nome do Paciente" maxlength="30"> 
        <input type="submit" value="buscar">        
    </form>
    </div>
    <br>
    <br>
    <table width="600px" border="1">
    <tr>
        <th>Nome do Doutor</th>
        <th>Data</th>
        <th>Horário</th>
        <th>Endereço</th>
    </tr>
    <?php
    if (!isset($_GET['nomeBusca'])) {
        ?>
    <tr>
        <td colspan="4">Digite o nome do paciente na aba acima para obter o retorno!</td>
    </tr>
    <?php
    } 
    else {
        $nomeBusca = $_GET['nomeBusca'];
        $consultaSQL = "SELECT nomeDoutor, dataConsulta, horario, endereco FROM consulta WHERE nomePaciente LIKE '%$nomeBusca%'";
        $sql_query = $mysqli->query($consultaSQL) or die("Erro ao consultar! ".$mysqli->error);
           if ($sql_query->num_rows == 0) {
                ?>
            <tr>
                <td colspan="4">Nenhum resultado encontrado...</td>
            </tr>
            <?php
            } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['nomeDoutor']; ?></td>
                        <td><?php echo $dados['dataConsulta']; ?></td>
                        <td><?php echo $dados['horario']; ?></td>
                        <td><?php echo $dados['endereco']; ?></td>
                    </tr>
                    <?php
                }
            }
            ?>
        <?php
        } ?>
    </table>

<br>
<a href="visualizarConsulta.php"> Voltar para área inicial!</a>

</body>
</html>