# API PARA TESTE PR�TICO SGBr SISTEMAS

## COMO RODAR

Necess�rio ter docker instalado pr�viamente. Caso esteja sendo utilizando um sistema Windows, � necess�rio instalar o WSL, conforme especificado no docker.

1� Passo: Clonar o reposit�rio para sua m�quina. Em um sistema Windows, � necess�rio abrir um terminal com WSL, e instalar o projeto no ambiente linux, e n�o windows.

2� Passo: Fazer seu terminal apontar para a pasta do projeto

3� Passo: Criar um arquivo .env com as informa��es:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:edQFwRbeADfy5pOqQ1QeiydXbSXClBmqtuO+iN+dD8c=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=sgbr_api
DB_USERNAME=sail
DB_PASSWORD=password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700
WWWGROUP=1000
WWWUSER=1000
```

4� Passo: Rodar o comando a seguir no terminal com WSL(windows).

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

Para rodas os testes unit�rios implementados, rodar o seguinte comando no terminal apontado para o projeto.


```
sudo ./vendor/bin/sail test

```
