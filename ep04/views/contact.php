<form action="<?= $url; ?>/contato" method="POST">
    <select name="_method">
        <option value="POST">POST</option>
        <option value="PUT">PUT</option>
        <option value="PATCH">PATCH</option>
        <option value="DELETE">DELETE</option>
    </select>

    <input type="text" name="first_name" placeholder="Nome"/>
    <input type="text" name="last_name" placeholder="Sobrenome"/>
    <input type="text" name="email" placeholder="E-mail"/>

    <button>CoffeeCode</button>
</form>