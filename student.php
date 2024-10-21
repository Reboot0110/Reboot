<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Student Login</h1>
        <form id="loginForm">
            <input type="text" id="username" placeholder="Enter your name" required>
            <button type="submit">Login</button>
        </form>
        <div id="message"></div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent form submission

            const username = document.getElementById('username').value;

            // Prepare data to be sent
            const formData = new FormData();
            formData.append('username', username);

            // Send AJAX request to PHP script
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    localStorage.setItem('studentName', username); // Save student name
                    window.location.href = 'take_exam.html'; // Redirect to exam page
                } else {
                    document.getElementById('message').innerText = data.message; // Display error
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
