<?php
header('Content-Type: text/html; charset=utf-8');
function my_autoloader($users)
{
    include_once './' . $users . '.php';
}

spl_autoload_register('my_autoloader');

$users = new User();

if (!empty($_POST['submit1'])) {

    $users->update($_POST);
}
if (!empty($_POST['submit2'])) {
    $users->delete($_POST);
}
if (!empty($_POST['submit3'])) {
    $users->create($_POST);
}
$user = $users->list();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php foreach ($user as $users): ?>
<table>
        <form action="index.php" method="post">
            <tr><td><input type="number" id="id" name="id" placeholder="id" value="<?=$users['id']?>"></td></tr>
            <tr><td><input type="text" id="email" name="email" placeholder="Почта" value="<?=$users['email']?>"></td></tr>
            <tr><td><input type="text" id="first_name" name="first_name" placeholder="Имя" value="<?=$users['first_name']?>"></td></tr>
            <tr><td><input type="text" id="last_name" name="last_name" placeholder="Фамилия" value="<?=$users['last_name']?>"></td></tr>
            <tr><td><input type="number" id="age" name="age" placeholder="Возраст" value="<?=$users['age']?>"></td></tr>
            <tr><td><input type="submit" name="submit1" id="submit1" value="сохранить"><input name="submit2" type="submit" id="submit2" value="удалить" onclick="location.href='/?delete=<?=$user['id']?>'"></td></tr>
        </form>
</table>
<?php endforeach;?>
    <form action="index.php" method="post">
    <table>
            <tr><td><input type="number" name="id" id="id" placeholder="id"></td></tr>
            <tr><td><input type="text" name="email" id="email" placeholder="Почта"></td></tr>
            <tr><td><input type="text" name="first_name" id="first_name" placeholder="Имя"></td></tr>
            <tr><td><input type="text" name="last_name" id="last_name" placeholder="Фамилия"></td></tr>
            <tr><td><input type="number" name="age" id="age" placeholder="Возраст"></td></tr>
            <tr><td><input type="submit" name="submit3" id="submit3" value="создать"></td></tr>
    </table>
    </form>
</body>
</html>





