<p align="center"><img width="300px" src="https://cdn2.alegra.com/website/Logos_Alegra/Logotipo-Alegra.png"></p>

<p align="center">
<a href="https://travis-ci.org/millancore/alegra?branch=master"><img src="https://travis-ci.org/millancore/alegra.svg?branch=master" alt="Build Status"></a>
<a href="https://codeclimate.com/github/millancore/alegra/maintainability"><img src="https://api.codeclimate.com/v1/badges/802c342410008cbd8c08/maintainability" /></a>
<a href="https://codeclimate.com/github/millancore/alegra/test_coverage"><img src="https://api.codeclimate.com/v1/badges/802c342410008cbd8c08/test_coverage" /></a>
</p>

**Importante** Este SDK solo cuenta con metodos para administrar Inventario a traves de la API de Alegra, si usted necesita usar otros endpoints, este SDK fue creado modularmente lo que le permitira usarlo como marco de trabajo facilitandole enormemente la integracion.

Pongase en contacto conmigo, estare encantado de indicarle como agregar nuevas funcionalidades. 

## Alegra SDK

Este es un SDK para para la API de [alegra.com]() que busca simplificar la integracion con proyectos en PHP.

## Instalacion  
**PHP 7.1 o superior**

```bash
composer require millancore/alegra
```

## Configuracion 

```php
$alegra = Alegra::setCredentials([
    'email' => 'alegrauser@email.com',
    'token' => 'tokenAuthApiAccess'
]);
```

#### Logger

Es posible que se desee tener logs de la interacion con la API, para ello puede setear un Logger que cumpla con PSR-3. (Monolog, Laravel, Symfony etc)

```php

$alegra->setLogger($PSRLogger);

```

#### Eventos

Los procesos mas criticos dentro de este SDK [Request, Error, Response] lanzan eventos, usted puede agregar un Listener para estos eventos de una manera sencilla permitiendole tomar deciciones en cada caso. (notifiaciones, conteos, error tracking etc.)

Para crear un clase Listener solo debe implementar `Alegra\Contract\ListenerInterface` y agregar el listener a la instancia de Alegra.

```php

$alegra->addListener($myListener);

```
Cada evento despachado cuenta con dos metodos pricipales para accder a al contenido del evento `$event->getName()` y `$event->getParams()`.


## Uso

Alegra cuenta con una variedad de endpoints lo que implica que haremos uso de dichos enpoints desde diferentes puntos de nuestro software, en este SDK hemos pensando en facilitar esta tarea implementando
**Facades** para cada grupo.

Asi que para traer in producto por Id es tan simple como esto.

```php

use Alegra\Support\Facade\Items;

$product = Items::getByName(12);

```

Aqui una lista de los Facades disponibles, cada uno cuenta con la lista de metodos asi como ejemplos sencillos de uso.

 - Productos y Servicios [Items]()
 - [ItemsCategories]()
 - Categorias [Categories]()
 - Bodegas [Warehouses]()
 - Lista de Precios [PriceLists]()