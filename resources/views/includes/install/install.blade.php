<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        h2 {
            color: #007bff;
            margin-top: 30px;
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert {
            max-width: 400px;
            margin: 20px auto;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Installation</h1>
        
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show custom-alert">
            <strong>{{ session('error') }}</strong>
        </div>
        @endif

        <form action="{{ route('install.process') }}" method="POST">
            @csrf

            <h2>Database Connection</h2>

            <label for="db_host">Database Host:</label>
            <input type="text" id="db_host" name="db_host" value="127.0.0.1" required>

            <label for="db_port">Database Port:</label>
            <input type="number" id="db_port" name="db_port" value="3306" required>

            <label for="db_database">Database Name:</label>
            <input type="text" id="db_database" name="db_database" required>

            <label for="db_username">Database Username:</label>
            <input type="text" id="db_username" name="db_username" required>

            <label for="db_password">Database Password:</label>
            <input type="password" id="db_password" name="db_password">

            <h2>Admin Account</h2>

            <label for="admin_email">Admin Email:</label>
            <input type="text" id="admin_email" name="admin_email" required>

            <label for="admin_password">Admin Password:</label>
            <input type="password" id="admin_password" name="admin_password" required>

            <button type="submit">Install</button>
        </form>
    </div>
</body>
</html>
