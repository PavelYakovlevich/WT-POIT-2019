<<<<<<< HEAD
<?php

    class Lab4Helper{
        public  $punctuationMarks = ['.', ',', '?', '!'];

        public static function push($arr, $item){
            $length = count($arr);
            $arr[$length] = $item;
        }

        // split string into array according to regexp
        public static function split($str, $splitRegExp){
            $result = [];
            preg_match_all($splitRegExp, $str, $result);
            return $result;
        } 

        // returns the length os string. Punctuation marks will be not counted.
        public static function length($str, $punctuationMarks = ['.', ',', '?', '!']){
            $len = 0;

            for ($i = 0; $i < str_len($str); $i++) 
                if (!array_search($punctuationMarks, $str{$i}));
                    $len++;

            return $len;
        }

        // reduce all words in array to appropriate length
        public static function reduce_all_words($worsdArr, $lettersCount, $char){
            foreach($worsdArr as $item){
                if(length($item) > $lettersCount)
                    reduce_word($item, $lettersCount, $char);
            }
        }

        // reduce string to appropriate length and add char to the end of string
        public static function reduce_word(&$word, $count, $char){
            $word = substr($word, 0, $count) . $char;
        }

        // returns string, that was formed from arrray elements. All elemenets will be separated with appropriate char
        public static function join($arr, $joinChar){
            $resultString = '';

            foreach($arr as $item)
                $resultString .= $item . $joinChar;

            return substr($resultString, 0, strlen($resultString)-2);
        }

        // do all necessary work =)
        public static function transform_string($originalString){
            $wordsArray = $this->split($originalString, "/\w+/");
            $wordsArray = reduce_all_words($wordsArray, 7, '*');

            return $this->join($wordsArray, ' ');
        }
    }
=======
<?php

    class Lab4Helper{
        public  $punctuationMarks = ['.', ',', '?', '!'];

        public static function push($arr, $item){
            $length = count($arr);
            $arr[$length] = $item;
        }

        // split string into array according to regexp
        public static function split($str, $splitRegExp){
            $result = [];
            preg_match_all($splitRegExp, $str, $result);
            return $result;
        } 

        // returns the length os string. Punctuation marks will be not counted.
        public static function length($str, $punctuationMarks = ['.', ',', '?', '!']){
            $len = 0;

            for ($i = 0; $i < str_len($str); $i++) 
                if (!array_search($punctuationMarks, $str{$i}));
                    $len++;

            return $len;
        }

        // reduce all words in array to appropriate length
        public static function reduce_all_words($worsdArr, $lettersCount, $char){
            foreach($worsdArr as $item){
                if(length($item) > $lettersCount)
                    reduce_word($item, $lettersCount, $char);
            }
        }

        // reduce string to appropriate length and add char to the end of string
        public static function reduce_word(&$word, $count, $char){
            $word = substr($word, 0, $count) . $char;
        }

        // returns string, that was formed from arrray elements. All elemenets will be separated with appropriate char
        public static function join($arr, $joinChar){
            $resultString = '';

            foreach($arr as $item)
                $resultString .= $item . $joinChar;

            return substr($resultString, 0, strlen($resultString)-2);
        }

        // do all necessary work =)
        public static function transform_string($originalString){
            $wordsArray = $this->split($originalString, "/\w+/");
            $wordsArray = reduce_all_words($wordsArray, 7, '*');

            return $this->join($wordsArray, ' ');
        }
    }
>>>>>>> 362a365b32ce5c3226849f6a12acde5a3a935133
