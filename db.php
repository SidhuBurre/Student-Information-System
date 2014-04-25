<? Php
 
/ / Init
error_reporting (E_ALL);
header ( 'Content-type: text / plain' );
 
/ / Config
$ Dbname  = 'sidhu' ;
mysql_connect ( 'localhost' , 'sidhu' , 'sidhu' );
mysql_select_db ( $ dbname );
 
/ / Open file dump
$ Dumpfile  = $ dbname . '_' . dates ( 'Ym-d_H-i' ). 'sql.' ;
$ Fp  = fopen ( $ dumpfile , 'w' );
if  (! is_resource ( $ fp )) {
    exit ( 'Backup failed: unable to open dump file' );
}
 
/ / Header
$ Out  = '- SQL Dump
-
- Generation: . 'date (' r ').'
- MySQL: '.. mysql_get_server_info ()'
- PHP Version: '.. phpversion ()'
 
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO" ;
 
-
- Database: ` '.. $ dbname' `
- ';
 
/ / Write
fwrite ( $ fp , $ out );
$ Out  = '' ;
 
/ / Fetch tables
$ Tables  = mysql_query ( "SHOW TABLE STATUS" );
$ C  = 0;
while  ( $ table  = mysql_fetch_assoc ( $ tables )) {
 
    $ TableName  = $ table [ 'Name' ];
 
    $ Tmp  = mysql_query ( "SHOW CREATE TABLE` $ tableName `" );
 
    / / Create table
    $ Create  = mysql_fetch_assoc ( $ tmp );
    $ Out  =. "\ n \ n - \ n - Table structure:` $ tableName `\ n - \ n \ n" . $ create [ 'Create Table' ]. ' ; ' ;
 
    / / Clean
    mysql_free_result ( $ tmp );
    unset ( $ tmp );
 
    / / Write
    fwrite ( $ fp , $ out );
    $ Out  = '' ;
 
    / / Rows
    $ Tmp  = mysql_query ( "SHOW COLUMNS FROM` $ tableName `" );
    $ Rows  = array ();
    while  ( $ row  = mysql_fetch_assoc ( $ tmp )) {
        $ Rows [] = $ row [ 'Field' ];
    }
 
    / / Clean
    mysql_free_result ( $ tmp );
    unset ( $ tmp , $ row );
 
    / / Get data
    $ Tmp  = mysql_query ( "SELECT * FROM` $ tableName `" );
    $ Count  = mysql_num_rows ( $ tmp );
 
    if  ( $ count  > 0) {
 
        $ Out  =. "\ n \ n - \ n - Table data:` $ tableName `\ n -" ;
        $ Out  . = "\ nINSERT INTO` $ tableName `(` " . implode ( '`,`' , $ rows ). "` VALUES) " ;
 
        $ I  = 1;
        / / Fetch data
        while  ( $ entry  = mysql_fetch_assoc ( $ tmp )) {
 
            / / Create values
            $ Out  =. "\ n (" ;
            $ Tmp2  = array ();
 
            foreach  ( $ rows  as  $ row ) {
                $ Tmp2 [] = ""  . mysql_real_escape_string ( $ entry [ $ row ]). "'" ;
            }
 
            $ Out  = implode (. ',' , $ tmp2 );
            $ Out  =. $ i + + === $ count  ? ')'  : ')' ;
 
            / / Save
            fwrite ( $ fp , $ out );
            $ Out  = '' ;
        }
 
        / / Clean
        mysql_free_result ( $ tmp );
        unset ( $ tmp , $ tmp2 , $ i , $ count , $ entry );
 
    }
 
    / / Operations counter
    $ C + +;
}
 
/ / Close dump file
fclose ( $ fp );
 
echo  "! Finished Backup tables $ c` to `$ dumpfile (" . filesize ( $ dumpfile ). "o.)" ;
 
>