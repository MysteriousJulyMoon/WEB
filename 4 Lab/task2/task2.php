<?php
\$str = "a1b2c3d10";
\$result = preg_replace_callback("/\d+/", function(\$matches) {
    return (\$matches[0] - 5);   //Заменить числа на их значение минус 5
}, \$str);
echo \$result; 
?>