<?php
/**
 * email delivery service
 * mailgun
 * mailjet
 *
 * payer avec une cb
 * stripe
 *
 * Fournir des stats sur la repartition par FAI d'adresses emails.
 * Ex: -25% @gmail.com
 *     -65% @free.fr
 *     -10% @yahoo.fr
 *      etc...
 */
/*$emails = [
    'toto@gmail.com',
    'titi@gmail.com',
    'tata@gmail.com',
    'tutut@gmail.com',
    'bob@gmail.com',
    'bobi@gmail.com',
    'sarah@gmail.com',
    'nico@gmail.com',
    'Arture@gmail.com',
    'Xiomara@free.fr',
    'Adriana@free.fr',
    'florence@free.fr',
    'steph@free.fr',
    'emilie@free.fr',
    'cedric@hotmail.com',
    'salome@hotmail.com',
    'vartan@yahoo.fr',
    'masis@yahoo.fr',
    'pascal@yahoo.fr',
    'cyril@yahoo.fr',
    'carole@yahoo.fr',
    'monique@hotmail.com',
    'adjoa@hotmail.com',
];*/
/*function research($emails)
{
    $getGmail = strpos($emails, '@gmail');
    $getYahoo = strpos($emails, '@yahoo');
    $getFree = strpos($emails, '@free');
    $getHotmail = strpos($emails, '@hotmail');
    $arrayEmails = [ $getGmail,
        $getYahoo,
        $getFree,
        $getHotmail
    ];
    return $getGmail;

}*/
/*
$gmail = array_filter($emails, 'researchGmail');
function researchGmail($emails)
{
    $getGmail = '@gmail';
    return (strpos($emails, $getGmail));
}

$gmail = array_filter($emails, 'researchGmail');

function researchYahoo($emails)
{
    $getYahoo = '@yahoo';
    return (strpos($emails, $getYahoo));
}

$yahoo = array_filter($emails, 'researchYahoo');

function researchFree($emails)
{
    $getFree = '@free';
    return (strpos($emails, $getFree));
}

$free = array_filter($emails, 'researchFree');

function researchHotmail($emails)
{
    $getHotmail = '@hotmail';
    return (strpos($emails, $getHotmail));
}

$hotmail = array_filter($emails, 'researchHotmail');*/
/*
$gmail = in_array("@gmail", $emails);
$free = in_array("@free", $emails);
$yahoo = in_array("@yahoo", $emails);
$hotmail = in_array("@hotmail", $emails);*/
/*$gmail = in_array("@gmail", $emails);
$free = in_array("@free", $emails);
$yahoo = in_array("@yahoo", $emails);
$hotmail = in_array("@hotmail", $emails);*/

$file = fopen("./emails.csv", 'r');
$emails =[];
while(!feof($file)){
    //fgetcsv($file);
    $emails[]=fgetcsv($file)[0];
}
print_r($emails);

$domaines = [];
$domaine = [];
foreach($emails as $email){
    $domaine = explode('@', $email);
    $domaines[] = $domaine[1];
    //echo $domaines[1].PHP_EOL;
}
print_r($domaines);
$stats = array_count_values($domaines);
print_r($stats);
$total_email = array_sum($stats);
foreach($stats as $fai=>$nb_occurence){
    $pourcentage = 100*($nb_occurence/$total_email);
    echo $fai.': '.round($pourcentage, 2).' %';
}
/*foreach($domaine as $list){
    $result = count($list, )
}*/