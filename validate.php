<?php
function validateName($name) {
    $name = trim($name);
    if (empty($name)) {
        return "El nombre no puede estar vacío";
    }
    if (strlen($name) < 3) {
        return "El nombre debe tener al menos 3 caracteres";
    }
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $name)) {
        return "El nombre solo puede contener letras";
    }
    return null;
}

function validateEmail($email) {
    $email = trim($email);
    if (empty($email)) {
        return "El email no puede estar vacío";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "El formato del email no es válido";
    }
    return null;
}

function validateUserInput($name, $email) {
    $errors = [];
    $nameError = validateName($name);
    $emailError = validateEmail($email);
    if ($nameError) $errors[] = $nameError;
    if ($emailError) $errors[] = $emailError;
    return $errors;
}
?>