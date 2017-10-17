<?php
/**
 * Convertie la string pour accepter les ' dans la base de donnée
 * @param string $value
 * @return null|string
 */
function clearDataSql($value){
    global $db;
    $data_clean = null;
    if(is_string($value)){
        // effectue les echapements pour que les requetes sql soient valides.
        $data_clean = mysqli_real_escape_string($db, $value);
    }elseif(is_array($value)){
        foreach($value as $k => $v){
            $data_clean[$k] = "'".mysqli_real_escape_string($db, $v)."'";
        }
    }
    return $data_clean;
}
/**
 * Trouver un User dans la DB
 * @param string $key le champs a chercher dans la db
 * @param string $value le 'login' tapé par l'utilisateur
 * @param bool $count
 * @return bool|int|mysqli_result
 */
function findOneUserBy($key, $value, $count = false){
    global $db;
    $clean_data_sql = "'".clearDataSql($value)."'";
    $sql = "SELECT * FROM user WHERE $key = $clean_data_sql";
    $resultat = mysqli_query($db, $sql) or die($sql.'=>'.mysqli_error($db));
    // si on veux compter les resultats et non avoir les données.
    if($count){
        $resultat = mysqli_num_rows($resultat);
    }
    return $resultat;
}
/**
 * Inserer un user dans la DB
 * @param $datas
 * @return bool|mysqli_result
 */
function addUser($datas){
    global $db;
    $keys = array_keys($datas);
    //$clean_key_sql = clearDataSql($keys);
    $clean_data_sql = clearDataSql($datas);
    $keys_string = implode(',', $keys).",is_admin,created_at";
    $values_string = implode(',', $clean_data_sql).',0,NOW()';
    $sql = "INSERT INTO user ($keys_string) VALUES ($values_string)";
    $result = mysqli_query($db, $sql) or die($sql.'=>'.mysqli_error($db));
    return $result;
}
/**
 * Identifier un user  login ou mail avec un mots de passe
 * @param $login
 * @param $password
 * @param string $type (login, email)
 * @param bool $count
 * @return bool|int|mysqli_result
 */
function login($login, $password, $type = 'login', $count = true){
    global $db;
    $login = clearDataSql($login);
    $password = clearDataSql($password);
    $sql = "SELECT * FROM user WHERE $type = $login AND password = $password";
    $result = mysqli_query($db, $sql) or die($sql.'=>'.mysqli_error($db));
    if($count) {
        $result = mysqli_num_rows($result);
    }
    return $result;
}
/**
 * Trouve tout les Users de la DB
 * @param bool $count
 * @return bool|int|mysqli_result
 */
function findAllUser($count = false){
    global $db;
    $sql = "SELECT * FROM user";
    $result = mysqli_query($db, $sql) or die($sql.'=>'.mysqli_error($db));
    if($count){
        $result = mysqli_num_rows($result);
    }
    return $result;
}
