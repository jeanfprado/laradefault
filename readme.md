<h1>Sobre o Projeto</h1>
<p>Projeto Padrão baseado no Laravel 5.6</p>
<h1>Descrição</h1>
<p>Painel Administrativo com controle de acesso ACL Nativo</p>
<p>Papeis de Acesso</p>
<p>Permissões</p>
<h1>Pacotes de Terceiros</h1>
<p>AdminLTE</p>
<p>Laravel Collective</p>
<p>r5-Repository</p>
<h1>Orientações</h1>
<code>php artisan migrate --seed</code>
<p>Permissões são criadas e deletadas somente por comandos no artisan</p> <br>
<spam>Exemplos</spam>
<code>php artisan permission:create module_user.create "Criar Usuário"</code> <br>
<code>php artisan permission:destroy 1 </code>