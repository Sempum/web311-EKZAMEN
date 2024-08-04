<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Здравствуйте! Мы рады приветствовать вас на сайте Tech-city. </h1>
    <p>У нас Вы сможете найти всю необходимую документацию для вашей техники. <br>Надеемся, вам будет удобно пользоваться нашим сайтом.</p>

    <h4>Ващи данные для входа</h4>

    <table>
        <tr>
            <td>
                <strong>Имя пользователя:</strong>
            </td>
            <td>
                {{ $userName }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong>
            </td>
            <td>
                {{ $userEmail }}
            </td>
        </tr>
        <tr>
            <td>
                <strong>Пароль:</strong>
            </td>
            <td>
                {{ $userPass }}
            </td>
        </tr>
    </table>

</body>
</html>
