<?php

function safeOutput($string)

{
   return htmlspecialchars($string, ENT_QUOTES);
}