
<?php    

    function Split(string $str,string $separator)
    {
        $tempArr = array();

        $tempWord = '';

        for($i = 0, $j = 0; $i < strlen($str) && $str{$i} != '.'; $i++)
        {
            if ($str{$i} == $separator)
            {
                $tempArr[$j++] = $tempWord;
                $tempWord = '';
            }
            else if ($str{$i} != ' ')
                $tempWord = $tempWord . $str{$i};
        }

        if(!empty($tempWord))
            $tempArr[$j] = $tempWord;

        return $tempArr;
    }

    function Reverse(array $arr){

        for ($i = 0, $j = count($arr) - 1; $i < $j; $i++, $j--){
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }

        return $arr;
    }

    function _2ky_CharToUpper($chr)
    {
        $ord = ord($chr);
        return ($ord >= 97 && $ord <= 123) ? chr($ord - 32) : chr($ord);
    }

    function MakeString(array $arr)
    {
        $resultStr = '';

        for ($i = 0; $i < count($arr); $i++) { 
            $resultStr = $resultStr . $arr[$i] . ','; 
        }

        $resultStr{0} =  _2ky_CharToUpper($resultStr{0}); 

        $len = strlen($resultStr)-1;
        $resultStr{$len} = '.';

        return $resultStr;
    }

    function ReverseStringWords(string $str,string $separator)
    {
        $str = strtolower($str);
        $tempArr = Split($str, $separator);
        $tempArr = Reverse($tempArr);
        return MakeString($tempArr);
    }

    if (!empty($_POST['mainString'])){
        $separator = ',';
        $str = $_POST["mainString"];
        $resultString = ReverseStringWords($str, $separator);
        echo $resultString;
    }
    else
    {
        echo "Error occurred";
    }


