<<<<<<< HEAD
<?php 

class TemplateEngine{
        public $page_content;
        public $config_content;
        public $vars = [];
        private $values = [];
        public $operators = [];
        public $functions = [];
        private $db;


        function __construct(){      
            $this->config_content = file_get_contents('config.txt');       
            $this->values['FILE'   ] = '/{FILE=".+"}/';
            $this->values['DB'     ] = '/{DB=".+"}/';
            $this->values['VAR'    ] = '/{VAR=".+"}/';
            $this->values['CONFIG' ] = '/{CONFIG=".+"}/';
            $this->values['IF'     ] = '/{\s*IF\s+"\w+"\s*"(==|!=|<=|>=|<|>)"\s*"\w+"\s*}.+{\s*ENDIF\s*}/';

            $this->functions['FILE'  ] = function ($item){return $this->get_file_content($this->extract_value($item, 0));};
            $this->functions['DB'    ] = function ($item){return $this->get_database_value($this->extract_value($item, 0));};
            $this->functions['VAR'   ] = function ($item){return $this->get_var_value($this->extract_value($item, 0))     ;};
            $this->functions['CONFIG'] = function ($item){return $this->get_config_value($this->extract_value($item, 0))  ;};
            $this->functions['IF'    ] = function ($item){return $this->condition_handler($item) ;};

            $this->operators['<' ] = function ($a, $b){return $a < $b ;};
            $this->operators['>' ] = function ($a, $b){return $a > $b ;};
            $this->operators['<='] = function ($a, $b){return $a <= $b;};
            $this->operators['>='] = function ($a, $b){return $a >= $b;};
            $this->operators['=='] = function ($a, $b){return $a == $b;};
            $this->operators['!='] = function ($a, $b){return $a != $b;};

            $this->db = mysqli_connect('localhost','root', 'admin', 'firstdb');
        }

        public function set_values(array $vars){
            $this->vars = $vars;
            return count($vars); 
        }

        public static function open_tpl(TemplateEngine $engine, string $tpl_name){  
            $temp = file_get_contents($tpl_name);
            if(!$temp){
                return false;
            }

            $engine->page_content = $temp; 
            return true;
        }

        function get_file_content(string $path){
            try{
                return file_get_contents($path);
            }
            catch(Exception $e){
                return false;
            }
        }

        function get_config_value(string $atribute){
            $result = '';

            $i = strpos($this->config_content, $atribute);
            
            if ($i === false) 
                return false;

            return $this->extract_value($this->config_content, $i);
        } 
        

        public function get_var_value(string $var_name){
            return $this->vars[$var_name];
        }

        public function condition_handler(string $if_string){
            $result = '';
            preg_match_all('/"[\w=<>!]+"/', $if_string, $matches);
            $matches = $matches[0];

            for($i = 0; $i < count($matches); $i++)
                $matches[$i] = substr($matches[$i], 1, strlen($matches[$i])-2);

            $cmp_result = $this->operators[$matches[1]]($this->get_var_value($matches[0]), 
                                                        $this->get_var_value($matches[2])
                                                       );
			if ($cmp_result){
                $i = strpos($if_string, '}') + 1;

                while($if_string{$i} !== '{')
                    $result .= $if_string{$i++};
                    
            }
            else    
            {
                if(preg_match('/{ELSE}/', $if_string, $matches, PREG_OFFSET_CAPTURE)){
                    $i = $matches[0][1] + 6;
                    
                    while($if_string{$i} !== '{')
                        $result .= $if_string{$i++};
                        
                }
            }

            return $result;
        }

        public function get_database_value(string $index){
            $result = mysqli_query($this->db, 'SELECT * FROM somedatabase WHERE id=' . $index );
            return mysqli_fetch_array($result)[1];
        }

        public function extract_value(string $str, int $start_index){
            $i = $start_index;
            $result = '';

            for($i; $str{$i} !== '"'; $i++);

            $i++;

            for ($i; $str{$i} !== '"' ; $i++) 
                $result .= $str{$i};

            return $result; 
        }

        public function sdelatsZashibis(){
            if (!$this->page_content) return false;

            foreach ($this->values as $k => $v){
                while (preg_match($v, $this->page_content, $matches)){
                    $this->page_content = str_replace($matches[0], $this->functions[$k]($matches[0]), $this->page_content);
                }
            }

            return $this->page_content;
        }
=======
<?php 

class TemplateEngine{
        public $page_content;
        public $config_content;
        public $vars = [];
        private $values = [];
        public $operators = [];
        public $functions = [];
        private $db;


        function __construct(){      
            $this->config_content = file_get_contents('config.txt');       
            $this->values['FILE'   ] = '/{FILE=".+"}/';
            $this->values['DB'     ] = '/{DB=".+"}/';
            $this->values['VAR'    ] = '/{VAR=".+"}/';
            $this->values['CONFIG' ] = '/{CONFIG=".+"}/';
            $this->values['IF'     ] = '/{\s*IF\s+"\w+"\s*"(==|!=|<=|>=|<|>)"\s*"\w+"\s*}.+{\s*ENDIF\s*}/';

            $this->functions['FILE'  ] = function ($item){return $this->get_file_content($this->extract_value($item, 0));};
            $this->functions['DB'    ] = function ($item){return $this->get_database_value($this->extract_value($item, 0));};
            $this->functions['VAR'   ] = function ($item){return $this->get_var_value($this->extract_value($item, 0))     ;};
            $this->functions['CONFIG'] = function ($item){return $this->get_config_value($this->extract_value($item, 0))  ;};
            $this->functions['IF'    ] = function ($item){return $this->condition_handler($item) ;};

            $this->operators['<' ] = function ($a, $b){return $a < $b ;};
            $this->operators['>' ] = function ($a, $b){return $a > $b ;};
            $this->operators['<='] = function ($a, $b){return $a <= $b;};
            $this->operators['>='] = function ($a, $b){return $a >= $b;};
            $this->operators['=='] = function ($a, $b){return $a == $b;};
            $this->operators['!='] = function ($a, $b){return $a != $b;};

            $this->db = mysqli_connect('localhost','root', 'admin', 'firstdb');
        }

        public function set_values(array $vars){
            $this->vars = $vars;
            return count($vars); 
        }

        public static function open_tpl(TemplateEngine $engine, string $tpl_name){  
            $temp = file_get_contents($tpl_name);
            if(!$temp){
                return false;
            }

            $engine->page_content = $temp; 
            return true;
        }

        function get_file_content(string $path){
            try{
                return file_get_contents($path);
            }
            catch(Exception $e){
                return false;
            }
        }

        function get_config_value(string $atribute){
            $result = '';

            $i = strpos($this->config_content, $atribute);
            
            if ($i === false) 
                return false;

            return $this->extract_value($this->config_content, $i);
        } 
        

        public function get_var_value(string $var_name){
            return $this->vars[$var_name];
        }

        public function condition_handler(string $if_string){
            $result = '';
            preg_match_all('/"[\w=<>!]+"/', $if_string, $matches);
            $matches = $matches[0];

            for($i = 0; $i < count($matches); $i++)
                $matches[$i] = substr($matches[$i], 1, strlen($matches[$i])-2);

            $cmp_result = $this->operators[$matches[1]]($this->get_var_value($matches[0]), 
                                                        $this->get_var_value($matches[2])
                                                       );
			if ($cmp_result){
                $i = strpos($if_string, '}') + 1;

                while($if_string{$i} !== '{')
                    $result .= $if_string{$i++};
                    
            }
            else    
            {
                if(preg_match('/{ELSE}/', $if_string, $matches, PREG_OFFSET_CAPTURE)){
                    $i = $matches[0][1] + 6;
                    
                    while($if_string{$i} !== '{')
                        $result .= $if_string{$i++};
                        
                }
            }

            return $result;
        }

        public function get_database_value(string $index){
            $result = mysqli_query($this->db, 'SELECT * FROM somedatabase WHERE id=' . $index );
            return mysqli_fetch_array($result)[1];
        }

        public function extract_value(string $str, int $start_index){
            $i = $start_index;
            $result = '';

            for($i; $str{$i} !== '"'; $i++);

            $i++;

            for ($i; $str{$i} !== '"' ; $i++) 
                $result .= $str{$i};

            return $result; 
        }

        public function sdelatsZashibis(){
            if (!$this->page_content) return false;

            foreach ($this->values as $k => $v){
                while (preg_match($v, $this->page_content, $matches)){
                    $this->page_content = str_replace($matches[0], $this->functions[$k]($matches[0]), $this->page_content);
                }
            }

            return $this->page_content;
        }
>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
    }