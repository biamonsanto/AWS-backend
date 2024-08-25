<?php include "../inc/dbinfo.inc"; ?>
<html>

<body>
    <h1>Página de Personagens</h1>
    <?php

    /* Conectar ao MySQL e selecionar o banco de dados. */
    $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

    if (mysqli_connect_errno())
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();

    $database = mysqli_select_db($connection, DB_DATABASE);

    /* Garantir que a tabela Personagens exista. */
    VerifyCharactersTable($connection, DB_DATABASE);

    /* Se os campos de entrada estiverem preenchidos, adicionar uma linha à tabela Personagens. */
    $character_name = htmlentities($_POST['NOME']);
    $character_house = htmlentities($_POST['CASA']);
    $admission_date = htmlentities($_POST['DATA_ADMISSAO']);

    if (strlen($character_name) || strlen($character_house) || strlen($admission_date)) {
        AddCharacter($connection, $character_name, $character_house, $admission_date);
    }
    ?>

    <!-- Formulário de entrada -->
    <form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
        <table border="0">
            <tr>
                <td>NOME</td>
                <td>CASA</td>
                <td>DATA DE ADMISSÃO</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="NOME" maxlength="100" size="30" />
                </td>
                <td>
                    <input type="text" name="CASA" maxlength="50" size="30" />
                </td>
                <td>
                    <input type="date" name="DATA_ADMISSAO" />
                </td>
                <td>
                    <input type="submit" value="Adicionar Dados" />
                </td>
            </tr>
        </table>
    </form>

    <!-- Exibir dados da tabela. -->
    <table border="1" cellpadding="2" cellspacing="2">
        <tr>
            <td>ID</td>
            <td>NOME</td>
            <td>CASA</td>
            <td>DATA DE ADMISSÃO</td>
        </tr>
        <?php

        $result = mysqli_query($connection, "SELECT * FROM Personagens");

        while ($query_data = mysqli_fetch_row($result)) {
            echo "<tr>";
            echo "<td>", $query_data[0], "</td>",
                "<td>", $query_data[1], "</td>",
                "<td>", $query_data[2], "</td>",
                "<td>", $query_data[3], "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <!-- Limpar. -->
    <?php

    mysqli_free_result($result);
    mysqli_close($connection);

    ?>

</body>

</html>


<?php

/* Adicionar um personagem à tabela. */
function AddCharacter($connection, $name, $house, $admission_date)
{
    $n = mysqli_real_escape_string($connection, $name);
    $h = mysqli_real_escape_string($connection, $house);
    $d = mysqli_real_escape_string($connection, $admission_date);

    $query = "INSERT INTO Personagens (nome, casa, data_admissao) VALUES ('$n', '$h', '$d');";

    if (!mysqli_query($connection, $query))
        echo ("<p>Erro ao adicionar dados do personagem.</p>");
}

/* Verificar se a tabela existe e, se não, criá-la. */
function VerifyCharactersTable($connection, $dbName)
{
    if (!TableExists("Personagens", $connection, $dbName)) {
        $query = "CREATE TABLE Personagens (
         id INT PRIMARY KEY,
         nome VARCHAR(100),
         casa VARCHAR(50),
         data_admissao DATE
       )";

        if (!mysqli_query($connection, $query))
            echo ("<p>Erro ao criar tabela.</p>");
    }
}

/* Verificar a existência de uma tabela. */
function TableExists($tableName, $connection, $dbName)
{
    $t = mysqli_real_escape_string($connection, $tableName);
    $d = mysqli_real_escape_string($connection, $dbName);

    $checktable = mysqli_query(
        $connection,
        "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'"
    );

    if (mysqli_num_rows($checktable) > 0)
        return true;

    return false;
}
?>