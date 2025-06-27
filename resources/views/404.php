<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>404 Not Found</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .error-container {
      text-align: center;
    }

    .error-code {
      font-size: 10rem;
      font-weight: 800;
      color: #dc3545;
    }

    .error-message {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    .home-btn {
      padding: 10px 25px;
      font-size: 1rem;
      border-radius: 30px;
    }

    @media (max-width: 768px) {
      .error-code {
        font-size: 6rem;
      }

      .error-message {
        font-size: 1.2rem;
      }
    }
  </style>
</head>

<body>

  <div class="container error-container">
    <div class="error-code">404</div>
    <div class="error-message">عذراً! الصفحة اللي بتدور عليها مش موجودة</div>
    <a href="/" class="btn btn-danger home-btn">الرجوع للصفحة الرئيسية</a>
  </div>

</body>

</html>
