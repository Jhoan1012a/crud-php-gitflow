<?php
function formatDate($date) {
    if (empty($date)) return 'N/A';
    $dt = new DateTime($date);
    return $dt->format('d/m/Y H:i');
}

function formatDateShort($date) {
    if (empty($date)) return 'N/A';
    $dt = new DateTime($date);
    return $dt->format('d/m/Y');
}
?>