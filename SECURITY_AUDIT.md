# Auditoria preventiva — 23/10/2026

Este projeto e academico/de testes. As mudancas desta branch incluem:
- Escapar titulo, URL e descricao de receitas antes de inserir no HTML (mitigacao de XSS).
- Exigir token CSRF para formularios POST (inclusive login, cadastro e edicao).
- Transformar exclusao de receita e logout em POST com token.
- Renovar identificador de sessao apos login.
- Validar e-mail, tamanho minimo de senha e identificadores.
- Ignorar arquivos SQLite e arquivos de configuracao locais novos.

## ATENCAO: banco publicado no GitHub

O arquivo `bancodados.sqlite` **ja estava versionado na branch principal**. Adicionar .gitignore nao remove arquivos ja rastreados nem elimina dados do historico do Git. **Nao execute comandos que apaguem esse banco sem antes salvar uma copia segura**, especialmente se houver usuarios reais.

Antes de limpar o historico, exporte e confira os dados; se existirem credenciais reais, troque as senhas dos usuarios envolvidos. A limpeza do historico exige planejamento e nao foi executada nesta PR.

## Testes manuais antes de mesclar

1. Copie o banco SQLite para um arquivo de backup fora do projeto.
2. Verifique que login e cadastro funcionam com tokens de formulario.
3. Verifique que nova receita, edicao e exclusao funcionam com sessao valida.
4. Tente enviar formulario sem CSRF: deve responder HTTP 403.
5. Tente cadastrar titulo `<script>alert(1)</script>`: deve aparecer como texto, sem executar JavaScript.
6. Verifique que URLs GET de exclusao nao removem receitas.

Sem publicacao automatica nem alteracao de banco efetuada por esta branch.
