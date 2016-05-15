<?php

class MySQLDB
{
    /**
     * Static instance of self
     * @var MysqliDb
     */
    protected static $_instance;

    /**
     * MySQLi instance
     * @var mysqli
     */
    protected $_mysqli;

    /**
     * Database credentials
     * @var string
     */
    protected $host;
    protected $username;
    protected $password;
    protected $db;
    protected $port;
    protected $charset;

    public function __construct($host = "localhost", $username = "root", $password = "xxxx", $db = "stufen", $port = "3306", $charset = 'utf8')
    {
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $this->port = $port;
        $this->charset = $charset;

        self::$_instance = $this;
    }

    public static function getInstance()
    {
        return self::$_instance;
    }

    public function connect()
    {
        if (empty($this->host)) {
            throw new Exception('MySQL host is not set');
        }
        $this->_mysqli = new mysqli($this->host, $this->username, $this->password, $this->db, $this->port);
        if ($this->_mysqli->connect_error) {
            throw new Exception('Connect Error ' . $this->_mysqli->connect_errno . ': ' . $this->_mysqli->connect_error);
        }
        if ($this->charset) {
            $this->_mysqli->set_charset($this->charset);
        }
    }

    public function getJobs()
    {
        $query = "SELECT name,needed,description FROM jobs";
        return $this->_mysqli->query($query);
    }

    public function getMembers($name = "")
    {
        $query = "SELECT name FROM members WHERE job = '$name' ORDER BY id DESC";
        return $this->_mysqli->query($query);
    }

    /**
     * Creates a job, based on the passed arguments
     *
     * @param string $name the name of the job
     * @param int $needed how many people are needed
     * @param string $description a short description of the job
     */
    public function createJob($name = "", $needed = 1, $description = "")
    {
        $query = "INSERT INTO jobs (name, needed, description), ('$name', '$needed', '$description')";
        $this->_mysqli->query($query);
    }
}