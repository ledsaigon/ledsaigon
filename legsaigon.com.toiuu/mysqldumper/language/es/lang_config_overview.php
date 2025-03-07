<?php
$lang['L_CONFIG_HEADLINE']="Configuración";
$lang['L_SAVE_SUCCESS']="La configuración se ha guardado con éxito en el archivo de configuración \"%s\".";
$lang['L_CONFIG_LOADED']="La configuración \"%s\" se importó correctamente.";
$lang['L_SAVE_ERROR']="¡La configuración no ha podido ser guardada!";
$lang['L_CONFIG_EMAIL']="Notificación por email";
$lang['L_CONFIG_AUTODELETE']="Eliminación automática";
$lang['L_CONFIG_INTERFACE']="Interfaz";
$lang['L_MULTI_PART_GROESSE']="tamaño máximo del archivo";
$lang['L_HELP_MULTIPART']="Si selecciona archivos múltiples, se crearán varios archivos de copia de seguridad, el tamaño máximo de los cuales quedará determinado por las propiedades elegidas debajo";
$lang['L_HELP_MULTIPARTGROESSE']="El tamaño máximo de los archivos individuales de copia de seguridad en caso de activar la copia de seguridad en archivos múltiples, queda determinado por este valor";
$lang['L_EMPTY_DB_BEFORE_RESTORE']="Vaciar la base de datos antes de recuperar los valores";
$lang['L_ALLPARS']="todos los parámetros";
$lang['L_CRON_EXTENDER']="Extensión de los scripts";
$lang['L_CRON_SAVEPATH']="Archivo de configuración";
$lang['L_CRON_PRINTOUT']="Salida de texto";
$lang['L_CONFIG_CRONPERL']="Propiedades de Crondump como script perl";
$lang['L_CRON_MAILPRG']="Programa de email";
$lang['L_OPTIMIZE']="Optimizar las tablas antes del backup";
$lang['L_HELP_OPTIMIZE']="Si esta opción está activada, se optimizarán todas las tablas antes de cada copia de seguridad";
$lang['L_HELP_FTPTIMEOUT']="Tiempo de inactividad que tarda en cancelarse la conexión, 90 segundos por defecto.";
$lang['L_FTP_TIMEOUT']="Cancelación de la conexión";
$lang['L_HELP_FTPSSL']="Seleccione si la conexión debe ser establecida a través de SSL.";
$lang['L_CONFIG_ASKLOAD']="Desea realmente sobreescribir la configuración actual con la configuración inicial?";
$lang['L_LOAD']="Cargar config. inicial.";
$lang['L_LOAD_SUCCESS']="La configuración inicial ha sido cargada.";
$lang['L_CRON_CRONDBINDEX']="Base de datos";
$lang['L_WITHATTACH']=" con fichero adjunto";
$lang['L_WITHOUTATTACH']=" sin fichero adjunto";
$lang['L_MULTIDUMPCONF']="=Propiedades de Multidump=";
$lang['L_MULTIDUMPALL']="=Todas las bases de datos=";
$lang['L_GZIP']="Compresión GZip";
$lang['L_SEND_MAIL_FORM']="enviar un email";
$lang['L_SEND_MAIL_DUMP']="Adjuntar copia de seguridad";
$lang['L_EMAIL_ADRESS']="Dirección de email";
$lang['L_EMAIL_SENDER']="Email desde donde se envía";
$lang['L_EMAIL_MAXSIZE']="tamaño máximo del fichero adjunto";
$lang['L_NUMBER_OF_FILES_FORM']="Cantidad de archivos de copia de seguridad";
$lang['L_LANGUAGE']="Idioma";
$lang['L_LIST_DB']="Bases de datos configuradas:";
$lang['L_CONFIG_FTP']="Transferencia por FTP de los backups";
$lang['L_FTP_TRANSFER']="Transferencia FTP";
$lang['L_FTP_SERVER']="Servidor";
$lang['L_FTP_PORT']="Puerto";
$lang['L_FTP_USER']="Usuario";
$lang['L_FTP_PASS']="Password";
$lang['L_FTP_DIR']="Directorio de subida";
$lang['L_FTP_SSL']="Conexión segura mediante SSL-FTP";
$lang['L_FTP_USESSL']="conexión SSL usada";
$lang['L_SQLBOXHEIGHT']="Altura del cuadro de SQL";
$lang['L_SQLLIMIT']="Cantidad de registros por página";
$lang['L_BBPARAMS']="Propiedades del código BB";
$lang['L_BBTEXTCOLOR']="Color de texto";
$lang['L_HELP_COMMANDS']="Antes y después de la copia de seguridad, puede hacer que se ejecute algún comando.\n
Puede tratarse de una sentencia SQL o de un archivo de comandos de sistema (por ejemplo, un script)";
$lang['L_COMMAND']="Comando";
$lang['L_WRONG_CONNECTIONPARS']="¡Parámetros de conexión incorrectos!";
$lang['L_CONNECTIONPARS']="Parámetros de conexión";
$lang['L_EXTENDEDPARS']="Parámetros extendidos";
$lang['L_FADE_IN_OUT']="mostrar/ocultar";
$lang['L_DB_BACKUPPARS']="Propiedades de la copia de seguridad de la base de datos";
$lang['L_GENERAL']="Genéricas";
$lang['L_MAXSIZE']="tamaño máx.";
$lang['L_ERRORHANDLING_RESTORE']="Tratamiento de los errores en la recuperación de datos";
$lang['L_EHRESTORE_CONTINUE']="informar de los errores y seguir";
$lang['L_EHRESTORE_STOP']="detenerse";
$lang['L_IN_MAINFRAME']="en ventana principal";
$lang['L_IN_LEFTFRAME']="en ventana de menu";
$lang['L_WIDTH']="ancho";
$lang['L_SQL_BEFEHLE']="Comandos SQL";
$lang['L_DOWNLOAD_LANGUAGES']="Descargar otros idiomas";
$lang['L_DOWNLOAD_STYLES']="Descargar otros temas";
$lang['L_CONNECT_TO']="Conectarse a ";
$lang['L_CHANGEDIR']="Cambiando al directorio";
$lang['L_CHANGEDIRERROR']="No se ha podido cambiar el directorio";
$lang['L_FTP_OK']="La conexión se ha realizado correctamente";
$lang['L_INSTALL']="Instalación";
$lang['L_NOFTPPOSSIBLE']="Las funciones de FTP no están disponibles!";
$lang['L_FOUND_DB']="Encontrada BdD:";
$lang['L_FTP_CHOOSE_MODE']="FTP Transfer Mode";
$lang['L_FTP_PASSIVE']="use passive mode";
$lang['L_HELP_FTP_MODE']="Choose the passive mode when you discover problems while using the active mode.";
$lang['L_DB_IN_LIST']="The database '%s' couldn't be added because it is allready existing. ";
$lang['L_ADD_DB_MANUALLY']="Add database manually";
$lang['L_DB_MANUAL_ERROR']="Sorry, couldn't connect to database '%s'!";
$lang['L_DB_MANUAL_FILE_ERROR']="Fileerror: couldn't insert database '%s'!";
$lang['L_NO_DB_FOUND']="I couldn't find any database automatically!
Please blend in the connection paramter and enter the name of your database manually.";
$lang['L_CONFIGFILES']="Archivos de configuración";
$lang['L_CONFIGFILE']="Archivo de configuración";
$lang['L_MYSQL_DATA']="Datos MySQL";
$lang['L_CONFIGURATIONS']="Preferencias";
$lang['L_ACTION']="Acción";
$lang['L_FTP_SEND_TO']="para <strong>%s</strong><br>en <strong>%s</s>";
$lang['L_FTP']="FTP";
$lang['L_EMAIL_CC']="CC-Destinatarios";
$lang['L_NAME']="Nombre";
$lang['L_CONFIRM_CONFIGFILE_DELETE']="¿Está seguro de que desea borrar el archivo de configuración %s?";
$lang['L_ERROR_DELETING_CONFIGFILE']="¡Error: el archivo de configuración %s no ha podido ser eliminado!";
$lang['L_SUCCESS_DELETING_CONFIGFILE']="El archivo de configuración %s ha sido eliminado.";
$lang['L_SUCCESS_CONFIGFILE_CREATED']="El archivo de configuración %s se ha creado correctamente.";
$lang['L_ERROR_CONFIGFILE_NAME']="El nombre del archivo \"%s\" contiene caracteres no válidos.";
$lang['L_CREATE_CONFIGFILE']="Crear un nuevo archivo de configuración";
$lang['L_ERROR_LOADING_CONFIGFILE']="No se pudo cargar el archivo de configuración \"%s\".";
$lang['L_BACKUP_DBS_PHP']="BDs a copiar (PHP)";
$lang['L_BACKUP_DBS_PERL']="BDs a copiar (PERL)";
$lang['L_CRON_COMMENT']="Enter Comment";
$lang['L_AUTODETECT']="Identificar automáticamente";


?>