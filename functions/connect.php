<?php
final class DBC {
    /** @var Object $conn Database connection */
    public static $conn;

    /** @var Array $conns All the Database connections */
    public static $conns;

    /**
     * Initialize the connection to database
     *
     * @param string $host Hostname to the database
     * @param string $user User of the database
     * @param string $pass Password of the user
     * @param string $db Database to which auto-connect the user
     * @param string|null $port Port for the mysql server
     * @param string|null $socket Socket that should be used for the connection
     * @param bool $persistent If the connection should be persistent
     *
     * @return bool True if the connection was successfull, false otherwise
     */
    public static function __connectToDB($host, $user, $pass, $db, $port = null, $socket = null, $persistent = false): bool {
        if ($persistent) {
            $persistent = "p:";
        } else {
            $persistent = "";
        }

        static::$conns[] = new mysqli($persistent . $host, $user, $pass, $db, $port, $socket);

        if (empty(static::$conn)) { // First connection to database
            if (static::$conns[0]->connect_error) {
                die("Database error: " . static::$conns[0]->connect_error);
            }

            static::$conn = static::$conns[0];
        }

        if (static::$conns[count(static::$conns) - 1]->connect_error) {
            return false;
        }

        static::$conns[count(static::$conns) - 1]->set_charset("utf8mb4");
        static::$conns[count(static::$conns) - 1]->query("SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'"); // utf8mb4_0900_ai_ci is be better but not worldwide supported

        return true;
    }
}
DBC::__connectToDB(DB_HOST, DB_USER, DB_PASS, DB_NAME); // Default connection
