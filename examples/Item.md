
## Productos/Servicios

### Uso 

```php
use Alegra\Support\Facade\Item;
```

Colsultar un producto/servicio por id

```php
try {
   $product = Item::get(12);
} catch (AlegraException $e){
    #...
}
```

Consultar lista de productos/servicios, las lista de parametros la podes encontrar en [parametros](https://developer.alegra.com/docs/lista-de-productos-o-servicios)

```php
try {
   $productCollection = Item::all([
       'query' => 'cuaderno'
       ....
   ]);
} catch (AlegraException $e){
    #...
}
```