<?php
//function to get the logged in user's languages
function getUserLanguages($userId,$pdo,$language_id=0)
{
    $q="select id,lang_name from languages_tab a where a.id in (select language_id from user_languages_tab t where t.user_id=$userId)";
    //$q="select id,lang_name from languages_tab a where a.id in (select language_id from user_languages_tab t)";
    $r = $pdo->query($q);
    
    if ($r && $r->rowCount() > 0) {

        // Set the fetch mode:
        $r->setFetchMode(PDO::FETCH_CLASS, 'Language');

        // Records will be fetched in the view:
        include('views/languages.html');
        

    } else { // Problem!
        throw new Exception('No content is available to be viewed at this time.');
    }
}
?>