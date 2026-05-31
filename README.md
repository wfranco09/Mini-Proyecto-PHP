
<p align="center">
  <img src="imgs/ima1.webp" width="800">
</p>

## MiniMini Proyecto #2 de Sentencias de Control y Clases - Resolviendo problemas con estructuras de decisión y repetición en PHP

## 🎯Objetivos del laboratorio
Construir aplicaciones web aplicando principios, técnicas, metodologías y
herramientas de diseño y desarrollo que permita la optimización, facilidad de
mantenimiento, cumpliendo los criterios de usabilidad y accesibilidad.

## Objetivos especificos
Aplicar estructuras de control condicional y repetitiva, funciones matemáticas,
funciones de validación, clases con métodos estáticos, para resolver problemas
algorítmicos, utilizando buenas prácticas de programación como las
recomendaciones de PSR-1, PSR-4, Recomendación OWASP, principio DRY
(Don't Repeat Yourself).

## Metodología
En Grupo de tres estudiantes resolverán una serie de problemas que requieren el
uso de estructuras como if, case, while, for, foreach, swtich, arreglos, funciones y
clases. Cada problema deberá resolverse mediante el lenguaje de programación
PHP. Se evaluará no solo la lógica del algoritmo, sino también su claridad, estilo y
nomenclatura utilizada (camelCase para nombres de métodos/procedimientos,
camelCase para variables).


## ⚙️ Requisitos Previos

Para ejecutar este proyecto se requiere:

- PHP 8.2 o superior
- Composer (última versión)
- Autoload
- Bases de datos Mysql
- XAMPP (Apache y MySQL)

### 🌐 Tecnologías utilizadas

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) 
![Composer](https://img.shields.io/badge/Composer-885630?style=for-the-badge&logo=composer&logoColor=white) 
![XAMPP](https://img.shields.io/badge/XAMPP-F37623?style=for-the-badge&logo=xampp&logoColor=white) 
![MySQL](https://img.shields.io/badge/MySQL-00758F?style=for-the-badge&logo=mysql&logoColor=white) 
![Autoload](https://img.shields.io/badge/Composer-Autoload-orange) 


## 👩🏻‍💻Guía de Instalación
### Clonar el repositorio:
```bash
git clone https://github.com/wfranco09/PSR-4.git
```
### Acceder a la carpeta del proyecto:
```bash
cd autoload-psr4
```
### Instalar dependencias y generar el autoload:
```bash
composer install
```
### O en caso necesario:
```bash
composer dump-autoload
```

## Funcionamiento del Autoload y Clases

En este proyecto se implementa la carga automática de clases utilizando Composer
bajo el estándar PSR-4, lo que permite instanciar clases sin necesidad de incluir
archivos manualmente mediante require o include.

## El archivo principal (index.php) únicamente requiere:
```bash
require 'vendor/autoload.php';
```
Este archivo es generado automáticamente por Composer y se encarga de localizar
e incluir las clases según el namespace definido en composer.json.

## Relación Namespace ↔ Ruta

El archivo composer.json define el mapeo entre namespaces y carpetas físicas:
```bash
"autoload": {
    "psr-4": {
        "App\\": "App/",
        "Database\\": "Database/"
    }
}
```

## Nota
La carpeta `vendor/` no se incluye en el repositorio, ya que es generada automáticamente mediante Composer al ejecutar `composer install` o `composer dump-autoload`.

## Estructura de Carpetas

El proyecto sigue el estándar PSR-4 y el patrón de diseño MVC:
```bash
PSR-1/
│
├── App/                              → Namespace: App\
│   ├── Controllers/                  → Controladores MVC
│   │   ├── MenuController.php
│   │   ├── EstacionController.php    → Problema #8
│   │   ├── EstadisticaController.php → Problema #7
│   │   └── PotenciaController.php    → Problema #9
│   │
│   ├── Models/                       → Modelos MVC (lógica de negocio)
│   │   ├── EstacionModel.php
│   │   ├── EstadisticaModel.php
│   │   └── PotenciaModel.php
│   │
│   ├── Utilities/                    → Clases utilitarias estáticas
│   │   └── Utilidades.php
│   │
│   └── View/                         → Vistas MVC
│       ├── partials/
│       │   ├── header.php            → DRY: cabecera reutilizable
│       │   └── footer.php            → DRY: footer con fecha dinámica
│       ├── menu.php
│       ├── estacion.php
│       ├── estadistica.php
│       └── potencia.php
│
├── imgs/                             → Recursos visuales
├── vendor/                           → Generado por Composer (no incluido)
├── .gitignore
├── composer.json                     → Configuración PSR-4
└── index.php                         → Punto de entrada / Router
```

## Relación clave:
```bash
Namespace: App\User  
Ruta física: App/User.php

```


## Principio DRY aplicado

- `header.php` y `footer.php` son componentes compartidos por todas las vistas
- El menú usa un `foreach` sobre un arreglo para evitar repetir HTML
- `Utilidades.php` centraliza toda la lógica de validación y sanitización
- Cada controlador reutiliza el mismo método `cargarVista()`

## Clases Utilitarias con Métodos Estáticos

```php
// Sanitización XSS
Utilidades::limpiarXss($valor);

// Validación de fecha
Utilidades::esFechaValida($fecha);

// Valor por defecto si está vacío
Utilidades::nvl($var, $default);

// Enlace de navegación seguro
Utilidades::enlaceNavegacion($url, $etiqueta);
```

## Conclusiones Técnicas

### 🔹 Mantenibilidad
El patrón MVC separa la lógica de negocio de la presentación, facilitando
el mantenimiento y escalabilidad del proyecto.

### 🔹 Seguridad
La clase `Utilidades` centraliza todas las validaciones y sanitizaciones,
aplicando las recomendaciones OWASP para prevenir ataques XSS e inyección.

### 🔹 Estandarización
El uso de PSR-1 y PSR-4 garantiza una estructura clara, nomenclatura
consistente y compatibilidad con frameworks modernos como Laravel.

### 🔹 Eficiencia
El principio DRY reduce la duplicación de código, minimizando los puntos
de fallo y facilitando futuras modificaciones.stándar PSR-4 proporciona una estructura clara y organizada, permitiendo que el proyecto sea más entendible y compatible con frameworks modernos como Laravel.



## Autores
**Winstron Franco**<br>
**Joseph Córdoba**<br>
**Guillermo Mas**<br>

1GS131 - Desarrollo de Software VII 
Universidad Tecnológica de Panamá  

📧 **Email:** winston.franco@utp.ac.pa<br>
📧 **Email:** winstonfranco56@gmail.com<br>
🌐 **GitHub:** https://github.com/wfranco09<br>

**Instructor del Laboratorio::** Ing. Irina Fong

## Fecha de Ejecución del Laboratorio
5 de mayo 2026

