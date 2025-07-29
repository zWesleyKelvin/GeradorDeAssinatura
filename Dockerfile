# Usa imagem oficial do PHP com servidor embutido
FROM php:8.1-cli

# Define o diretório de trabalho dentro do container
WORKDIR /app

# Copia todos os arquivos para o container
COPY . /app

# Expõe a porta que o Render exige
EXPOSE 10000

# Comando para iniciar o servidor embutido
CMD ["php", "-S", "0.0.0.0:10000"]
