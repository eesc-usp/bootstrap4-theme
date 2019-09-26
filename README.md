# Template-sistemas
Template básico para sistemas da unidade

## Instalação

Coloque no seu composer.json 
```
    "repositories": [
        {
            "type": "composer",
            "url": "https://asset-packagist.org"
        }
    ],
    "extra": {
        "installer-types": [
            "bower-asset",
            "npm-asset"
        ],
        "installer-paths": {
            "www/assets/{$name}/": [
                "type:bower-asset",
                "type:npm-asset"
            ]
        }
    },
```
Depois 

```
Composer require eesc/bootstrap4-theme
```


## Configuração

Este template copia os assets para a pasta www/ que é a pasta publica que deve ser servida pelo Apache.
