<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1>Admin Login</h1>
    <form id="login-form" action="#">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div id="user-creation" style="display: none;">
      <h2>Create Employee</h2>
      <form id="user-form" action="/classes/app.php" method="post">
        <input type="hidden" name="action" value="register"> <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" id="fname" name="fname" required>
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" id="lname" name="lname" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Phone Number:</label>
          <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="auto-password" name="auto-password" required>
          <label class="form-check-label" for="auto-password" >Auto-generate Strong Password</label>
        </div>
        <button type="submit" class="btn btn-success">Create User</button>
      </form>
    </div>
  </div>

  <script>
    const loginForm = document.getElementById('login-form');
    const userCreation = document.getElementById('user-creation');
    const autoPasswordCheckbox = document.getElementById('auto-password');

    loginForm.addEventListener('submit', (event) => {
      event.preventDefault(); // Prevent default form submission

      // Simulate successful login (replace with actual validation)
      if (username.value === 'admin' && password.value === 'password') { // Replace with actual authentication logic
        loginForm.style.display = 'none';
        userCreation.style.display = 'block';
      } else {
        alert('Invalid username or password');
      }
    });

    // Add functionality for handling user creation form submission and password generation (replace with actual logic)
  </script>
</body>
</html>