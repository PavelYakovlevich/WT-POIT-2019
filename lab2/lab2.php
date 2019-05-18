<!DOCTYPE html>
<html>
<head>
    <title>lab2</title>
    <meta charset="utf-8">
</head>

<style>
h2 + p{
    margin: 10px;
    border: 5px solid black;
    font-size: 30px;
}

p{
    font-size: 20px;
}

input{
    width: 100%;
    height: 30px;
    font-size: 100%;
}
</style>
<body>
    <h2>Вариант 5:</h2>
    <p>Введите через поле ввода строку состоящую из слов разделенных запятой (например, 'Один, два, три, четыре, пять.'). Первое слово начинается с большой буквы, в конце точка. Расставьте слова в обратном порядке. Выведите строку. Только первое слово новой строки должно начинаться с большой буквы, в конце предложения точка.</p>
    <form action="display.php" method="POST">
    <p>Введите строку <input type="text" name="mainString"></p>
    <input type="submit" name="process">
    </form>
</body>
</html>