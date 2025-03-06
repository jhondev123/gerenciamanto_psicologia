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
      - description
      - feedback, da para fazer uma nota de 1 a 5 para cada sessão
      - patient_id
      - psychologist_id
      - schedule_id
      - created_at
      - updated_at
      - deleted_at
    - Configurations
      - id
      - user_id
      - key
      - value
      - created_at
      - updated_at
      - deleted_at
      - description
    - Payments
      - id
      - session_price
      - amount_paid
      - paid
      - date
      - description
      - session_id
      - patient_id
      - psychologist_id
      - created_at
      - updated_at
      - deleted_at
    - Recurrents
      - id
      - description
      - value
      - day_of_week
      - hour
      - active
      - psychologist_id
      - patient_id
      - created_at
      - updated_at
      - deleted_at
    - MedicalRecords
      - id
      - description
      - patient_id
      - psychologist_id
      - created_at
      - updated_at
      - deleted_at
    - Reports
      - id
      - description
      - patient_id
      - psychologist_id
      - report_template_id
      - created_at
      - updated_at
      - deleted_at
    - Report_Templates
      - id
      - description
      - created_at
      - updated_at
      - deleted_at


## Features
- Feedback do paciente dentro das sessões para gerar um gráfico entre as sessões

## Configurações padrões
- Valor da sessão
- Valor da sessão para pacientes recorrentes
- Horário de atendimento
- Dias de atendimento
- Duração da sessão

## Registros iniciais
 - Roles
   - admin
   - manager
   - psychologist
   - patient
   - secretary
 - Configurations
   - session_price
   - session_price_recurrent
   - work_hours
   - work_days
   - session_duration
   - IA Suggestions
 - Report_Templates
   - avaliação psicológica
   - laudo psicológico
   - atestado psicológico
   - parecer psicológico
   - relatório psicosocial

## TODO
- [ x ] Criar as tabelas
- [ x ] Criar as migrations
- [ x ] Criar docker-compose para subir o banco de dados
- [  ] Criar as seeds
- [ ] Criar as Models
- [ ] Criar as factories
