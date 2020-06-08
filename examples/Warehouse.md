
## Bodegas

### Uso

```php
use Alegra\Support\Facade\Warehouse;
```

Consultar una bodega por id.

```php
try {
   $warehouse = Warehouse::get(12);
} catch (AlegraException $e){
    #...
}

$warehouse->id;
```

Consultar listado de Bodegas.

```php
try {
   $warehouseCollection = Warehouse::all();
} catch (AlegraException $e){
    #...
}

foreach($warehouseCollection as $warehouse) {
    #...
}
```