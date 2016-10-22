<?php

class Log
{

    public final function escrever($dados)
    {
        echo "<hr> Gerando Log..... <br><br>$dados<br><br><hr>";
    }
}

class LogAlterado extends Log
{
}