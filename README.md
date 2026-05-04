# Clean Arch Project Study

Repositório de estudo de **Clean Architecture** e **DDD (Domain-Driven Design)** em PHP. O código organiza responsabilidades em camadas com dependências apontando para dentro: regras de negócio no núcleo (Domain), orquestração em Application e detalhes técnicos em Infrastructure.

## Objetivo

Praticar separação entre:

- **Domínio**: entidades, value objects, enums e contratos de repositório (interfaces).
- **Aplicação**: casos de uso que coordenam o fluxo sem acoplamento a frameworks ou persistência concreta.
- **Infraestrutura**: implementações simples em memória dos repositórios, úteis para experimentar o desenho sem banco de dados.

## Estrutura (visão geral)

```
src/
├── Domain/
│   ├── Entities/           # User, Client, Admin, Products (produto de catálogo)
│   ├── Repositories/       # Interfaces dos repositórios
│   └── Shared/             # Value objects (UUID, Email, Password, UserId) e enums (UserRole)
├── Application/
│   └── UseCase/            # CreateClientUser, CreateAdminUser, CreateProduct
└── Infrastructure/
    └── Persistence/        # Memory*Repository — persistência em array/memória

public/
└── index.php               # Ponto de entrada manual para exercitar casos de uso
```

## O que já existe no domínio

- **Usuários**: entidade `User` com papel (`UserRole`), relacionada conceitualmente a perfis **Client** e **Admin**.
- **Produtos**: entidade de produto no pacote `Domain\Entities\Products`, com dados de catálogo (nome, descrição, preço, estoque, datas de auditoria simplificadas, etc.).
- **Contratos**: interfaces como `UserRepository`, `ClientRepository`, `AdminRepository`, `ProductRepository` definem como o domínio pede persistência, sem saber *como* ela é feita.

## Casos de uso (camada Application)

Orquestram criação e persistência usando apenas interfaces do domínio — exemplo típico DDD/Clean Arch de “application service”:

- `CreateClientUser` — registra usuário cliente e vínculo em cliente.
- `CreateAdminUser` — registra usuário administrador e registro admin associado.
- `CreateProduct` — cria produto e delega ao `ProductRepository`.

## Infraestrutura

Implementações `Memory*` guardam dados em arrays PHP; servem para validar o modelo e os fluxos sem configurar BD. Trocar por SQLite/MySQL mais tarde significaria novas classes que implementam as mesmas interfaces, sem alterar o núcleo.

## Como rodar localmente

1. Instalar dependências e autoload:

   ```bash
   composer install
   ```

2. Executar o script de entrada (ajuste chamadas em `public/index.php` conforme quiser experimentar cada caso de uso):

   ```bash
   php public/index.php
   ```

## Pré-requisitos

- PHP 8.x com CLI
- [Composer](https://getcomposer.org/) para autoload PSR-4 (`App\` → `src/`)

Este projeto é intencionalmente pequeno e pedagógico: foco em camadas, contratos e fluxos, não em produção ou framework web completo.
