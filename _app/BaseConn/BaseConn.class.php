<?php

/**
 * <b>Conn.class</b> [ CONEXÃO ]
 * Classe abstrata de conexão. Padrão SingleTon.
 * Retorna um objeto PDO pelo método estático getConn();
 * 
 * @copyright (c) 2017, UPINSIDE TECNOLOGIA
 */
class BaseConn {

    private static $Host = BASE_DB_HOST;
    private static $User = BASE_DB_USER;
    private static $Pass = BASE_DB_PASS;
    private static $Dbsa = BASE_DB_DBSA;

    /** @var PDO */
    private static $Connect = null;

    /**
     * Conecta com o banco de dados com o pattern singleton.
     * Retorna um objeto PDO!
     */
    private static function Conectar() {
        try {
            if (self::$Connect == null):
                $dsn = 'mysql:host=' . self::$Host . ';dbname=' . self::$Dbsa;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                self::$Connect = new PDO($dsn, self::$User, self::$Pass, $options);
                self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            endif;
        } catch (PDOException $e) {
            PHPErro($e->getCode(), $e->getMessage(), $e->getFile(), $e->getLine());
            die;
        }

        return self::$Connect;
    }

    /** Retorna um objeto PDO Singleton Pattern. */
    public static function getConn() {
        return self::Conectar();
    }

    /**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    private function __construct() {
        
    }

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone() {
        
    }

    /**
     * Método unserialize do tipo privado para previnir que desserialização
     * da instância dessa classe.
     *
     * @return void
     */
    private function __wakeup() {
        
    }

}
