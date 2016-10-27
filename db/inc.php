<?php

class sql {

    private $mysql;
    private static $self;

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
        mysqli_query($this->mysql, 'USE ' . $_GET['db']);
        $q = mysqli_query($this->mysql, "SHOW TABLES");
        return $this->result4x2($q);
    }

    function get_table_data($table) {
        mysqli_query($this->mysql, 'USE ' . $_GET['db']);

        $limit = 50;
        $offset = 0;

        if ($v = get($_GET['func'], 'limit')) {
            $limit = $v;
        }
        if ($v = get($_GET['func'], 'offset')) {
            $offset = $v;
        }


        $q = mysqli_query($this->mysql, "SELECT SQL_CALC_FOUND_ROWS * FROM $table LIMIT $offset, $limit;");
//        print "SELECT * FROM $table LIMIT 50;";
        $res = $this->result4x2($q);

        $countret = $this->result(mysqli_query($this->mysql, "SELECT FOUND_ROWS();"));
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

}
