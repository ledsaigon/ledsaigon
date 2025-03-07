<?php
$lang['L_CONFIG_HEADLINE']="Configuration";
$lang['L_SAVE_SUCCESS']="Configuration was saved succesfully into configuration file \"%s\".";
$lang['L_CONFIG_LOADED']="Configuration \"%s\" has been imported successfully.";
$lang['L_SAVE_ERROR']="Error - unable to save configuration!";
$lang['L_CONFIG_EMAIL']="Email Notification";
$lang['L_CONFIG_AUTODELETE']="Autodelete";
$lang['L_CONFIG_INTERFACE']="Interface";
$lang['L_MULTI_PART_GROESSE']="maximum File size";
$lang['L_HELP_MULTIPART']="If Multipart is switched on, Backup creates multiple Backup files, with the maximum size determined by the configuration below";
$lang['L_HELP_MULTIPARTGROESSE']="The maximum size of Backup files is set here, if Multipart is switched on";
$lang['L_EMPTY_DB_BEFORE_RESTORE']="Delete tables before restoring";
$lang['L_ALLPARS']="All Parameters";
$lang['L_CRON_EXTENDER']="File extension";
$lang['L_CRON_SAVEPATH']="Configuration file";
$lang['L_CRON_PRINTOUT']="Print output on screen.";
$lang['L_CONFIG_CRONPERL']="Crondump Settings for Perl script";
$lang['L_CRON_MAILPRG']="Mail program";
$lang['L_OPTIMIZE']="Optimize Tables before Backup";
$lang['L_HELP_OPTIMIZE']="If this option is activated, all tables will be optimized before the backup";
$lang['L_HELP_FTPTIMEOUT']="Default setting for Timeout is 90 seconds.";
$lang['L_FTP_TIMEOUT']="Connection Timeout";
$lang['L_HELP_FTPSSL']="Choose if the connection will be established via SSL.";
$lang['L_CONFIG_ASKLOAD']="Do you want to override the actual settings with the default settings?";
$lang['L_LOAD']="Load default settings";
$lang['L_LOAD_SUCCESS']="The default settings were loaded.";
$lang['L_CRON_CRONDBINDEX']="Database";
$lang['L_WITHATTACH']=" with attach";
$lang['L_WITHOUTATTACH']=" without attach";
$lang['L_MULTIDUMPCONF']="=Multidump Configuration=";
$lang['L_MULTIDUMPALL']="=all Databases=";
$lang['L_GZIP']="GZip compression";
$lang['L_SEND_MAIL_FORM']="Send email report";
$lang['L_SEND_MAIL_DUMP']="Attach backup";
$lang['L_EMAIL_ADRESS']="Receiver";
$lang['L_EMAIL_SENDER']="Sender address of the email";
$lang['L_EMAIL_MAXSIZE']="Maximum size of attachment";
$lang['L_NUMBER_OF_FILES_FORM']="Delete by number of files per database";
$lang['L_LANGUAGE']="Language";
$lang['L_LIST_DB']="Configured Databases:";
$lang['L_CONFIG_FTP']="FTP Transfer of Backup file";
$lang['L_FTP_TRANSFER']="FTP Transfer";
$lang['L_FTP_SERVER']="Server";
$lang['L_FTP_PORT']="Port";
$lang['L_FTP_USER']="User";
$lang['L_FTP_PASS']="Password";
$lang['L_FTP_DIR']="Upload directory";
$lang['L_FTP_SSL']="Secure SSL FTP connection";
$lang['L_FTP_USESSL']="use SSL Connection";
$lang['L_SQLBOXHEIGHT']="Height of SQL-Box";
$lang['L_SQLLIMIT']="Count of records each page";
$lang['L_BBPARAMS']="Configuration for BB-Code";
$lang['L_BBTEXTCOLOR']="Text color";
$lang['L_HELP_COMMANDS']="You can execute a command before and after the backup.\nThis command can be a SQL-Construct or a System Command (e.g. a script)";
$lang['L_COMMAND']="Command";
$lang['L_WRONG_CONNECTIONPARS']="Connection parameters are wrong !";
$lang['L_CONNECTIONPARS']="Connection Parameter";
$lang['L_EXTENDEDPARS']="Extended Parameter";
$lang['L_FADE_IN_OUT']="Display on/off";
$lang['L_DB_BACKUPPARS']="Database Backup Parameter";
$lang['L_GENERAL']="General";
$lang['L_MAXSIZE']="max. Size";
$lang['L_ERRORHANDLING_RESTORE']="Error Handling while restoring";
$lang['L_EHRESTORE_CONTINUE']="continue and log errors";
$lang['L_EHRESTORE_STOP']="stop";
$lang['L_IN_MAINFRAME']="in main frame";
$lang['L_IN_LEFTFRAME']="in left frame";
$lang['L_WIDTH']="Width";
$lang['L_SQL_BEFEHLE']="SQL Commands";
$lang['L_DOWNLOAD_LANGUAGES']="download other languages";
$lang['L_DOWNLOAD_STYLES']="download other themes";
$lang['L_CONNECT_TO']="Connect to";
$lang['L_CHANGEDIR']="Changing to Directory";
$lang['L_CHANGEDIRERROR']="Couldn`t change directory!";
$lang['L_FTP_OK']="Connection successful.";
$lang['L_INSTALL']="Installation";
$lang['L_NOFTPPOSSIBLE']="You don't have FTP functions !";
$lang['L_FOUND_DB']="found db";
$lang['L_FTP_CHOOSE_MODE']="FTP Transfer Mode";
$lang['L_FTP_PASSIVE']="use passive mode";
$lang['L_HELP_FTP_MODE']="Choose the passive mode when you discover problems while using the active mode.";
$lang['L_DB_IN_LIST']="The database '%s' couldn't be added because it is allready existing. ";
$lang['L_ADD_DB_MANUALLY']="Add database manually";
$lang['L_DB_MANUAL_ERROR']="Sorry, couldn't connect to database '%s'!";
$lang['L_DB_MANUAL_FILE_ERROR']="Fileerror: couldn't insert database '%s'!";
$lang['L_NO_DB_FOUND']="I couldn't find any databases automatically!
Please unhide the connection parameters, and enter the name of your database manually.";
$lang['L_CONFIGFILES']="Configuration Files";
$lang['L_CONFIGFILE']="Config File";
$lang['L_MYSQL_DATA']="MySQL-Data";
$lang['L_CONFIGURATIONS']="Configurations";
$lang['L_ACTION']="Action";
$lang['L_FTP_SEND_TO']="to <strong>%s</strong><br> into <strong>%s</strong>";
$lang['L_FTP']="FTP";
$lang['L_EMAIL_CC']="CC-Receiver";
$lang['L_NAME']="Name";
$lang['L_CONFIRM_CONFIGFILE_DELETE']="Really delete the configuration file %s?";
$lang['L_ERROR_DELETING_CONFIGFILE']="Error: couldn't delete configuration file %s!";
$lang['L_SUCCESS_DELETING_CONFIGFILE']="The configuration file %s has successfully been deleted.";
$lang['L_SUCCESS_CONFIGFILE_CREATED']="Configuration file %s has successfully been created.";
$lang['L_ERROR_CONFIGFILE_NAME']="Filename \"%s\" contains invalid characters.";
$lang['L_CREATE_CONFIGFILE']="Create a new configuration file";
$lang['L_ERROR_LOADING_CONFIGFILE']="Couldn't load configfile \"%s\".";
$lang['L_BACKUP_DBS_PHP']="DBs to backup (PHP)";
$lang['L_BACKUP_DBS_PERL']="DBs to backup (PERL)";
$lang['L_CRON_COMMENT']="Enter Comment";
$lang['L_AUTODETECT']="auto detect";


?>