<?php
$lang['L_CONVERT_START']="Fai partire la conversione";
$lang['L_CONVERT_TITLE']="Convertire il Dump nel formato MSD";
$lang['L_CONVERT_WRONG_PARAMETERS']="Parametri errati!  Conversione non possibile.";
$lang['L_FM_UPLOADFILEREQUEST']="Prego, selezionare un file.";
$lang['L_FM_UPLOADNOTALLOWED1']="Questo tipo di file non è supportato.";
$lang['L_FM_UPLOADNOTALLOWED2']="I tipi di file validi sono: *.gz e *.sql";
$lang['L_FM_UPLOADMOVEERROR']="Non è stato possibile spostare il file caricato nella directory di destinazione corretta.";
$lang['L_FM_UPLOADFAILED']="Il caricamento è fallito!";
$lang['L_FM_UPLOADFILEEXISTS']="Esiste gia un file con questo nome!";
$lang['L_FM_NOFILE']="Non hai selezionato alcun file!";
$lang['L_FM_DELETE1']="Il file ";
$lang['L_FM_DELETE2']="è stato cancellato con successo.";
$lang['L_FM_DELETE3']="non è stato cancellato!";
$lang['L_FM_CHOOSE_FILE']="File selezionato:";
$lang['L_FM_FILESIZE']="Grandezza file";
$lang['L_FM_FILEDATE']="Data ";
$lang['L_FM_NOFILESFOUND']="Nessun file trovato.";
$lang['L_FM_TABLES']="Tabelle";
$lang['L_FM_RECORDS']="Record";
$lang['L_FM_ALL_BU']="tutti i backups";
$lang['L_FM_ANZ_BU']="Backups";
$lang['L_FM_LAST_BU']="ultimo backup";
$lang['L_FM_TOTALSIZE']="Grandezza totale";
$lang['L_FM_SELECTTABLES']="Scegli tabelle";
$lang['L_FM_COMMENT']="Inserisci commento";
$lang['L_FM_RESTORE']="Ripristina";
$lang['L_FM_ALERTRESTORE1']="Deve essere ripristinato";
$lang['L_FM_ALERTRESTORE2']="il database";
$lang['L_FM_ALERTRESTORE3']="con i dati contenuti nel file?";
$lang['L_FM_DELETE']="Eliminare";
$lang['L_FM_ASKDELETE1']="Vuoi cancellare ";
$lang['L_FM_ASKDELETE2']="veramente questo file?";
$lang['L_FM_ASKDELETE3']="Vuoi effettuare ora la cancellazione in automatico secondo le regole impostate?";
$lang['L_FM_ASKDELETE4']="Vuoi cancellare tutti i backup?";
$lang['L_FM_ASKDELETE5']="Vuoi cancellare tutti i file di backup con ";
$lang['L_FM_ASKDELETE5_2']="_* adesso?";
$lang['L_FM_DELETEAUTO']="Fai partire la cancellazione automatica manualmente";
$lang['L_FM_DELETEALL']="cancella tutti i file di backup";
$lang['L_FM_DELETEALLFILTER']="cancella tutti con ";
$lang['L_FM_DELETEALLFILTER2']="_*";
$lang['L_FM_STARTDUMP']="Fai partire un nuovo backup";
$lang['L_FM_FILEUPLOAD']="Carica file";
$lang['L_FM_DBNAME']="Nome del database";
$lang['L_FM_FILES1']="Backup Database";
$lang['L_FM_FILES2']="Struttura database";
$lang['L_FM_AUTODEL1']="Cancellazione automatica: i seguenti file sono stati cancellati poichè è stato raggiunto il limite di spazio impostato:";
$lang['L_DELETE_FILE_SUCCESS']="Il file \"%s\" è stato cancellato con successo.";
$lang['L_FM_DUMPSETTINGS']="Configurazione";
$lang['L_FM_OLDBACKUP']="(sconosciuto)";
$lang['L_FM_RESTORE_HEADER']="Ripristino del database \"<strong>%s</strong>\"";
$lang['L_DELETE_FILE_ERROR']="Non è stato possibile cancellare il file \"%s\"!";
$lang['L_FM_DUMP_HEADER']="Backup";
$lang['L_DOCRONBUTTON']="Esegui Cronscript Perl";
$lang['L_DOPERLTEST']="Prova il modulo Perl";
$lang['L_DOSIMPLETEST']="Prova Perl";
$lang['L_PERLOUTPUT1']="Registrazione in crondump.pl per absolute_path_of_configdir";
$lang['L_PERLOUTPUT2']="Url per il Browser oppure per Cronjob esterno";
$lang['L_PERLOUTPUT3']="Linea di commandi nella Shell oppure per il Crontab";
$lang['L_RESTORE_OF_TABLES']="Ripristino di tabelle specifiche";
$lang['L_CONVERTER']="Convertitore Backup";
$lang['L_CONVERT_FILE']="file da convertire";
$lang['L_CONVERT_FILENAME']="Nome del file di destinazione (senza estensione)";
$lang['L_CONVERTING']="Conversione";
$lang['L_CONVERT_FILEREAD']="Leggi file '%s'";
$lang['L_CONVERT_FINISHED']="Conversione eseguita, '%s' sono stati scritti con successo.";
$lang['L_NO_MSD_BACKUPFILE']="Backup di altri programmi";
$lang['L_MAX_UPLOAD_SIZE']="Grandezza massima del file";
$lang['L_MAX_UPLOAD_SIZE_INFO']="Se il tuo file di backup è piu grande del limite impostato, allora lo devi caricare tramite FTP nella cartella \"work/backup\". Dopo verrà visualizzato e potrà essere scelto per il ripristino.";
$lang['L_ENCODING']="codifica";
$lang['L_FM_CHOOSE_ENCODING']="Scegli la codifica del file di backup";
$lang['L_CHOOSE_CHARSET']="MySQLDumper non ha rilevato automaticamente il codice del seti di caratteri utilizzato nel file di backup creato in precedenza.<br> Devi inserire manualmente il set di caratteri standard con cui è stato salvato questo backup.<br> Dopo aver fatto questo, MySQLDumper effettuerà la connessione verso il MySQL-Server contenente il set di caretteri scelto e avvierà il ripristino dei dati. Se dopo il ripristono si presentassero problemi nella visualizzazione dei caratteri speciali, sarà opportuno ripetere la procedura di ripistino scegliendo un altro set di caratteri.<br>Buona fortuna.;)";
$lang['L_DOWNLOAD_FILE']="Scarica file";
$lang['L_BACKUP_NOT_POSSIBLE'] = "A backup of the system database `%s` is not possible!";
?>