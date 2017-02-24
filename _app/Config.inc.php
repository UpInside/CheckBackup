<?php

/*
 * BANCO DE DADOS BKP
 * Dados para se conectar com o banco de dados de bkp!
 * Não será alterado nenhum registros. Não haverá INSERT, UPDATE ou DELETE de nenhum dado!
 */
define('BKP_DB_HOST', 'localhost'); // Link do banco de dados
define('BKP_DB_USER', 'root'); // Usuário do banco de dados
define('BKP_DB_PASS', ''); // Senha  do banco de dados
define('BKP_DB_DBSA', ''); // Nome  do banco de dados

/*
 * BANCO DE DADOS BASE
 * Dados para se conectar com o banco de dados que servirá como base!
 * Não será alterado nenhum registros. Não haverá INSERT, UPDATE ou DELETE de nenhum dado!
 */
define('BASE_DB_HOST', 'localhost'); // Link do banco de dados
define('BASE_DB_USER', 'root'); // Usuário do banco de dados
define('BASE_DB_PASS', ''); // Senha  do banco de dados
define('BASE_DB_DBSA', ''); // Nome  do banco de dados

/*
  AUTO LOAD DE CLASSES
 */

function MyAutoLoad($Class) {
    $cDir = ['BKPConn', 'BaseConn', 'Models'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . '/' . $dirName . '/' . $Class . '.class.php') && !is_dir(__DIR__ . '/' . $dirName . '/' . $Class . '.class.php')):
            include_once (__DIR__ . '/' . $dirName . '/' . $Class . '.class.php');
            $iDir = true;
        endif;
    endforeach;
}

spl_autoload_register("MyAutoLoad");

/*
 * personaliza o gatilho do PHP
 */

function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    echo "<div class='trigger trigger_error'>";
    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class='ajax_close'></span></div>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');
