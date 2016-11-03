<?php

class sql {

    private $mysql;
    private $main = '';
    private static $self;

    function getMainQuery() {
        return $this->main;
    }

    protected function __construct() {
        $this->mysql = mysqli_connect('127.0.0.1', $_SESSION['login'], $_SESSION['password']);
        mysqli_set_charset($this->mysql, 'utf8');
    }

    /**
     * 
     * @return sql
     */
    static function getInstance() {
        if (!self::$self) {
            self::$self = new self();
        }
        return self::$self;
    }

    /**
     * 
     * @return sql
     */
    static function _() {
        return self::getInstance();
    }

    function get_databases() {
        $q = mysqli_query($this->mysql, "SHOW DATABASES");
        return $this->result4x2($q);
    }

    function get_tables() {

//        mysqli_query($this->mysql, 'USE `' . $_GET['db'].'`');
        $q = mysqli_query($this->mysql, "SHOW TABLES");
        return $this->result4x2($q);
    }

    function get_table_data($table) {
//        mysqli_query($this->mysql, 'USE `' . $_GET['db'].'`');

        $limit = 50;
        $offset = 0;

        if ($v = get($_GET['func'], 'limit')) {
            $limit = $v;
        }
        if ($v = get($_GET['func'], 'offset')) {
            $offset = $v;
        }


        $q = $this->query("SELECT * FROM $table LIMIT $offset, $limit;", 1);
//        print "SELECT * FROM $table LIMIT 50;";
        $res = $this->result4x2($q);

        $q = $this->query("SELECT COUNT(*) FROM $table;");

        $countret = $this->result($q);
        
        $res['count'] = $countret[0][0];
        return $res;
    }

    function result($result) {
        $ret = [];
        while ($res = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $ret [] = $res;
        }
        return $ret;
    }

    function result4x2($result) {
        if (!$result) {
            return [[], []];
        }
        $columns = mysqli_fetch_fields($result);
        $ret = [];

        while ($res = mysqli_fetch_array($result, MYSQLI_NUM)) {
            $ret [] = $res;
        }

        return [
            $columns,
            $ret
        ];
    }

    function query($q, $main = false) {

        if ($main) {
            $this->main = $q;
        }

        return mysqli_query($this->mysql, $q);
    }

}
