<?Php
final class Config {


    private static $data = null; // setting the data to null.

/*
line 13 -   line 34
method for calling the configuration of the database connection string  using config.ini

*/
  
    public static function getConfig($section = null) {  
        if ($section === null) {
            return self::getData();
        }
        $data = self::getData();
        if (!array_key_exists($section, $data)) {
            throw new Exception('Unknown config section: ' . $section);
        }
        return $data[$section];
    }

 
    private static function getData() {
        if (self::$data !== null) {
            return self::$data;
        }
       
        self::$data = parse_ini_file('./Config/config.ini', true);
        return self::$data;
    }

}

?>
