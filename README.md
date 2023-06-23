# API PARA TESTE PRÁTICO SGBr SISTEMAS

## COMO RODAR

Necessário ter docker instalado préviamente. Caso esteja sendo utilizando um sistema Windows, é necessário instalar o WSL, conforme especificado no docker.

1° Passo: Clonar o repositório para sua máquina. Em um sistema Windows, é necessário abrir um terminal com WSL, e instalar o projeto no ambiente linux, e não windows.

2° Passo: Fazer seu terminal apontar para a pasta do projeto

3° Passo: Rodar o comando a seguir no terminal com WSL(windows).

```
sudo ./vendor/bin/sail up

```

## ENDPOINTS

Existe um arquivo .JSON (Localhost.postman_collection(2).json) com todas as rotas implementadas apontado para o localhost.

# GET

/api/v1/local

/api/v1/local/$id

/api/v1/local?query

Filtros implementados para campos string: eq (equal), ne (not equal).
Filtros implementados para campos datetime: eq (equal), ne (not equal), gt (greater then), lt (lesser then), lte (lesser then or equal), gte (greater then or equal).

# POST
/api/v1/local

# PATCH
/api/v1/local/$id

# DELETE
/api/v1/local/$id

## TESTES

Para rodas os testes unitários implementados, rodar o seguinte comando no terminal apontado para o projeto.


```
sudo ./vendor/bin/sail test

```
