<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Nama</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #E69DB8, #F1E7E7);
      font-family: "Segoe UI", sans-serif;
    }
    .form-container {
      width: 100%;
      max-width: 450px;
      padding: 30px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      animation: fadeIn 0.7s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px);}
      to { opacity: 1; transform: translateY(0);}
    }
    .form-title {
      font-weight: 700;
      color: #E69DB8;
      text-align: center;
      margin-bottom: 20px;
    }
    .btn-custom {
      background: #E69DB8;
      border: none;
      transition: all 0.3s ease;
    }
    .btn-custom:hover {
      background: #d86a89ff;
      transform: scale(1.02);
    }
    .error {
      color: #dc3545;
      font-size: 0.9rem;
    }
  </style>
</head>
<body>

<?php 
  $nDepan = $nDepanErr = "";
  $nBelakang = $nBelakangErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["namadepan"])) {
          $nDepanErr = "Nama Depan Tidak Boleh Kosong";
      } else {
          $nDepan = bersihkan_input($_POST["namadepan"]);
      }

      if (empty($_POST["namabelakang"])) {
          $nBelakangErr = "Nama Belakang Tidak Boleh Kosong";
      } else {
          $nBelakang = bersihkan_input($_POST["namabelakang"]);
      }    
  }

  function bersihkan_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }
?>

<div class="form-container">
  <h3 class="form-title">Formulir Nama</h3>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="mb-3">
      <label for="namadepan" class="form-label">Nama Depan</label>
      <input type="text" class="form-control <?php echo !empty($nDepanErr) ? 'is-invalid' : ''; ?>" id="namadepan" name="namadepan">
      <div class="error"><?php echo $nDepanErr;?></div>
    </div>

    <div class="mb-3">
      <label for="namabelakang" class="form-label">Nama Belakang</label>
      <input type="text" class="form-control <?php echo !empty($nBelakangErr) ? 'is-invalid' : ''; ?>" id="namabelakang" name="namabelakang">
      <div class="error"><?php echo $nBelakangErr;?></div>
    </div>

    <button type="submit" class="btn btn-custom w-100 py-2" name="tombol">Kirim</button>
  </form>

  <?php if(!empty($nDepan) || !empty($nBelakang)) : ?>
    <div class="alert alert-info mt-4">
      <strong>Hasil Input:</strong><br>
      Nama Depan : <?php echo $nDepan; ?><br>
      Nama Belakang : <?php echo $nBelakang; ?>
    </div>
  <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>