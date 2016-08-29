BaconMediaLibraryBundle
===============

Este bundle é responsavel por adicionar recurso de biblioteca de midia estilo do wordpress. Este bundle é integrado com LiipImagineBundle, OneupUploaderBundle e o KnpGaufretteBundle.

## Instalação

Para instalar o bundle basta rodar o seguinte comando abaixo:

```bash
$ composer require baconmanager/media-library-bundle
```
Agora adicione os seguintes bundles no arquivo AppKernel.php:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    // ...
    new Oneup\UploaderBundle\OneupUploaderBundle(),
    new Bacon\Bundle\MediaLibraryBundle\BaconMediaLibraryBundle(),
    new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
    new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
    new Liip\ImagineBundle\LiipImagineBundle(),
    // ...
}
```
Há 2 opções de configuração ou você importa o arquivo de configuração do bundle ou adiciona as configurações 
no arquivo **app/config/config.yml**.

```yaml
    - { resource: "@BaconMediaLibraryBundle/Resources/config/config.yml"}
```
Adicionar as seguintes linhas no arquivo **app/config/routing.yml**
services:

```yaml
bacon_media_library:
    resource: "@BaconMediaLibraryBundle/Controller/"
    type:     annotation
    prefix:   /
```

Configurar os demais bundles conforme sua documentação