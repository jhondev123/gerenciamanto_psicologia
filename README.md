# Sistema de Gerencimento de Psicólogos
## Descrição
Esse projeto vai ser um ERP focado em ajudar psicólogos autonomos

## Tecnologias
- Api em Laravel
- Frontend provavelmente com next/react

## Funcionalidades
- Cadastro de pacientes
- Gerenciamento de pacientes
- Cadastro de sessões
- Gerenciamento de sessões
- Gerenciamento de pagamentos
- Geração de relatórios
- Geração de Laudos
- Gerenciamento da agenda
- Gerenciamento de prontuários

## Database
- Tabelas
    - people
      - id
      - name
      - email
      - phone
      - cpf
      - Rg
      - birthdate      
      - created_at
      - updated_at
      - deleted_at
    - Roles
      - id
      - name
      - description
      - is_admin
      - is_active
      - created_at
      - updated_at
      - deleted_at
    - Users
      - id
      - person_id
      - role_id
      - password
      - created_at
      - updated_at
      - deleted_at
    - Patients
      - id
      - person_id
      - created_at
      - updated_at
      - deleted_at
    - Psychologists
      - id
      - person_id
      - crp
      - approach
      - created_at
      - updated_at
      - deleted_at
    - Schedules
      - id
      - date
      - start_time
      - end_time
      - psychologist_id
      - patient_id
      - created_at
      - updated_at
      - deleted_at
    - Sessions
      - id
      - patient_id
      - psychologist_id
    - Pagamentos
    - Relatórios
    - Laudos
    - Agenda
    - Prontuários


## Features
- Feedback do paciente dentro das sessões para gerar um gráfico
