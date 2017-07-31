# Como se cargan las vistas en angularJS
```
${APP_CONST.url}/view/logistic.main.html
```
En la parte superior se puede ver un ejemplo, lo que hace esto es llamar a la ruta
```/view/logistic.main.html```, parece que llama a un archivo html guardado en la carpeta view, pero no es asi, esto es con el proposito de ofuscar el entendimiento del motor de plantillas, solo por seguridad, lo que en verdad hace es llamar al controlador viewController, este recibe como argumento la cadena ```logistic.main.html```, elimimina la ultima parte ```.html``` y carga la vista ```logistic.main```

## Cambiado a templates
La idea es evitar cargar una vista de manera recursiva, esto es muy peligroso, he decidido cambiar el detalle anterior a pasarlo a una carpeta en views llamada templates, de modo que ahi solo estaran ubicados los templates de angular, y no de otro tipo, entonces, se seguira llamando a las vistas de la misma manera, pero los templates estaran en la carpeta templates, y el controlador viewController, solo mostrara los templates de esa carpeta

Sorry si no me explico de la mejor manera, este documento ha sido editado varias veces XD

## Nombre de componentes
Acabo de investigar algo, la mania que tengo de poner, el nombre del recurso seguido del nombre del tipo de componente esta bien, pero debia de poner lo de esta manera, NombreTipo, esto se ve mucho mejor, la verdad solo es algo estetico, usar una letra capital al principio, se usa para referirse a una clase, y como todo es una clase en Laravel, entonces no estan bien definidoslos nombre como por ejemplo viewController deberia de ser ViewController, por que es el nombre de una clase controlador, esta sintaxis se llama CamelCase

### el problema
la base de datos no distingue algunos nombre en formato CamelCase, entonces se usa el under_score sintaxis

### Conclusion
* Nombre de clase
ClaseTipo
* Nombre de tabla
tabla_detalle
* Nombre de constante global
EN_MAYUSCULAS

estos tips con la idea de hacer el codigo mas entendible, ejm:

la tabla ```product_options``` esta en forma `under_score`, tendra un modelo llamado `ProductOptionsModel`

# USAR MODALES EN UNA PLANTILLA ANGULAR
he probado los modales de bootstrap, algo curioso, es que fuerzan la recarga del controlador de la vista en la que estan, esto quizas no parezca muy malo, pero lo es, ya que en caso de un formulario o un proceso de busqueda, la url se le agrega un #modal que refiere al modal, considero que una mejor manera es usar la UI de bootstrap apara angularJS

# PASOS PARA CREAR UNA NUEVA PAGINA EN LOGISTIC ANGULAR
- Registrar un link en el archivo '/resources/views/logistic/menu.blade.php'
- Registrar una ruta que responda al link anterior en '/public/js/logistic/root.js'
- Crear un archivo `.php` en '/resources/views/templates' con contenido html
- Crear un controlador angular (archivo .js) en '/public/js/logistic'
- Registrar al archivo .js anterior para ser cargado con la pagina en el archivo '/resources/views/logistic/angular.blade.php'
- Probar que la ruta funcione adecuadamente

# PASOS PARA CREAR UN NUEVO RECURSO
- Generar el recurso con el comando `php artisan make:control NombreResource --resource`
- Registrar la ruta del recurso en `/routes/api.php`
- Probar que la ruta funcione adecuadamente

## Sugerencias
El archivo `/public/js/logistic/services.js` contiene servicios para la aplicacion en angular js, estos servicios probeen de datos necesarios para registrar en una tabla relacional, estas solo devuelven datos, para usarlos, primero debe inyectarlo al controlador, agregandolo como parametro a la funcion que recive el .controller para registrar el controlador, luego declare el atributo que necesita en su $scope, para que este disponible para renderizar en la plantilla, tiene que realizar un .get() primero para que solicite los datos al servidor, para mas detalles del uso del methodo .get rebice el archivo `/public/js/logistic/generics.js`

# MONEY
Puedes formatear el dinero usando la biblioteca money-formatter