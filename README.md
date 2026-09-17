# 🪐 SatellaSoft Labs · Laravel + AWS

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/PHP-8.3%2B-777BB4?logo=php&logoColor=white" alt="PHP 8.3 ou superior">
  <img src="https://img.shields.io/badge/AWS-Comprehend-FF9900?logo=amazonaws&logoColor=white" alt="AWS Comprehend">
</p>

Este repositório concentra os **labs da SatellaSoft**: experimentos práticos para integrar Laravel aos serviços da AWS. Cada mecanismo é uma pequena peça de produto — simples de executar, fácil de evoluir e pronta para aprender fazendo.

## ⚡ Lab atual: Amazon Comprehend

Análise de sentimento em português via API REST.

```mermaid
flowchart LR
    A["💬 Texto"] --> B["🧠 Laravel API"] --> C["☁️ AWS Comprehend"] --> D["📊 Sentimento + scores"]
```

| Endpoint | Payload |
| --- | --- |
| `POST /api/comprehend/sentiment` | `{ "text": "O atendimento foi excelente!" }` |

## 🚀 Rodando localmente

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Configure as credenciais da AWS no `.env`:

```env
AWS_ACCESS_KEY_ID=...
AWS_SECRET_ACCESS_KEY=...
AWS_DEFAULT_REGION=us-east-1
```

Depois, suba a API com `php artisan serve`. Para testar o Comprehend, use o arquivo [http/comprehend.http](http/comprehend.http).

---

**SatellaSoft Labs** · explorando integrações que transformam ideias em soluções. ✨
