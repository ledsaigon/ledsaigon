<?php
$lang['L_CONVERT_START']="Starta konvertering";
$lang['L_CONVERT_TITLE']="Konvertera dump till MSD-formatet";
$lang['L_CONVERT_WRONG_PARAMETERS']="Fel parametrar! Konverteringen kan ej genomföras.";
$lang['L_FM_UPLOADFILEREQUEST']="Ange en fil.";
$lang['L_FM_UPLOADNOTALLOWED1']="Denna filtyp är ej tillåten.";
$lang['L_FM_UPLOADNOTALLOWED2']="Tillåtna filtyper: *.gz och *.sql";
$lang['L_FM_UPLOADMOVEERROR']="Den uppladdade filen kunde ej flyttas till rätt mapp.";
$lang['L_FM_UPLOADFAILED']="Uppladdningen har tyvärr misslyckats!";
$lang['L_FM_UPLOADFILEEXISTS']="Det existerar redan en fil med samma namn!";
$lang['L_FM_NOFILE']="Du har ej valt någon fil!";
$lang['L_FM_DELETE1']="Filen";
$lang['L_FM_DELETE2']="har raderats.";
$lang['L_FM_DELETE3']="kunde ej raderas!";
$lang['L_FM_CHOOSE_FILE']="Vald fil:";
$lang['L_FM_FILESIZE']="Filstorlek";
$lang['L_FM_FILEDATE']="Datum";
$lang['L_FM_NOFILESFOUND']="Ingen fil hittades.";
$lang['L_FM_TABLES']="Tabeller";
$lang['L_FM_RECORDS']="Poster";
$lang['L_FM_ALL_BU']="alla backuper";
$lang['L_FM_ANZ_BU']="Antal backuper";
$lang['L_FM_LAST_BU']="Senaste backup";
$lang['L_FM_TOTALSIZE']="Total storlek";
$lang['L_FM_SELECTTABLES']="Val av bestämda tabeller";
$lang['L_FM_COMMENT']="Mata in en kommentar";
$lang['L_FM_RESTORE']="Återställning";
$lang['L_FM_ALERTRESTORE1']="Ska databasen";
$lang['L_FM_ALERTRESTORE2']="återställas med innehållet i filen";
$lang['L_FM_ALERTRESTORE3']="?";
$lang['L_FM_DELETE']="Radera valda filer";
$lang['L_FM_ASKDELETE1']="Vill du verkligen radera filen (filerna)";
$lang['L_FM_ASKDELETE2']="?";
$lang['L_FM_ASKDELETE3']="Vill du utföra den automatiska raderingen enligt de inställda reglerna nu?";
$lang['L_FM_ASKDELETE4']="Vill du radera alla backupfiler nu?";
$lang['L_FM_ASKDELETE5']="Vill du radera alla backupfiler med";
$lang['L_FM_ASKDELETE5_2']="_* nu?";
$lang['L_FM_DELETEAUTO']="Genomför automatisk radering manuellt";
$lang['L_FM_DELETEALL']="Radera alla backupfiler";
$lang['L_FM_DELETEALLFILTER']="Radera alla med ";
$lang['L_FM_DELETEALLFILTER2']="_*";
$lang['L_FM_STARTDUMP']="Starta ny backup";
$lang['L_FM_FILEUPLOAD']="Ladda upp fil";
$lang['L_FM_DBNAME']="Databasens namn";
$lang['L_FM_FILES1']="Databas-backuper";
$lang['L_FM_FILES2']="Databas-strukturer";
$lang['L_FM_AUTODEL1']="Automatisk radering: följande filer raderades på grund av maximalt antal filer:";
$lang['L_DELETE_FILE_SUCCESS']="Filen \"%s\" har raderats.";
$lang['L_FM_DUMPSETTINGS']="Backup-inställningar";
$lang['L_FM_OLDBACKUP']="(okänd)";
$lang['L_FM_RESTORE_HEADER']="Återställning av databasen \"<strong>%s</strong>\"";
$lang['L_DELETE_FILE_ERROR']="Filen \"%s\" kunde ej raderas!";
$lang['L_FM_DUMP_HEADER']="Backup";
$lang['L_DOCRONBUTTON']="Utför Perl-cronscript";
$lang['L_DOPERLTEST']="Testa Perl-modulerna";
$lang['L_DOSIMPLETEST']="Testa Perl";
$lang['L_PERLOUTPUT1']="Angivelse i crondump.pl för absolute_path_of_configd";
$lang['L_PERLOUTPUT2']="Browseradress eller adress för extern crontab";
$lang['L_PERLOUTPUT3']="Shelladress eller adress för crontab";
$lang['L_RESTORE_OF_TABLES']="Återställning av bestämda tabeller";
$lang['L_CONVERTER']="Backup-konverterare";
$lang['L_CONVERT_FILE']="fil som skall konverteras";
$lang['L_CONVERT_FILENAME']="Målfilens namn (utan filändelse)";
$lang['L_CONVERTING']="Konvertering";
$lang['L_CONVERT_FILEREAD']="Filen '%s' läses in";
$lang['L_CONVERT_FINISHED']="Konverteringen avslutad, '%s' har skapats.";
$lang['L_NO_MSD_BACKUPFILE']="Filer skapade med andra program";
$lang['L_MAX_UPLOAD_SIZE']="Maximal filstorlek";
$lang['L_MAX_UPLOAD_SIZE_INFO']="Om din backup-fil är större än det angivna värdet så måste du ladda upp den till mappen \"work/backup\" via FTP. Därefter visas filen här i översikten och kan väljas för återställning.";
$lang['L_ENCODING']="Kodering";
$lang['L_FM_CHOOSE_ENCODING']="Välj backupfilens kodering";
$lang['L_CHOOSE_CHARSET']="Tyvärr kunde ej fastställas automatiskt med vilken teckensats denna backupfil har skapats.<br>Du måste ange koderingen manuellt.<br>Därefter ställer MySQLDumper in förbindelseparametrarna till MySQL-servern till den valda teckensatsen och startar återställningen.<br>Om datan återges med fel specialtecken efter återställningen så bör du upprepa återställningen med en annan inställning för teckensatsen.<br>Lycka till.";
$lang['L_DOWNLOAD_FILE']="Ladda hem filen";
$lang['L_BACKUP_NOT_POSSIBLE'] = "A backup of the system database `%s` is not possible!";
?>