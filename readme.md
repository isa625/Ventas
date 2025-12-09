# Imagina que este archivo es algo que estas modificando en tu codigo
Algo que estas cambiando.. un archivo... un archivo nuevo...

o incluso algo que estas eliminando... fijate que cuando guardas los cambios.. se te pone los cambios que hiciste en esta parte

ves ese icono que parece una ramita?
si

bien... ese es el icono de git.. 
en esa seccion de changes.. esta todos los archivos que moviste

para subirlos solo haces esto... 

haces click en ese icono de "+"
cuando lo hagas los cambios pasaran a stagging (que es la parte de arriba)

luego.. pones un breve resumen de los cambios que estas haciendo aca

luego le das a la flecha y das donde dice "commit and push".. 
ojo... no le des solo a commit.. tiene que ser "commit and push"

y como puedes ver esto automaticamente sube el cambio a git gg


# Subir codigo a git por comandos

Abres tu terminal..(puede ser cmd, gitbash o la que tu quieras, incluso la terminal de vsc, la terminal de vsc se abre y cierra usando ctrl + j)

usas los siguientes comandos 

```bash
git add -A
```

```bash
git commit -m "Aqui pones el mensaje de tu commit"
```

```bash
git push -u origin master
```

