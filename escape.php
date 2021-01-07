<?php
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
//<?php echo htmlspecialchars($value['name'], ENT_QUOTES, "UTF-8");
//<?php echo htmlspecialchars($value['message'], ENT_QUOTES, "UTF-8");
