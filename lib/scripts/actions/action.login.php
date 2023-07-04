<?php
function smarty_function_set_session($params, $smarty) {
    if (!empty($params['key']) && !empty($params['value'])) {
        $_SESSION[$params['key']] = $params['value'];
    }
}

$smarty->assign('session', $_SESSION);
$smarty->registerPlugin('function', 'set_session', 'smarty_function_set_session');
$smarty->display('../tpl/index.loginPanel.tpl');

?>