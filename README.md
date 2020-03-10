# README
#### algunos puntos a aclarar
1. no entendi muy bien si la reservacion de libros es igual a la compra de un libro, por lo que he agregado un campo 'status' que varia entre reservado y vendido
2. no entendi muy bien el punto de los cupones de ayuda
3. aca se deja la documentacion de los endponits
___
Ruta: **GET**  http://127.0.0.1:8000/api/book
**Descripcion:** trae todos los libros guardados
**Parametros:**
**headers:**
- Accept: application/json
___
Ruta: **POST**  http://127.0.0.1:8000/api/book
**Descripcion:** guarda un nuevo libro 
**Parametros:**
- name (string): nombre del libro
- cant (int): cantidad de unidades disponibles
- fk_idAutor (int): clave foranea id del autor
- price (int): precio del libro

**headers:**
- Accept: application/json
___
Ruta: **GET**   http://127.0.0.1:8000/api/book/{ id } 
**Descripcion:** trae un libro especifico se busca por id.
**Parametros:**
- PATH : id (int): id del libro a buscar

**headers:**
- Accept: application/json
___
Ruta: **PUT**   http://127.0.0.1:8000/api/book/{ id } 
**Descripcion:** Actualiza un libro
**Parametros:**
- PATH : id (int): id del libro a buscar
- name (string): nombre del libro
- cant (int): cantidad de unidades disponibles
- fk_idAutor (int): clave foranea id del autor
- price (int): precio del libro


**headers:**
- Accept: application/json
**NOTA:** parsear como x-www-form-urlencoded
___

Ruta: **DELETE**   http://127.0.0.1:8000/api/book/{ id } 
**Descripcion:** elimina un libro
**Parametros:**
- PATH : id (int): id del libro a buscar
**headers:**
- Accept: application/json

___

Ruta: **POST**   http://127.0.0.1:8000/api/reservation
**Descripcion:** crea una nueva de reservacion de un libro 
**Parametros:**
- cant (int): cantidad de libros reservados
- idClient (int): llave foranea id del cliente
- idBook (int): llave foranea id del libro a reservar;
- status (string) = reservado : estatus del libro


**headers:**
- Accept: application/json

___

Ruta: **POST**   http://127.0.0.1:8000/api/offer
**Descripcion:** inserta una nueva oferta
**Parametros:**
- name (string): nombre de la oferta           
- cant (int): cantidad de libros disponibles para la oferta   
- idBook (int): clave foranea id del libro de la oferta 
- percent (int): porcentaje de oferta (del 1 al 100) 
- endOffer (date): fecha de culminacion de la oferta

**headers:**
- Accept: application/json

___

Ruta: **GET**   http://127.0.0.1:8000 api/salesReport
**Descripcion:** exporta reporte de ventas en formato CSV
**Parametros:**

**headers:**
- Accept: application/json
- id (int): id del cliente a realizar el reporte
- desde(string):'0000-00-00' rango de fecha inicial
- desde(string):'0000-00-00' rango de fecha final
- status (string) = 'reservado' 

___

Ruta: **GET**   http://127.0.0.1:8000 api/transactions/balance
**Descripcion:** muestra el balance de los usuarios
**Parametros:**

**headers:**
- Accept: application/json
- id (int): id del cliente a realizar el reporte
- person (string) = client/author: tipo de persona a buscar el balance 

___

Ruta: **GET**  http://127.0.0.1:8000 api/transactions/sales
**Descripcion:** muestra muestra las ventas de un autor (tambien puede mostrar las reservaciones)
**Parametros:**

**headers:**
- Accept: application/json
- id (int): id del autor 
- desde (string) '0000-00-00': fecha de inicio de la busqueda
- desde (string) '0000-00-00': fecha de fin de la busqueda
- status (string): reservado/vendido
