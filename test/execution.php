<?php
function addition ($a, $b)
{
    if (!is_numeric ($a) OR !is_numeric ($b))
        throw new Exception ('Les deux paramètres doivent être des nombres');
    return $a + $b;
}
try
{
    echo addition (12, 3), '<br />';
    echo addition ('azerty', 55), '<br />';
    echo addition (4, 8);
}
catch (Exception $e)
{
    echo 'Une exception a été lancée. Message d\'erreur : ', $e->getMessage() . "<br />";
}