<?php
require_once __DIR__ . '/util.php';
session_start();


// ****** CHARLES ******
// ****** THOMAS  ******
// TODO: Données
$user = 'root';
$password = 'root';
$dns = 'mysql:dbname=shortly;host=localhost';
try {
    
$dbh = new PDO($dns,$user,$password);
} catch (\Throwable $th) {
    throw $th;
}


function data()
{
    return json_decode(file_get_contents(rootPath() . 'data.json'), true);
}


function pageData(string $page):array
{
    return data()['page'][$page];
}


function siteData():array
{
    return data()['site'];
}

function linkData():array
{
    $author_mail = $_SESSION['email'];
    $request = $GLOBALS["dbh"]->prepare('SELECT * FROM `link` WHERE `author_mail` = "'.$author_mail.'"');
    $request->execute();
    $result = $request->fetchAll();
    return $result;
}
function createNewLink(string $url) :bool
{
    $short_link = bin2hex(random_bytes(3)) . substr(md5($url), 15,4) . bin2hex(random_bytes(3));
    $publish = false;
    $click_count = 0;
    $raw_link = $url;
    $author_mail = $_SESSION['email'];
    $request = $GLOBALS["dbh"]->prepare('INSERT INTO link (id, raw_link, short_link, author_mail, click_count ) VALUES (NULL, "'.$raw_link.'", "'.$short_link.'", "'.$author_mail.'", '.$click_count.')');
    //$request = $GLOBALS["dbh"]->prepare("INSERT INTO `link` (`id`, `raw_link`, `short_link`, `author_mail`, `click_count`, `publish`) VALUES (NULL, ':raw', ':short', ':mail', ':click', ':pub')");
    //if($request->bindValue('raw', $raw_link) && $request->bindValue('short', $short_link) && $request->bindValue('mail', $author_mail) && $request->bindValue('click', $click_count) && $request->bindValue('pub', $publish))
    $request->execute();
    $request->fetchAll();
    return 0;
}

function destroyLink(int $id){
    $request = $GLOBALS["dbh"]->prepare('DELETE FROM link WHERE `link`.`id` = '.$id.'');
    $request->execute();
    $request->fetchAll();
}
function publishLink(int $id){
    $publish = 0;
    $request = $GLOBALS["dbh"]->prepare('SELECT publish FROM `link` WHERE `id` = "'.$id.'"');
    $request->execute();
    $result = $request->fetch();
    var_dump($result);
    if ($result['publish'] == '0') {
        $publish = 1;
    }
    var_dump($publish);
    $request = $GLOBALS["dbh"]->prepare('UPDATE `link` SET `publish`='.$publish.' WHERE `id` = "'.$id.'"');
    $request->execute();
    $request->fetchAll();
}
function getRawLink(string $link){
    $request = $GLOBALS["dbh"]->prepare('SELECT raw_link, click_count, publish FROM `link` WHERE `short_link` = "'.$link.'"');
    $request->execute();
    $result = $request->fetch();
    if ($result['publish'] == 0) {
        return "./dashboard/index.php";
    }
    $click = $result['click_count']+1;
    $request = $GLOBALS["dbh"]->prepare('UPDATE `link` SET `click_count`='.$click.' WHERE `short_link` = "'.$link.'"');
    $request->execute();

    return $result['raw_link'];
}


function userList(): array
{
    $request = $GLOBALS["dbh"]->prepare('SELECT * FROM `users`');
    $request->execute();
    $result = $request->fetchAll();
    return $result;
}
function getUser()
{
    $request = $GLOBALS["dbh"]->prepare('SELECT * FROM `users` WHERE email = "' . $_SESSION['email'] . '"');
    $request->execute();
    $result = $request->fetch();
    return $result;
}
function updateUser(array $array)
{
    $password = md5($array["password"]);
    $request = $GLOBALS["dbh"]->prepare('UPDATE users SET firstname ="' . $array["firstname"] . '",lastname ="' . $array["lastname"] . '",email ="' . $array["email"] . '",password ="' . $password . '" WHERE email = "' . $_SESSION['email'] . '" ');
    $request->execute();
    $_SESSION["email"] = $array["email"];
}
