<?php
function generatePassword($length) {
   
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $digits = '0123456789';
    $specialChars = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    
    $password = '';
    $password .= $lowercase[rand(0, strlen($lowercase) - 1)]; 
    $password .= $uppercase[rand(0, strlen($uppercase) - 1)]; 
    $password .= $digits[rand(0, strlen($digits) - 1)]; 
    $password .= $specialChars[rand(0, strlen($specialChars) - 1)]; 


    $allChars = $lowercase . $uppercase . $digits . $specialChars;
    for ($i = strlen($password); $i < $length; $i++) {
        $password .= $allChars[rand(0, strlen($allChars) - 1)];
    }


    return str_shuffle($password);
}


function isStrongPassword($password) {
    
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    if (!preg_match('/\d/', $password)) {
        return false;
    }
  
    if (!preg_match('/[!@#$%^&*()_+\-=\[\]{}|;:,.<>?]/', $password)) {
        return false;
    }
    
    if (strlen($password) < 8) {
        return false;
    }
    return true;
}


function generateSecurePasswords($numPasswords, $length) {
    $passwords = [];
    while (count($passwords) < $numPasswords) {
        $password = generatePassword($length);
        if (isStrongPassword($password)) {
            $passwords[] = $password;
        }
    }
    return $passwords;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $numPasswords = (int)$_POST['numPasswords'];
    $length = (int)$_POST['length'];
    $passwords = generateSecurePasswords($numPasswords, $length);
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Генерація безпечних паролів</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="number"] {
            padding: 5px;
            font-size: 16px;
            width: 50px;
        }
        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        li {
            padding: 5px 0;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <h2>Генерація безпечних паролів</h2>
    
    <form method="POST">
        <label for="numPasswords">Кількість паролів:</label>
        <input type="number" id="numPasswords" name="numPasswords" required min="1" max="100" placeholder="1" aria-label="Кількість паролів" autofocus><br><br>

        <label for="length">Довжина паролю:</label>
        <input type="number" id="length" name="length" required min="8" max="32" placeholder="8" aria-label="Довжина паролю"><br><br>

        <input type="submit" value="Генерувати" aria-label="Генерувати паролі">
    </form>

    <?php if (isset($passwords)): ?>
        <h3>Згенеровані паролі:</h3>
        <ul>
            <?php foreach ($passwords as $password): ?>
                <li><?php echo htmlspecialchars($password); ?></li>
                <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>