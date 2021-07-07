<?php require __DIR__ . "/../inicio-html.php"; ?>

<form action="/realiza-login" method="POST">
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" class="form-control" id="senha" name="senha">
    </div>

    <button class="btn btn-success" name="salvar">Entrar</button>

</form>

<?php require __DIR__ . "/../fim-html.php"; ?>