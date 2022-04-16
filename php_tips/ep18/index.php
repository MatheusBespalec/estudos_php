<?php

    require __DIR__ . '/vendor/autoload.php';
    echo '<pre>';

    use Source\Models\User;

    if ($_POST['identifier'] === 'login') {
        $user = (new User())->find("email = :name", "name={$_POST['email']}")->fetch();

        if ($user && password_verify($_POST['password'], $user->password)) {
            var_dump(password_needs_rehash($user->password, PASSWORD_DEFAULT));
            var_dump($user->data());
        } else {
            echo 'Crendenciais Inválidas!';
        }
    }



?>

<form action="/" method="post">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="E-mail...">
    <input type="password" name="password" placeholder="Senha...">
    <input type="hidden" name="identifier" value="login">
    <button type="submit">Entrar!</button>
</form>

<hr>

<?php

    if ($_POST['identifier'] === 'register') {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user = new User();

        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->email = $_POST['email'];
        $user->password = $pass;

        $user->save();

        if ($user->fail()) {
            echo $user->fail()->getMessage();
        } else {
            echo 'Cadastro realizado com sucesso!';
        }
    }

?>

<form action="/" method="post">
    <h2>Register</h2>
    <input type="text" name="first_name" placeholder="Nome...">
    <input type="text" name="last_name" placeholder="Sobrenome...">
    <input type="email" name="email" placeholder="E-mail...">
    <input type="password" name="password" placeholder="Senha...">
    <input type="hidden" name="identifier" value="register">
    <button type="submit">Entrar!</button>
</form>