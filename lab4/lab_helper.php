<<<<<<< HEAD
<?php

    class Lab4Helper{
        public  $punctuationMarks = ['.', ',', '?', '!'];
        private $string;

        function __construct(string $str)
        {
            $this->string = $str;
        }
        // add an element to array
        public function push($arr, $item){
            $length = count($arr);
            $arr[$length] = $item;
        }

        // split string into array according to regexp
        public function split($splitRegExp){
            $result = [];
            preg_match_all($splitRegExp, $this->string, $result);
            return $result[0];
        } 

        // returns the length os string. Punctuation marks will be not counted.
        public function length($punctuationMarks = ['.', ',', '?', '!']){
            $len = 0;

            for ($i = 0; $i < strlen($this->string); $i++) 
                if (!in_array($this->string{$i}, $punctuationMarks))
                    $len++;

            return $len;
        }

        // reduce all words in array to appropriate length
        public function reduce_all_words(&$worsdArr, $lettersCount, $char){
            foreach($worsdArr as $k => $item)
                $worsdArr[$k] = preg_replace('/.{' . $lettersCount . ',}/', substr($item, 0, $lettersCount-1) . '*', $item);
        }

        // reduce string to appropriate length and add char to the end of string
        public function reduce_word(&$word, $count, $char){
            $word = substr($word, 0, $count-1) . $char;
        }

        // returns string, that was formed from arrray elements. All elemenets will be separated with appropriate char
        public function join($arr, $joinChar){
            $resultString = '';

            foreach($arr as $item)
                $resultString .= $item . $joinChar;

            return substr($resultString, 0, strlen($resultString)-1);
        }

        // do all necessary work =)
        public function transform_string(){
            $wordsArray = $this->split($this->string, "/\w+/");
            
            $this->reduce_all_words($wordsArray, 7, '*');

            return $this->join($wordsArray, ' ');
        }
    }
=======
<?php

    class Lab4Helper{
        public  $punctuationMarks = ['.', ',', '?', '!'];

        // add an element to array
        public function push($arr, $item){
            $length = count($arr);
            $arr[$length] = $item;
        }

        // split string into array according to regexp
        public function split($str, $splitRegExp){
            $result = [];
            preg_match_all($splitRegExp, $str, $result);
            return $result[0];
        } 

        // returns the length os string. Punctuation marks will be not counted.
        public function length($str, $punctuationMarks = ['.', ',', '?', '!']){
            $len = 0;

            for ($i = 0; $i < strlen($str); $i++) 
                if (!in_array($str{$i}, $punctuationMarks))
                    $len++;

            return $len;
        }

        // reduce all words in array to appropriate length
        public function reduce_all_words(&$worsdArr, $lettersCount, $char){
            foreach($worsdArr as $k => $item)
                if($this->length($item) >= $lettersCount){
                    $this->reduce_word($item, $lettersCount, $char);
                    $worsdArr[$k] = $item; 
                }
        }

        // reduce string to appropriate length and add char to the end of string
        public function reduce_word(&$word, $count, $char){
            $word = substr($word, 0, $count-1) . $char;
        }

        // returns string, that was formed from arrray elements. All elemenets will be separated with appropriate char
        public function join($arr, $joinChar){
            $resultString = '';

            foreach($arr as $item)
                $resultString .= $item . $joinChar;

            return substr($resultString, 0, strlen($resultString)-1);
        }

        // do all necessary work =)
        public function transform_string($originalString){
            $wordsArray = $this->split($originalString, "/\w+/");
            
            $this->reduce_all_words($wordsArray, 7, '*');

            return $this->join($wordsArray, ' ');
        }
    }
>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
