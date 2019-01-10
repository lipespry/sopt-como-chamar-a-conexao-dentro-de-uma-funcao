<?php

function getPDO() {
    try {
        require_once('defines.php');
        $pdoConn = new PDO(
            (
                $conexaoPDO['drive']
                .':host='
                .$conexaoPDO['host']
                .';dbname='
                .$conexaoPDO['database']
            ),
            $conexaoPDO['usuario'],
            $conexaoPDO['senha'],
            array(
                \PDO::MYSQL_ATTR_INIT_COMMAND => (
                    'SET NAMES '
                    .$conexaoPDO['charset']
                )
            )
        );
        $pdoConn->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );

        return $pdoConn;

    } catch (PDOException $e) {
        die($e->getMessage());
        die('Erro ao conectar-se com o banco de dados!');
    }
}
