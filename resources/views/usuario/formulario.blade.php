<form method="POST" action="/enviar-formulario">
    @csrf
    <input type="text" name="nome" placeholder="Nome">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Enviar</button>
</form>