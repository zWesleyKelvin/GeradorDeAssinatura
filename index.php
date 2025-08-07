<?php

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerador de Assinatura</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    input.form-control {
      padding: 6px 10px;
      font-size: 14px;
    }

    label.form-label {
      margin-bottom: 4px;
      font-size: 14px;
    }

    button.btn {
      padding: 6px 16px;
      font-size: 14px;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container py-4">
    <h2 class="mb-3">Gerador de Assinatura Pessoal</h2>
    <form action="gerar.php" method="post" enctype="multipart/form-data" class="p-4 bg-white shadow rounded">

      <div class="mb-3">
        <label class="form-label">Nome:</label>
        <input type="text" name="nome" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email:</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Telefone:</label>
        <input type="text" id="telefone" name="telefone" class="form-control">
      </div>

      <div class="mb-3">
        <label class="form-label">WhatsApp (apenas número com DDD):</label>
        <input type="text" name="whatsapp" class="form-control" placeholder="Ex: 21912345678">
      </div>

      <div class="mb-3">
        <label class="form-label">Instagram (link):</label>
        <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/seuperfil">
      </div>

      <div class="mb-3">
        <label class="form-label">LinkedIn (link):</label>
        <input type="text" name="linkedin" class="form-control" placeholder="https://linkedin.com/in/seuperfil">
      </div>

      <div class="mb-3">
        <label class="form-label">Escolha uma imagem:</label>
        <input type="file" name="foto" class="form-control" accept="image/*">
      </div>

      <button type="submit" class="btn btn-primary">Gerar Assinatura</button>
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