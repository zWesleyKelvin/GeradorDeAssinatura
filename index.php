<?php
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerador de Assinatura</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f4f6fa;
      font-family: 'Inter', sans-serif;
      color: #333;
    }

    h2 {
      color: #0c2749;
      font-weight: 600;
    }

    .form-container {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 0 18px rgba(0, 0, 0, 0.05);
      padding: 30px;
    }

    label.form-label {
      font-weight: 500;
      margin-bottom: 6px;
    }

    input.form-control {
      padding: 10px 14px;
      font-size: 15px;
      border-radius: 8px;
    }

    .btn-primary {
      background-color: #0c2749;
      border-color: #0c2749;
      font-weight: 500;
      padding: 10px 18px;
      border-radius: 8px;
    }

    .btn-primary:hover {
      background-color: #0a1f3b;
    }
  </style>
</head>

<body>
  <div class="container py-5">
    <h2 class="mb-4 text-center">Gerador de Assinatura</h2>

    <form action="gerar.php" method="post" enctype="multipart/form-data" class="form-container mx-auto"
      style="max-width: 600px;">

      <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="cargo" class="form-label">Cargo:</label>
        <input type="text" id="cargo" name="cargo" class="form-control" required autocomplete="organization-title" placeholder="Ex.: Auxiliar de Recursos Humanos">
      </div>

      <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="(21) 91234-5678">
      </div>

      <div class="mb-3">
        <label class="form-label">WhatsApp (apenas número com DDD):</label>
        <input type="text" name="whatsapp" class="form-control" placeholder="21912345678">
      </div>

      <div class="mb-3">
        <label class="form-label">Instagram (link):</label>
        <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/seuperfil">
      </div>

      <div class="mb-3">
        <label class="form-label">LinkedIn (link):</label>
        <input type="text" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/seuperfil">
      </div>

      <div class="mb-4">
        <label class="form-label">Escolha uma imagem:</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-primary">Gerar Assinatura</button>
      </div>
    </form>
  </div>

  <script>
    document.getElementById('telefone').addEventListener('input', function (e) {
      let v = e.target.value.replace(/\D/g, "");
      if (v.length > 11) v = v.slice(0, 11);
      let formatado = "";
      if (v.length > 0) formatado = "(" + v.slice(0, 2);
      if (v.length >= 3) formatado += ") " + v.slice(2, 7);
      if (v.length >= 8) formatado += "-" + v.slice(7);
      e.target.value = formatado;
    });
  </script>
</body>

</html>