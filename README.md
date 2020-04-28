<p align="center"><img width="300px" src="https://cdn2.alegra.com/website/Logos_Alegra/Logotipo-Alegra.png"></p>

<p align="center">
<a href="https://travis-ci.org/millancore/alegra?branch=master"><img src="https://travis-ci.org/millancore/alegra.svg?branch=master" alt="Build Status"></a>
<a href="https://codeclimate.com/github/millancore/alegra/maintainability"><img src="https://api.codeclimate.com/v1/badges/10674e248e908aedc7e4/maintainability" /></a>
<a href="https://codeclimate.com/github/millancore/alegra/test_coverage"><img src="https://api.codeclimate.com/v1/badges/10674e248e908aedc7e4/test_coverage" /></a>

**Importante!!** Este SDK solo cuenta con metodos para administrar **Inventario** a traves de la API de Alegra, si usted necesita usar otros endpoints, este SDK fue creado modularmente lo que le permitira usarlo como marco de trabajo facilitandole la integracion.

## Alegra SDK

Este es un SDK para para la API de [alegra.com](https://alegra.com ) que busca simplificar la integracion con proyectos en PHP.

## Instalacion  
**PHP 7.2 o superior**

```bash
composer require millancore/alegra
```

## Configuracion 

```php
use Alegra\Alegra;
use Alegra\Support\Country;

$alegra = Alegra::setCredentials([
    'email' => 'alegrauser@email.com',
    'token' => 'tokenAuthApiAccess',
    Country::COL
]);
```

#### Logger (Opcional)

Es posible que se desee tener logs de la interacion con la API, para ello puede setear un Logger que cumpla con PSR-3. (Monolog, Laravel, Symfony etc)

```php

$alegra->setLogger($PSRLogger);

```

#### Eventos (Opcional)

Los procesos mas criticos dentro de este SDK [Request, Error, Response] lanzan eventos, usted puede agregar un Listener para estos eventos de una manera sencilla permitiendole tomar deciciones en cada caso. (notificaciones, stats, error tracking etc.)

Para crear un clase Listener solo debe implementar `Alegra\Contract\ListenerInterface` y agregar el listener a la instancia de Alegra.

```php

$alegra->addListener($myListener);

```
Cada evento despachado cuenta con dos metodos pricipales para acceder al contenido del evento `$event->getName()` y `$event->getParams()`.


## Uso

Alegra cuenta con una variedad de endpoints, lo mas probable es que necesite hacer uso de estos desde diferentes puntos, en este SDK hemos pensando en facilitar esta tarea implementando
**Facades** para cada grupo.

Asi que para traer un producto por Id es tan simple como esto.

```php

use Alegra\Support\Facade\Item;

$product = Item::getByName(12);

```

Aqui una lista de los Facades disponibles, cada uno cuenta con la lista de metodos asi como ejemplos sencillos de uso.

 - Productos y Servicios [Item](https://github.com/millancore/alegra/blob/master/examples/Item.md)
 - Categorias [Category](https://github.com/millancore/alegra/blob/master/examples/Category.md)
 - Bodegas [Warehouse](https://github.com/millancore/alegra/blob/master/examples/Warehouse.md)
 - Lista de Precios [PriceList](https://github.com/millancore/alegra/blob/master/examples/PriceList.md)

 ### Entidades

Cuando hacemos llamadas a la API de Alegra a traves de este SDK obtenemos entidades, podemos acceder a las propiedades de cada entidad de la siguiente manera.

```php
$product = Item::getByName(12);

$product->id
$product->name
$product->... 
```
Siguendo el mismo esquema de nombres que esta presente en la [documentacion](https://developer.alegra.com/docs/productos-o-servicios) de la API.

Las entidades tambien cuenta con metodos que nos permiten manejar sus datos de diferentes maneras.

Array

```php
$arrayProduct = $product->toArray();
```

Json

```php
$jsonProduct = json_encode($product);
```

### Colecciones

Algunas propiedades del las entidades son colecciones de otras, las colecciones son objetos iterables
que nos permiten recorrerlos para hacer uso de las entidades almacenadas.

Iterar
```php
foreach($product->price as $price) {
    #Price Entity
}
```

Contar
```php
$product->price->count();
```

Array
```php
$arrayPriceList = $product->price->toArray(); 
```

Json
```php
$jsonPriceList = json_encode($product->price); 
```

## Manejo de Excepciones

Este SDK maneja una serie de excepciones segun diferentes posibles casos de error o validacion,
sin embargo todas extienden de `Alegra\Exception\AlegraException` lo que simplifica el manejo 
de excepciones.

```php
use Alegra\Support\Facade\Item;
use Alegra\Exception\AlegraException;

try {
    $product = Item::getByName(12);
} catch (AlegraException $exception) {
    #....
}

```
