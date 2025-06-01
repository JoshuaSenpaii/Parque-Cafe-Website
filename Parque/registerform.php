<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Parque Cafe Sign-Up</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
    }

    body {
      position: relative;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .background-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      filter: brightness(50%);
    }

    .container {
      display: flex;
      width: 1000px;
      max-width: 95%;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 0 15px rgba(0,0,0,0.6);
      background-color: rgba(42, 42, 42, 0.9);
      z-index: 1;
    }

    .left-panel {
      width: 50%;
      background-color: rgba(245, 240, 225, 0.95); 
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #4b2e2e;
      padding: 40px 30px;
      position: relative;}


    .left-panel h2 {
      font-size: 22px;
      margin: 0 0 20px;
    }

    .left-panel .logo {
      font-size: 50px;
      margin: 10px 0;
    }

    .left-panel h1 {
      font-size: 28px;
      margin: 10px 0;
      color: #4b2e2e;
    }

    .left-panel p {
      font-size: 20px;
      margin-top: 20px;
    }


    .right-panel {
      width: 50%;
      background-color: rgba(30, 30, 30, 0.95);
      padding: 40px 30px;
    }

 .right-panel h2 {
      font-size: 24px;
      color: white; 
      margin-bottom: 30px;
      text-align: center;
      font-weight: bold;
    }

    form label {
      display: block;
      font-weight: bold;
      font-size: 13px;
      color: white;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 20px;
      background-color: #2a2a2a;
      color: white;
      border: none;
      border-radius: 6px;
    }

    .form-row {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .form-row div {
      width: 100%;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: white;
      color: #1e1e1e;
      font-weight: bold;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #2a2a2a;
      color: white;
    }
  </style>
</head>
<body>

 
  <img class="background-image" src="img/pexelheartcoffee.jpg" alt="Coffee Background">

  <div class="container">
    <div class="left-panel">
      <h2>Welcome to</h2>
      <div class="logo">☕</div>
      <h1>Parque Cafe</h1>
      <p>Parque Café is a one stop cafe for your appetite. We serve light to heavy snacks.</p>
    </div>
    <div class="right-panel">
      <h2>Registration</h2>
      <form action="registration.php" method="post">
        <div class="form-row">
          <div>
            <label>First Name</label>
            <input type="text" placeholder="First Name" name="firstname">
          </div>
          <div>
            <label>Last Name</label>
            <input type="text" placeholder="Last Name" name="lastname">
          </div>
        </div>
        <label>Email</label>
        <input type="email" placeholder="email@example.com" name="email">
        
        <label>Phone</label>
        <input type="tel" placeholder="09345678912" name="phone">
        
        <label>Password</label>
        <input type="password" placeholder="••••••••" name="password">
        
        <button type="submit" name="submit">Submit</button>
      </form>
    </div>
  </div>
</body>
</html>
