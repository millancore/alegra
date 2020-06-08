
## Lista de Precios

### Uso

```php
use Alegra\Support\Facade\PriceList;
```

Consultar una lista de precios por id.

```php
try {
   $priceList = PriceList::get(12);
} catch (AlegraException $e){
    #...
}

$priceList->id;

```
Consultar listado de lista de precios.


```php
try {
   $priceListCollection = PriceList::all();
} catch (AlegraException $e){
    #...
}

foreach($priceListCollection as $priceList) {
    #...
}
```
