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