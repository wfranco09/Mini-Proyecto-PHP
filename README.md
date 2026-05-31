
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

En este proyecto se implementa la carga automática de clases utilizando Composer bajo el estándar PSR-4, lo que permite instanciar clases sin necesidad de incluir archivos manualmente mediante require o include.

## El archivo principal (index.php) únicamente requiere el archivo:
```bash
require 'vendor/autoload.php';
```
Este archivo es generado automáticamente por Composer y se encarga de localizar e incluir las clases según el namespace definido en el archivo composer.json.

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
Esto significa que:
- App\User → App/User.php
- Database\model\ProductModel → Database/model/ProductModel.php

## Código de las Clases 
🔹 Clase User
```bash
namespace App;
class User {
    public function getName(): string
    {
        return "Dave";
    }
}
```
### Descripción:
Esta clase representa un usuario del sistema.
```bash
Función getName()
```
Retorna el nombre del usuario en formato de cadena (string).

🔹Clase ProductModel
```bash
namespace Database\model;

class ProductModel {
    public function getId(): int
    {
        return 123;
    }
}
```
### Descripción:
Esta clase simula un modelo de datos de producto.
```bash
Función getId()
```
Retorna el identificador del producto como un número entero (int)


## Uso en el sistema
En el archivo principal (index.php) se utilizan las clases de la siguiente manera:
```bash
use App\User;
use Database\model\ProductModel;

$user = new User();
echo $user->getName();

$product = new ProductModel();
echo $product->getId();

```
Gracias al autoload, no es necesario incluir manualmente los archivos de las clases.

## Nota
La carpeta `vendor/` no se incluye en el repositorio, ya que es generada automáticamente mediante Composer al ejecutar `composer install` o `composer dump-autoload`.

## Estructura de Carpetas
El proyecto sigue el estándar PSR-4, donde los namespaces están directamente relacionados con la estructura de carpetas:
```bash
autoload-psr4/
│
├── App/                          → Clases principales (Namespace: App)
│   └── User.php
│
├── Database/
│   └── model/                    → Modelos del sistema
│       └── ProductModel.php
│
├── imgs/                         → Recursos visuales (imágenes del README)
│
├── .gitignore                    → obligando a que la carga automática se genere localmente mediante Composer.
│
├── composer.json                 → Configuración de Composer (PSR-4)
└── index.php                     → Punto de entrada del sistema
```

## Relación clave:
```bash
Namespace: App\User  
Ruta física: App/User.php

```

## Pruebas de Ejecución - Imagenes
A continuación se muestran evidencias del correcto funcionamiento del sistema utilizando Composer Autoload bajo el estándar PSR-4.
### Generación del Autoload
Se ejecutó el comando para generar los archivos de carga automática:

![imagen](imgs/im1.png)

Esto permite que Composer registre automáticamente las clases según su namespace y ruta definida.

### Ejecución del Sistema
Se ejecutó el archivo principal del proyecto:

![imagen](imgs/im2.png) 

Esta imagen demuestra que:
- Las clases fueron cargadas automáticamente
- No se utilizaron require manuales
- El sistema funciona correctamente sin errores de tipo Class not found

## Conclusiones Técnicas

### 🔹 Mantenibilidad
El uso de Composer Autoload permite nos agregar nuevas clases al proyecto sin necesidad de modificar manualmente múltiples archivos, lo que facilita la escalabilidad y organización del sistema.

### 🔹 Eficiencia de Memoria
Gracias al concepto de Lazy Loading, las clases se cargan únicamente cuando son necesarias, optimizando el uso de memoria y mejorando el rendimiento del sistema.

### 🔹 Estandarización
El uso del estándar PSR-4 proporciona una estructura clara y organizada, permitiendo que el proyecto sea más entendible y compatible con frameworks modernos como Laravel.


## Autor
**Winstron Franco**  
1GS131 - Desarrollo de Software VII 
Universidad Tecnológica de Panamá  

📧 **Email:** winston.franco@utp.ac.pa<br>
📧 **Email:** winstonfranco56@gmail.com<br>
🌐 **GitHub:** https://github.com/wfranco09<br>

**Instructor del Laboratorio::** Ing. Irina Fong

## Fecha de Ejecución del Laboratorio
5 de mayo 2026

