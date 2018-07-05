
<?php
$strings = array('08586193462b5');
foreach ($strings as $testcase) {
    if (ctype_digit($testcase)) {
        echo "The string $testcase consists of all digits.\n";
    } else {
        echo "The string $testcase does not consist of all digits.\n";
    }
}
?>
