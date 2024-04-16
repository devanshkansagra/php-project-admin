<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new Admin User</title>
  <link rel="stylesheet" href="./css/adminStyle.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body data-bs-theme="dark">
  <div class="container mt-9 w-25 border p-4 rounded">
    <div align="center" class="my-3"><i class="fa-solid fa-user fa-2xl"></i></div>
    <h1 align="center" class="my-3 bold">Register Admin User</h1>
    <form action="./adminSignup.php" method="POST" class=" p-3">
        <div class="d-flex justify-content-between">
            <div class="form-floating mb-3 me-2">
                <input type="text" class="form-control" id="fname" name="firstName" placeholder="First Name">
                <label for="fname">First Name</label>
            </div>
            <div class="form-floating ms-2">
                <input type="text" class="form-control" id="lname" name="lastName" placeholder="Last Name">
                <label for="lname">Last Name</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="submit" class="btn btn-primary w-100 mt-3" value="Submit">
        </div>
    </form>
  </div>
</body>
<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>

