# Crie o arquivo .env 
```sh
touch .env
echo -e "MYSQL_HOST=\nMYSQL_USER=\nMYSQL_PASSWORD=\nMYSQL_NAME=\nWORDPRESS_PORT=\n" > .env
```
Preencha os valores no seu `.env`

# Comando para rodar 
```sh
docker compose up -d
```
O site vai rodar na porta que você definir no WORDPRESS_PORT

# Endpoints
|      URL      |     Página    | 
| ------------- | ------------- |
| /wp-json/api/pages/ | Páginas |
| /wp-json/api/pages/{slug-page} | Página por slug |
| /wp-json/api/gallery | Galeria e listagem de imagens |
| /wp-json/api/carousel | Imagens do carrossel |
| /wp-json/api/carousel?local={slug-page} | Lista imagens carrosel por Página  |


