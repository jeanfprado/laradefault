<h1>Sobre o Projeto</h1>
<p>Projeto Padrão baseado no Laravel 5.6</p>
<h1>Descrição</h1>
<p>Painel Administrativo com controle de acesso ACL Nativo</p>
<p>Papeis de Acesso</p>
<p>Permissões</p>
<h1>Pacotes de Terceiros</h1>
<p>Fácil integração do AdminLTE com o Laravel: <a target="_blank" href="https://github.com/jeroennoten/Laravel-AdminLTE" >AdminLTE</a></p>
<p>HTML e Form Builders para o Laravel Framework: <a target="_blank"  href="https://laravelcollective.com/docs/master/html" >Laravel Collective</a></p>
<p>Repositórios para resumo da camada de banco de dados: <a target="_blank" href="https://github.com/andersao/l5-repository" >l5-Repository</a></p>
<h1>Orientações</h1>
<p><code>php artisan migrate --seed</code></p>
<p>Permissões são criadas e deletadas somente por comandos no artisan</p> 
<spam>Exemplos</spam> <br>
<p> Criar nova permissão: argumentos name title <code>php artisan permission:create module_user.create "Criar Usuário"</code> </p>
<p> Deletar permissão: argumento id<code>php artisan permission:destroy 1 </code></p>