<?php

    require_once('./handlers/database.handler.php');

    $objDatabase = new DatabaseHandler('localhost', 'root', 'local');

    $strQuery = 'SELECT * '.
                  'FROM testlogin.tblblogentry';
    $objBlogEntries = mysql_query( $strQuery );

    while( $arrRow = mysql_fetch_assoc( $objBlogEntries ) )
    {
        $arrBlogEntries[] = $arrRow;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Blog</title>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 13px;
            }
            small {
                color: #555;
                font-style: italic;
            }

            h1 {
                border-bottom: 1px solid #ccc;
                font-family: 'Cambria', serif;
                font-weight: normal;
                margin-top: 0;
                padding-bottom: 10px;
            }


            .blogentry {
                border: 1px solid #ccc;
                background-color: #eee;
                margin-bottom: 10px;
                padding: 16px;
            }
                .blogentry p {
                    margin-top: 0;
                }
                .blogentry p:last-child {
                    margin-bottom: 0;
                }


        </style>
    </head>
    <body>
        <?php foreach ($arrBlogEntries as $arrBlogEntry) { ?>
            <div class="blogentry">
                <h1><?php echo $arrBlogEntry['strBlogTitle']; ?> <small> - <?php echo $arrBlogEntry['strBlogSubtitle']; ?></small></h1>
                <p><?php echo $arrBlogEntry['strContent']; ?></p>
            </div>
        <?php } ?>
    </body>
</html>
