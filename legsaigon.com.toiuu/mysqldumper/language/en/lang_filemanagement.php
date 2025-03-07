<?php
$lang['L_CONVERT_START']="Start Conversion";
$lang['L_CONVERT_TITLE']="Convert Dump to MSD Format";
$lang['L_CONVERT_WRONG_PARAMETERS']="Wrong parameters!  Conversion is not possible.";
$lang['L_FM_UPLOADFILEREQUEST']="please choose a file.";
$lang['L_FM_UPLOADNOTALLOWED1']="This file type is not supported.";
$lang['L_FM_UPLOADNOTALLOWED2']="Valid types are: *.gz and *.sql-files";
$lang['L_FM_UPLOADMOVEERROR']="Couldn't move selected file to the upload directory.";
$lang['L_FM_UPLOADFAILED']="The upload has failed!";
$lang['L_FM_UPLOADFILEEXISTS']="A file with the same name already exists !";
$lang['L_FM_NOFILE']="You didn't choose a file!";
$lang['L_FM_DELETE1']="The file ";
$lang['L_FM_DELETE2']=" was deleted successfully.";
$lang['L_FM_DELETE3']=" couldn't be deleted!";
$lang['L_FM_CHOOSE_FILE']="Chosen file:";
$lang['L_FM_FILESIZE']="File size";
$lang['L_FM_FILEDATE']="File date";
$lang['L_FM_NOFILESFOUND']="No file found.";
$lang['L_FM_TABLES']="Tables";
$lang['L_FM_RECORDS']="Records";
$lang['L_FM_ALL_BU']="All Backups";
$lang['L_FM_ANZ_BU']="Backups";
$lang['L_FM_LAST_BU']="Last Backup";
$lang['L_FM_TOTALSIZE']="Total Size";
$lang['L_FM_SELECTTABLES']="Select tables";
$lang['L_FM_COMMENT']="Enter Comment";
$lang['L_FM_RESTORE']="Restore";
$lang['L_FM_ALERTRESTORE1']="Should the database";
$lang['L_FM_ALERTRESTORE2']="be restored with the records from the file";
$lang['L_FM_ALERTRESTORE3']=" ?";
$lang['L_FM_DELETE']="Delete";
$lang['L_FM_ASKDELETE1']="Should the file(s)";
$lang['L_FM_ASKDELETE2']="really be deleted?";
$lang['L_FM_ASKDELETE3']="Do you want autodelete to be executed with configured rules now?";
$lang['L_FM_ASKDELETE4']="Do you want to delete all backup files?";
$lang['L_FM_ASKDELETE5']="Do you want to delete all backup files with ";
$lang['L_FM_ASKDELETE5_2']="_* ?";
$lang['L_FM_DELETEAUTO']="Run autodelete manually";
$lang['L_FM_DELETEALL']="Delete all backup files";
$lang['L_FM_DELETEALLFILTER']="Delete all with ";
$lang['L_FM_DELETEALLFILTER2']="_*";
$lang['L_FM_STARTDUMP']="Start New Backup";
$lang['L_FM_FILEUPLOAD']="Upload file";
$lang['L_FM_DBNAME']="Database name";
$lang['L_FM_FILES1']="Database Backups";
$lang['L_FM_FILES2']="Database Structures";
$lang['L_FM_AUTODEL1']="Autodelete: the following files were deleted because of maximum files setting:";
$lang['L_DELETE_FILE_SUCCESS']="File \"%s\" was deleted successfully.";
$lang['L_FM_DUMPSETTINGS']="Backup Configuration";
$lang['L_FM_OLDBACKUP']="(unknown)";
$lang['L_FM_RESTORE_HEADER']="Restore of Database \"<strong>%s</strong>\"";
$lang['L_DELETE_FILE_ERROR']="Error deleting file \"%s\"!";
$lang['L_FM_DUMP_HEADER']="Backup";
$lang['L_DOCRONBUTTON']="Run the Perl Cron script";
$lang['L_DOPERLTEST']="Test Perl Modules";
$lang['L_DOSIMPLETEST']="Test Perl";
$lang['L_PERLOUTPUT1']="Entry in crondump.pl for absolute_path_of_configdir";
$lang['L_PERLOUTPUT2']="URL for the browser or for external Cron job";
$lang['L_PERLOUTPUT3']="Commandline in the Shell or for the Crontab";
$lang['L_RESTORE_OF_TABLES']="Choose tables to be restored";
$lang['L_CONVERTER']="Backup Converter";
$lang['L_CONVERT_FILE']="File to be converted";
$lang['L_CONVERT_FILENAME']="Name of destination file (without extension)";
$lang['L_CONVERTING']="Converting";
$lang['L_CONVERT_FILEREAD']="Read file '%s'";
$lang['L_CONVERT_FINISHED']="Conversion finished, '%s' was written successfully.";
$lang['L_NO_MSD_BACKUPFILE']="Backups of other scripts";
$lang['L_MAX_UPLOAD_SIZE']="Maximum filesize";
$lang['L_MAX_UPLOAD_SIZE_INFO']="If your Dumpfile is bigger than the above mentioned limit, you must upload it via FTP into the directory \"work/backup\".
After that you can choose it to begin a restore progress. ";
$lang['L_ENCODING']="encoding";
$lang['L_FM_CHOOSE_ENCODING']="Choose encoding of backup file";
$lang['L_CHOOSE_CHARSET']="MySQLDumper couldn't detect the encoding of the backup file automatically.
<br>You must choose the charset with which this backup was saved.
<br>If you discover any problems with some characters after restoring, you can repeat the backup-progress and then choose another character set.
<br>Good luck. ;)";
$lang['L_DOWNLOAD_FILE']="Download file";
$lang['L_BACKUP_NOT_POSSIBLE'] = "A backup of the system database `%s` is not possible!";
?>