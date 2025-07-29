<?php
// index.php - Formulário com Bootstrap
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
  <h2 class="mb-3">Gerador de Assinatura Profissional</h2>
  <form action="gerar.php" method="post">
    <div class="mb-2">
      <label for="nome" class="form-label">Nome completo</label>
      <input type="text" class="form-control" id="nome" name="nome" required>
    </div>
    <div class="mb-2">
      <label for="email" class="form-label">E-mail</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-2">
      <label for="telefone" class="form-label">Telefone celular</label>
      <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(21) 99999-9999" required>
    </div>
    <div class="mb-2">
      <label for="whatsapp" class="form-label">Whatsapp (opcional)</label>
      <input type="url" class="form-control" id="whatsapp" name="whatsapp">
    </div>
    <div class="mb-2">
      <label for="instagram" class="form-label">Instagram (opcional)</label>
      <input type="url" class="form-control" id="instagram" name="instagram">
    </div>
    <div class="mb-2">
      <label for="linkedin" class="form-label">LinkedIn (opcional)</label>
      <input type="url" class="form-control" id="linkedin" name="linkedin">
    </div>
    <button type="submit" class="btn btn-primary">Gerar Assinatura</button>
  </form>
</div>
<script>
  document.getElementById('telefone').addEventListener('input', function(e) {
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
