<?php
$lang['L_CONVERT_START']="Iniciar conversión";
$lang['L_CONVERT_TITLE']="Convertir copia de seguridad al formato MSD";
$lang['L_CONVERT_WRONG_PARAMETERS']="¡Parámetros incorrectos!  La conversión no es posible.";
$lang['L_FM_UPLOADFILEREQUEST']="Por favor, elija un archivo.";
$lang['L_FM_UPLOADNOTALLOWED1']="Esta clase de archivo no está permitida.";
$lang['L_FM_UPLOADNOTALLOWED2']="Los tipos de archivo permitidos son: *.gz y *.sql";
$lang['L_FM_UPLOADMOVEERROR']="No se ha podido copiar el archivo enviado al directorio correcto.";
$lang['L_FM_UPLOADFAILED']="¡El envío del archivo ha fallado!";
$lang['L_FM_UPLOADFILEEXISTS']="¡ Ya existe un archivo con este nombre !";
$lang['L_FM_NOFILE']="No ha elegido ningún archivo!";
$lang['L_FM_DELETE1']="El archivo ";
$lang['L_FM_DELETE2']=" ha sido eliminado.";
$lang['L_FM_DELETE3']=" no ha podido ser eliminado!";
$lang['L_FM_CHOOSE_FILE']="archivo elegido:";
$lang['L_FM_FILESIZE']="tamaño";
$lang['L_FM_FILEDATE']="fecha";
$lang['L_FM_NOFILESFOUND']="No se han encontrado archivos.";
$lang['L_FM_TABLES']="tablas";
$lang['L_FM_RECORDS']="registros";
$lang['L_FM_ALL_BU']="Lista de todas las copias de seguridad";
$lang['L_FM_ANZ_BU']="cantidad de copias de seguridad";
$lang['L_FM_LAST_BU']="última copia de seguridad";
$lang['L_FM_TOTALSIZE']="tamaño total";
$lang['L_FM_SELECTTABLES']="Selección de tablas";
$lang['L_FM_COMMENT']="Enter Comment";
$lang['L_FM_RESTORE']="Restaurar";
$lang['L_FM_ALERTRESTORE1']="¿Desea llenar la base de datos ";
$lang['L_FM_ALERTRESTORE2']="con el contenido del archivo";
$lang['L_FM_ALERTRESTORE3']="?";
$lang['L_FM_DELETE']="Eliminar";
$lang['L_FM_ASKDELETE1']="Desea realmente eliminar el archivo ";
$lang['L_FM_ASKDELETE2']="en serio borrar?";
$lang['L_FM_ASKDELETE3']="¿Desea ejecutar el borrado automático según las reglas especificadas?";
$lang['L_FM_ASKDELETE4']="¿Desea eliminar todos los archivos de copia de seguridad?";
$lang['L_FM_ASKDELETE5']="¿Desea eliminar todos los archivos con el prefijo ";
$lang['L_FM_ASKDELETE5_2']="_*?";
$lang['L_FM_DELETEAUTO']="Ejecutar borrado automático manualmente";
$lang['L_FM_DELETEALL']="eliminar todas las copias de seguridad";
$lang['L_FM_DELETEALLFILTER']="eliminar todos los archivos con ";
$lang['L_FM_DELETEALLFILTER2']="_*";
$lang['L_FM_STARTDUMP']="Iniciar nueva copia de seguridad";
$lang['L_FM_FILEUPLOAD']="Subir archivo";
$lang['L_FM_DBNAME']="Nombre de la base de datos";
$lang['L_FM_FILES1']="Copias de seguridad";
$lang['L_FM_FILES2']="Estructuras de base de datos";
$lang['L_FM_AUTODEL1']="Eliminado automático: Los siguientes archivos han sido eliminados al superarse la cantidad máxima de ficheros:";
$lang['L_DELETE_FILE_SUCCESS']="El archivo \"%s\" se ha eliminado con éxito.";
$lang['L_FM_DUMPSETTINGS']="Propiedades de la copia de seguridad";
$lang['L_FM_OLDBACKUP']="(desconocido)";
$lang['L_FM_RESTORE_HEADER']="Recuperación de la base de datos \"<strong>%s</strong>\"";
$lang['L_DELETE_FILE_ERROR']="¡No fue posible borrar el archivo \"%s\"!";
$lang['L_FM_DUMP_HEADER']="Copia de seguridad";
$lang['L_DOCRONBUTTON']="Ejecutar Cronscript Perl";
$lang['L_DOPERLTEST']="Comprobar Módulos Perl";
$lang['L_DOSIMPLETEST']="Comprobar Perl";
$lang['L_PERLOUTPUT1']="Línea a escribir en crondump.pl para absolute_path_of_configdir";
$lang['L_PERLOUTPUT2']="Ejecutar desde el navegador o desde un Cronjob externo al servidor";
$lang['L_PERLOUTPUT3']="Ejecutar desde Shell o como entrada en Crontab";
$lang['L_RESTORE_OF_TABLES']="Elija las tablas a restaurar";
$lang['L_CONVERTER']="Copia de seguridad-Conversor";
$lang['L_CONVERT_FILE']="archivo que se convertirá";
$lang['L_CONVERT_FILENAME']="Nombre del archivo de destino (sin extensión)";
$lang['L_CONVERTING']="La conversión";
$lang['L_CONVERT_FILEREAD']="Leyendo el archivo '%s'";
$lang['L_CONVERT_FINISHED']="Conversión finalizada: '%s' se ha guardado correctamente.";
$lang['L_NO_MSD_BACKUPFILE']="Copias de seguridad de otros programas";
$lang['L_MAX_UPLOAD_SIZE']="Tamaño máximo del fichero";
$lang['L_MAX_UPLOAD_SIZE_INFO']="Si el archivo de copia de seguridad es mayor que el límite fijado, entonces debe cargarlo a través de FTP en la carpeta \"work/backup\".
Después ese archivo se mostrará aquí, y podrá ser elegido para restaurar.";
$lang['L_ENCODING']="Codificación";
$lang['L_FM_CHOOSE_ENCODING']="Seleccione la codificación de la copia de seguridad";
$lang['L_CHOOSE_CHARSET']="MySQLDumper no pudo detectar la codificación de los archivos de la copia de seguridad de forma automática.<br>
Usted debe elegir el conjunto de caracteres con el que se guardó la copia de seguridad.<br>
Si usted descubre algún problema con algunos caracteres después de la restauración, puede repetir la restauración de la copia de seguridad con otro conjunto de caracteres. <br>
Buena suerte. ;)";
$lang['L_DOWNLOAD_FILE']="Descargos ficheros";
$lang['L_BACKUP_NOT_POSSIBLE'] = "A backup of the system database `%s` is not possible!";
?>