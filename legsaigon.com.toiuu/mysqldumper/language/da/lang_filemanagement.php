<?php
$lang['L_CONVERT_START']="Start konvertering";
$lang['L_CONVERT_TITLE']="Konvertér dump til MSD-format";
$lang['L_CONVERT_WRONG_PARAMETERS']="Forkerte parametre!  Konvertering er ikke muligt.";
$lang['L_FM_UPLOADFILEREQUEST']="vælg venligst en fil.";
$lang['L_FM_UPLOADNOTALLOWED1']="Denne filtype understøttes ikke.";
$lang['L_FM_UPLOADNOTALLOWED2']="Gyldige typer er: *.gz og *.sql-filer";
$lang['L_FM_UPLOADMOVEERROR']="Kunne ikke flytte valgte fil til upload folderen.";
$lang['L_FM_UPLOADFAILED']="Upload slog fejl!";
$lang['L_FM_UPLOADFILEEXISTS']="Der findes allerede en fil med samme navn!";
$lang['L_FM_NOFILE']="Du valgte ikke en fil!";
$lang['L_FM_DELETE1']="Filen ";
$lang['L_FM_DELETE2']=" blev slettet korrekt.";
$lang['L_FM_DELETE3']=" kunne ikke slettes!";
$lang['L_FM_CHOOSE_FILE']="Valgt fil:";
$lang['L_FM_FILESIZE']="Filstørrelse";
$lang['L_FM_FILEDATE']="Fildato";
$lang['L_FM_NOFILESFOUND']="Ingen fil fundet.";
$lang['L_FM_TABLES']="Tabeller";
$lang['L_FM_RECORDS']="Poster";
$lang['L_FM_ALL_BU']="Alle backups";
$lang['L_FM_ANZ_BU']="Backups";
$lang['L_FM_LAST_BU']="Seneste backup";
$lang['L_FM_TOTALSIZE']="Total størrelse";
$lang['L_FM_SELECTTABLES']="Vælg tabeller";
$lang['L_FM_COMMENT']="Indtast kommentar";
$lang['L_FM_RESTORE']="Genetabler";
$lang['L_FM_ALERTRESTORE1']="Skal databasen";
$lang['L_FM_ALERTRESTORE2']="genetableres med posterne fra filen";
$lang['L_FM_ALERTRESTORE3']=" ?";
$lang['L_FM_DELETE']="Slet";
$lang['L_FM_ASKDELETE1']="Skal filen ";
$lang['L_FM_ASKDELETE2']="virkelig slettes?";
$lang['L_FM_ASKDELETE3']="Vil du køre autoslet med de konfigurerede regler nu?";
$lang['L_FM_ASKDELETE4']="Vil du slette alle backupfiler?";
$lang['L_FM_ASKDELETE5']="Vil du slette alle backupfiler med ";
$lang['L_FM_ASKDELETE5_2']="_* ?";
$lang['L_FM_DELETEAUTO']="Kør autoslet manuelt";
$lang['L_FM_DELETEALL']="Slette alle backupfiler";
$lang['L_FM_DELETEALLFILTER']="Slet alle med ";
$lang['L_FM_DELETEALLFILTER2']="_*";
$lang['L_FM_STARTDUMP']="Start ny backup";
$lang['L_FM_FILEUPLOAD']="Upload fil";
$lang['L_FM_DBNAME']="Databasenavn";
$lang['L_FM_FILES1']="Databasebackups";
$lang['L_FM_FILES2']="Databasestrukturer";
$lang['L_FM_AUTODEL1']="Autoslet: følgende filer blev slettet grundet maksimalt antal filer-indstillingen:";
$lang['L_DELETE_FILE_SUCCESS']="File \"%s\" was deleted successfully.";
$lang['L_FM_DUMPSETTINGS']="Konfiguration for Perl Cron scriptet";
$lang['L_FM_OLDBACKUP']="(ukendt)";
$lang['L_FM_RESTORE_HEADER']="Genetablering af Database \"<strong>%s</strong>\"";
$lang['L_DELETE_FILE_ERROR']="Error deleting file \"%s\"!";
$lang['L_FM_DUMP_HEADER']="Backup";
$lang['L_DOCRONBUTTON']="Kør Perl Cron scriptet";
$lang['L_DOPERLTEST']="Test Perl-moduler";
$lang['L_DOSIMPLETEST']="Test Perl";
$lang['L_PERLOUTPUT1']="Linie i crondump.pl for absolute_path_of_configdir";
$lang['L_PERLOUTPUT2']="URL for browseren eller for eksternt Cron job";
$lang['L_PERLOUTPUT3']="Kommandolinie i Shell eller for Crontab";
$lang['L_RESTORE_OF_TABLES']="Choose tables to be restored";
$lang['L_CONVERTER']="Backupkonvertering";
$lang['L_CONVERT_FILE']="Fil der skal konverteres";
$lang['L_CONVERT_FILENAME']="Navn på destinationsfilen (uden filtype)";
$lang['L_CONVERTING']="Konverterer";
$lang['L_CONVERT_FILEREAD']="Læs fil '%s'";
$lang['L_CONVERT_FINISHED']="Konvertering afsluttet, '%s' blev skrevet korrekt.";
$lang['L_NO_MSD_BACKUPFILE']="Backups af andre scripts";
$lang['L_MAX_UPLOAD_SIZE']="Maksimal filstørrelse";
$lang['L_MAX_UPLOAD_SIZE_INFO']="Hvis din Dumpfil er større end den ovennævnte grænse, skal du uploade den via FTP til folderen \"work/backup\".
Derefter kan du vælge den og begynde genetableringsprocessen.";
$lang['L_ENCODING']="encoding";
$lang['L_FM_CHOOSE_ENCODING']="Choose encoding of backup file";
$lang['L_CHOOSE_CHARSET']="MySQLDumper couldn't detect the encoding of the backup file automatically.
<br>You must choose the charset with which this backup was saved.
<br>If you discover any problems with some characters after restoring, you can repeat the backup-progress and then choose another character set.
<br>Good luck. ;)";
$lang['L_DOWNLOAD_FILE']="Download file";
$lang['L_BACKUP_NOT_POSSIBLE'] = "A backup of the system database `%s` is not possible!";
?>