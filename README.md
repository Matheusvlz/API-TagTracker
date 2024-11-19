# API-TagTracker  

## Descrição do Projeto  
A **API-TagTracker** é o componente de backend do sistema **ACELERA: TagTracker**, desenvolvido para gerenciamento e controle de estoque utilizando tecnologia RFID. A API foi implementada em **Laravel** e é responsável por intermediar a comunicação entre o **Arduino MEGA**, o site gerencial e o banco de dados **PostgreSQL** em um contêiner Docker.  

### Funcionalidades principais:  
- Receber e armazenar o UID de tags RFID lidas pelo Arduino.  
- Consultar e retornar informações associadas a tags RFID.  
- Gerenciar dados do estoque vinculados às etiquetas.  
- Comunicação segura e eficiente entre dispositivos físicos e o sistema gerencial.  

---

## Estrutura do Projeto  

- **Framework utilizado:** Laravel 11.27.2  
- **Banco de Dados:** PostgreSQL (em contêiner Docker)  
- **Servidor de Desenvolvimento:** Apache  
- **Ambiente Virtual:** Linux Mint  

---

## Requisitos do Sistema  

### Para rodar o projeto localmente:  
- **PHP:** Versão >= 8.2  
- **Composer:** Versão atualizada  
- **Docker:** Para o contêiner do PostgreSQL  
- **Extensões PHP:**  
  - pdo_pgsql  
  - mbstring  
  - curl  

---

## Configuração Inicial  

1. Clone este repositório:  
   ```bash  
   git clone https://github.com/seuusuario/API-TagTracker.git  
   ```  

2. Acesse o diretório do projeto:  
   ```bash  
   cd API-TagTracker  
   ```  

3. Instale as dependências do Laravel:  
   ```bash  
   composer install  
   ```  

4. Configure o arquivo `.env`:  
   - Duplique o arquivo `.env.example` e renomeie para `.env`.  
   - Atualize os parâmetros do banco de dados com suas credenciais:  
     ```dotenv  
     DB_CONNECTION=pgsql  
     DB_HOST=127.0.0.1  
     DB_PORT=5432  
     DB_DATABASE=tagtracker  
     DB_USERNAME=postgres  
     DB_PASSWORD=sua_senha  
     ```  

5. Gere a chave da aplicação:  
   ```bash  
   php artisan key:generate  
   ```  

6. Execute as migrações para criar as tabelas no banco de dados:  
   ```bash  
   php artisan migrate  
   ```  



## Ferramentas Utilizadas  

- **Laravel Framework:** Desenvolvimento do backend.  
- **Docker:** Contêinerização do banco de dados PostgreSQL.  
- **Guzzle HTTP:** Comunicação entre a API e o site gerencial.  
- **Postman:** Testes de rotas e validação de endpoints.  

---

## Estrutura de Pastas  

- **`/app`**: Contém os controladores, modelos e lógica de negócios.  
- **`/routes`**: Define as rotas da API, especialmente no arquivo `api.php`.  
- **`/database`**: Arquivos de migrações e seeds para o banco de dados.  
- **`/config`**: Configurações gerais da aplicação.  

---

## Contribuidores  

- **Matheus Vilela Reis dos Santos** - Desenvolvimento do Backend.  
- **Otávio Henrique Nascimento de Souza** - Documentação.  

---

## Licença  

Este projeto é protegido sob a licença [MIT](https://opensource.org/licenses/MIT).  
