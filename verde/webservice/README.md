
API - JSON - Hackthon #IziBUS
Enviar dados por POST
Usuários - Integração Governo

Salvar usuário - http://app/usuarios/salvar

Envia: POST(login, senha)

Retorno:
{"mensagem":"Usuario cadastrado com sucesso","status":true}

Erros:
{"mensagem":"Login j\u00e1 existe.","status":false}

Listar todos os usuarios - http://app/usuarios/listar_todos
[{"idusuario":"2","login":"beto_richa","senha":"1334fcee3c919b0725b7f2766afbbe85","situacao":"A"},{"idusuario":"3","login":"carlos","senha":"1334fcee3c919b0725b7f2766afbbe85","situacao":"A"},{"idusuario":"4","login":"carss","senha":"1334fcee3c919b0725b7f2766afbbe85","situacao":"A"},{"idusuario":"1","login":"marcos_santos","senha":"b38d5524d1ccfc11b182e9bae3e20657","situacao":"A"}]
Localização - Geolocalização e informação sobre o transporte

Salvar localizacao - http://app/listar_geos/salvar

Envia: POST(linha, latitude, longitude, texto_situacao)

Retorno:
{"mensagem":"Localização cadastrado com sucesso","status":true}

Erros:
{"mensagem":"erro ao salvar localizacao","status":false}

Listar localizacao - http://app/listar_geos/listar_todos

Envia: POST()

Retorno:
[ { "linha": "469 - CENTRO POLIT\u00c9CNICO", "latitude": "-25.3490948", "longitude": "-49.1935856", "informacao": "#BusaoLotado" }, { "linha": "469 - CENTRO POLIT\u00c9CNICO", "latitude": "-25.7790948", "longitude": "-48.1935856", "informacao": "#SentadoNoBusao" }, { "linha": "216 - CABRAL \/ PORT\u00c3O", "latitude": "4546545", "longitude": "121231321", "informacao": "#BusaoLivreTop" } ] 