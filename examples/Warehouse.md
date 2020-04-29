
## Bodegas

### Uso

```php
use Alegra\Support\Facade\Warehouse;
```

Consultar una bodega por id.

```php
try {
   $warehouse = Warehouse::getById(12);
} catch (AlegraException $e){
    #...
}

$warehouse->id;
```

Consultar listado de Bodegas.

```php
try {
   $warehouseCollection = Warehouse::getList();
} catch (AlegraException $e){
    #...
}

foreach($warehouseCollection as $warehouse) {
    #...
}
```