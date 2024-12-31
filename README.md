# dev

1. Clonar el repositorio
2. Clonar el .env
3. Una vez creado Laravel con Composer realizar las migraciones con php artisan migrate
4. Ejecutar npm run dev para la copilación del frontend.
5. Ejecutar php artisan serve para levantar el backend.

# Funcionamiento

1. ```Autenticación para loguearse como administrador```

![1](https://imgur.com/1kDipTj.png)

2. ``Foro general de los Users desde el Model del Administrador``

Las acciones que puede realizar el Admin, mientras que el model del User no puede tener esos permisos.

![2](https://imgur.com/rFolUlb.png)

Vista del User en el Foro general, utilizando la funcionalidad de Policy de Laravel, que restringe a otros Usuarios borrar o modificar todos los posts/elementos:

![3](https://imgur.com/U3NG7yR.png)

Crear y Editar Posts del foro:

![4](https://imgur.com/wKymeBx.png)

![5](https://imgur.com/wKymeBx.png)

3. ``Panel de Administrador``

Desde el panel del admin uno puede ver los usuarios, los posts, crearlos, modificarlos y borrarlos. Además de poder dar Permisos, y Roles a los distintos usuarios registrados, o incluso crearlos y asignarles los respectivos roles y permisos.

Panel de Permisos:

![6](https://imgur.com/N2zQhAR.png)

Lista de Usuarios para poder asignar/quitar Roles:

![7](https://imgur.com/DIBk9Fr.png)



