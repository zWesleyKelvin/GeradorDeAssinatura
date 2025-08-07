<?php
function limpar($str)
{
  return htmlspecialchars(trim($str));
}

$nome = limpar($_POST['nome'] ?? '');
$email = limpar($_POST['email'] ?? '');
$telefone = limpar($_POST['telefone'] ?? '');
$whatsapp = limpar($_POST['whatsapp'] ?? '');
$numero_wa = preg_replace('/\D/', '', $whatsapp);
if ($numero_wa) {
  $whatsapp = "https://wa.me/55$numero_wa";
}
$instagram = limpar($_POST['instagram'] ?? '');
$linkedin = limpar($_POST['linkedin'] ?? '');

if (!$nome || !$email) {
  die("<p style='color:red;'>Erro: Nome e E-mail são obrigatórios.</p>");
}

$redes = [];

if ($whatsapp) {
  $redes[] = "<a href='$whatsapp' target='_blank'><img src='https://cdn-icons-png.flaticon.com/16/733/733585.png'/> WhatsApp</a>";
}
if ($instagram) {
  $redes[] = "<a href='$instagram' target='_blank'><img src='https://cdn-icons-png.flaticon.com/16/2111/2111463.png'/> Instagram</a>";
}
if ($linkedin) {
  $redes[] = "<a href='$linkedin' target='_blank'><img src='https://cdn-icons-png.flaticon.com/16/145/145807.png'/> LinkedIn</a>";
}

$waLogo = "<div style='width:60px;height:60px;background:#0c2749;color:#fff;display:flex;align-items:center;justify-content:center;border-radius:8px;'>WA</div>";

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
  $tmp_name = $_FILES['foto']['tmp_name'];
  $mime = mime_content_type($tmp_name);

  if (in_array($mime, ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'])) {
    $base64 = base64_encode(file_get_contents($tmp_name));
    $waLogo = "<img src='data:$mime;base64,{$base64}' alt='Foto' width='60' height='60' style='border-radius:8px;' />";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Assinatura Gerada</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Inter', sans-serif;
    }

    .assinatura-box {
      background: #fff;
      border: 1px solid #dee2e6;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
      margin-top: 30px;
      max-width: 600px;
    }

    .assinatura-box strong {
      color: #0c2749;
      font-size: 16px;
    }

    .assinatura-box a {
      color: #0c2749;
      font-weight: 500;
      text-decoration: none;
      font-size: 14px;
      margin-right: 12px;
    }

    .assinatura-box a:hover {
      text-decoration: underline;
    }

    .assinatura-box img {
      border-radius: 8px;
      vertical-align: middle;
      margin-right: 5px;
    }

    .icones-redes {
      margin-top: 10px;
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
    }

    button.btn,
    a.btn {
      border-radius: 8px;
      font-weight: 500;
      padding: 8px 16px;
      white-space: nowrap;
      flex-shrink: 0;
    }
  </style>
</head>

<body class="container py-4">
  <h3 class="text-center">Assinatura Gerada:</h3>
  <div id="assinatura" class="assinatura-box mx-auto">
    <table>
      <tr>
        <td style="padding-right: 15px;">
          <?php echo $waLogo; ?>
        </td>
        <td>
          <strong><?php echo $nome; ?></strong><br>
          <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
          <?php if ($telefone): ?>
            <img src='https://cdn-icons-png.flaticon.com/16/724/724664.png' /> <?php echo $telefone; ?><br>
          <?php endif; ?>
          <?php if (!empty($redes)): ?>
            <div class="icones-redes"><?php echo implode("", $redes); ?></div>
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </div>

  <div class="d-flex justify-content-center gap-2 flex-wrap mt-4">
    <!-- <button class="btn btn-success" onclick="copiarAssinatura()">📋 Copiar Assinatura</button> -->
    <button class="btn btn-outline-primary" onclick="exportarHTML()">💾 Exportar HTML</button>
    <a href="index.php" class="btn btn-secondary">← Voltar</a>
  </div>

  <script>
    function copiarAssinatura() {
      const area = document.createElement('textarea');
      area.value = document.getElementById('assinatura').innerHTML;
      document.body.appendChild(area);
      area.select();
      document.execCommand('copy');
      document.body.removeChild(area);
      alert("Assinatura copiada para a área de transferência!");
    }

    function exportarHTML() {
      let conteudo = document.getElementById('assinatura').innerHTML;
      conteudo = conteudo.replace(/[\u{1F600}-\u{1F64F}\u{1F300}-\u{1F5FF}\u{1F680}-\u{1F6FF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}]/gu, '');
      const blob = new Blob([`<html><body>${conteudo}</body></html>`], { type: 'text/html' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob);
      a.download = 'assinatura.html';
      a.click();
    }
  </script>
</body>

</html>