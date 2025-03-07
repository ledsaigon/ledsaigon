<?php
$lang['L_CONVERT_START']="Iniciar a conversão";
$lang['L_CONVERT_TITLE']="Converter o dump para o formato MSD";
$lang['L_CONVERT_WRONG_PARAMETERS']="Parâmetros incorretos!  A conversão não é possível.";
$lang['L_FM_UPLOADFILEREQUEST']="favor escolher um arquivo.";
$lang['L_FM_UPLOADNOTALLOWED1']="Este tipo de arquivo não é suportado.";
$lang['L_FM_UPLOADNOTALLOWED2']="Os tipos válidos são: *.gz and *.sql-files";
$lang['L_FM_UPLOADMOVEERROR']="Não pude mover os arqruivos selecionados para o diretório de envio.";
$lang['L_FM_UPLOADFAILED']="O envio falhou!";
$lang['L_FM_UPLOADFILEEXISTS']="Um arquivo com o mesmo nome já existe !";
$lang['L_FM_NOFILE']="Você não escolheu nenhum arquivo!";
$lang['L_FM_DELETE1']="O arquivo ";
$lang['L_FM_DELETE2']=" foi excluido com sucesso.";
$lang['L_FM_DELETE3']=" não pode ser excluido!";
$lang['L_FM_CHOOSE_FILE']="Arquivo escolhido:";
$lang['L_FM_FILESIZE']="Tamanho do arquivo";
$lang['L_FM_FILEDATE']="Data do arquivo";
$lang['L_FM_NOFILESFOUND']="Nenhum arquivo encontrado.";
$lang['L_FM_TABLES']="Tabelas";
$lang['L_FM_RECORDS']="Registros";
$lang['L_FM_ALL_BU']="Todos os backups";
$lang['L_FM_ANZ_BU']="Backups";
$lang['L_FM_LAST_BU']="Último backup";
$lang['L_FM_TOTALSIZE']="Tamanho total";
$lang['L_FM_SELECTTABLES']="Selecionar tabelas";
$lang['L_FM_COMMENT']="Digitar comentário";
$lang['L_FM_RESTORE']="Restaurar";
$lang['L_FM_ALERTRESTORE1']="Deve o banco de dados";
$lang['L_FM_ALERTRESTORE2']="ser restaurado com os rgistros do arquivo";
$lang['L_FM_ALERTRESTORE3']=" ?";
$lang['L_FM_DELETE']="Excluir";
$lang['L_FM_ASKDELETE1']="Deve o arquivo ";
$lang['L_FM_ASKDELETE2']="realmente ser excluido?";
$lang['L_FM_ASKDELETE3']="Você deseja que a autoexclusão seja executada com as regras configuradas agora?";
$lang['L_FM_ASKDELETE4']="Você deseja excluir todos os arqruvos de backup?";
$lang['L_FM_ASKDELETE5']="Você deseja excluir todos os arqruvos de backup com ";
$lang['L_FM_ASKDELETE5_2']="_* ?";
$lang['L_FM_DELETEAUTO']="Executar a autoexclusão manualmente";
$lang['L_FM_DELETEALL']="Excluir todos os arqruvos de backup";
$lang['L_FM_DELETEALLFILTER']="Excluir todos com ";
$lang['L_FM_DELETEALLFILTER2']="_*";
$lang['L_FM_STARTDUMP']="Iniciar novo backup";
$lang['L_FM_FILEUPLOAD']="Enviar arquivo";
$lang['L_FM_DBNAME']="Nome do banco de dados";
$lang['L_FM_FILES1']="Backups do banco de dados";
$lang['L_FM_FILES2']="Estruturas do banco de dados";
$lang['L_FM_AUTODEL1']="Autoexclusão: os seguintes arqruivos foram excluidos devido ao ajuste de número máximo de arquivos:";
$lang['L_DELETE_FILE_SUCCESS']="File \"%s\" was deleted successfully.";
$lang['L_FM_DUMPSETTINGS']="Configuração do script";
$lang['L_FM_OLDBACKUP']="(desconhecido)";
$lang['L_FM_RESTORE_HEADER']="Restaurar o banco de dados \"<strong>%s</strong>\"";
$lang['L_DELETE_FILE_ERROR']="Error deleting file \"%s\"!";
$lang['L_FM_DUMP_HEADER']="Backup";
$lang['L_DOCRONBUTTON']="Executar o script Perl Cron";
$lang['L_DOPERLTEST']="Testar módulos Perl";
$lang['L_DOSIMPLETEST']="Testar Perl";
$lang['L_PERLOUTPUT1']="Entrada no crondump.pl para o absolute_path_of_configdir";
$lang['L_PERLOUTPUT2']="URL para o navegador ou serviço Cron externo";
$lang['L_PERLOUTPUT3']="Linha de comando no terminal para o Crontab";
$lang['L_RESTORE_OF_TABLES']="Choose tables to be restored";
$lang['L_CONVERTER']="Conversor de backup";
$lang['L_CONVERT_FILE']="Arquivo a ser convertido";
$lang['L_CONVERT_FILENAME']="Nome do arquivo de destino (sem extensão)";
$lang['L_CONVERTING']="Convertendo";
$lang['L_CONVERT_FILEREAD']="Ler arquivo '%s'";
$lang['L_CONVERT_FINISHED']="Conversão terminada, o arquivo '%s' foi gravado com sucesso.";
$lang['L_NO_MSD_BACKUPFILE']="Backups de outros scripts";
$lang['L_MAX_UPLOAD_SIZE']="Tamanho máximo do aqruivo";
$lang['L_MAX_UPLOAD_SIZE_INFO']="Se o seu arquivo de dump é maior que o limite mencionado acima, você deve enviá-lo via FTP para o diretório \"work/backup\".
Após fazer isso você poderá escolhê-lo novamente para iniciar o processo de restauração. ";
$lang['L_ENCODING']="encoding";
$lang['L_FM_CHOOSE_ENCODING']="Choose encoding of backup file";
$lang['L_CHOOSE_CHARSET']="MySQLDumper couldn't detect the encoding of the backup file automatically.
<br>You must choose the charset with which this backup was saved.
<br>If you discover any problems with some characters after restoring, you can repeat the backup-progress and then choose another character set.
<br>Good luck. ;)";
$lang['L_DOWNLOAD_FILE']="Download file";
$lang['L_BACKUP_NOT_POSSIBLE'] = "A backup of the system database `%s` is not possible!";
?>