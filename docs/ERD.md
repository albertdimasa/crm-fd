# Entity Relationship Diagram (ERD) - Worksuite

This document provides a high-level overview of the database structure for the Worksuite CRM, broken down by functional modules.

## 1. Core Module

The core module centers around the `Company` and `User` entities. All other modules branch off from these.

```mermaid
erDiagram
    Company ||--|{ User : "has many"
    Company ||--|{ Role : "defines"
    User ||--|{ RoleUser : "has roles"
    Role ||--|{ RoleUser : "assigned to"
    User ||--|| EmployeeDetails : "has (if employee)"
    User ||--|| ClientDetails : "has (if client)"

    Company {
        int id PK
        string company_name
        string company_email
        string status
    }

    User {
        int id PK
        int company_id FK
        string name
        string email
        string status
        string mobile
    }

    Role {
        int id PK
        int company_id FK
        string name
        string display_name
    }
```

## 2. HR Module

Focuses on employee management, structures (departments/designations), and activity (leaves/attendance).

```mermaid
erDiagram
    User ||--|| EmployeeDetails : "has profile"
    EmployeeDetails }|--|| Designation : "has"
    EmployeeDetails }|--|| Team : "belongs to department"
    User ||--|{ Attendance : "logs"
    User ||--|{ Leave : "requests"
    EmployeeDetails }|--|| User : "reports to"

    EmployeeDetails {
        int id PK
        int user_id FK
        string employee_id
        int department_id FK
        int designation_id FK
        int reporting_to FK
        date joining_date
        float hourly_rate
    }

    Designation {
        int id PK
        string name
        int parent_id
    }

    Team {
        int id PK
        string team_name
    }

    Attendance {
        int id PK
        int user_id FK
        datetime clock_in_time
        datetime clock_out_time
    }
```

## 3. Project Management Module

Managing projects, tasks, and time tracking.

```mermaid
erDiagram
    Project ||--|{ Task : "contains"
    Project ||--|{ ProjectMember : "has members"
    Project ||--|{ ProjectTimeLog : "has logs"
    User ||--|{ ProjectMember : "is member"
    Task ||--|{ SubTask : "has"
    Task ||--|{ TaskUser : "assigned to"
    User ||--|{ TaskUser : "works on"
    Task ||--|{ ProjectTimeLog : "logged time"
    Project ||--|| User : "has client"

    Project {
        int id PK
        int client_id FK
        string project_name
        date start_date
        date deadline
        string status
        int completion_percent
    }

    Task {
        int id PK
        int project_id FK
        string heading
        string status
        date due_date
        int priority
    }

    ProjectMember {
        int id PK
        int project_id FK
        int user_id FK
    }

    ProjectTimeLog {
        int id PK
        int project_id FK
        int task_id FK
        int user_id FK
        datetime start_time
        datetime end_time
    }
```

## 4. Finance Module

Invoicing, payments, and estimates.

```mermaid
erDiagram
    Invoice ||--|{ InvoiceItems : "contains"
    Invoice }|--|| Project : "belongs to"
    Invoice }|--|| User : "billed to (client)"
    Invoice ||--|{ Payment : "has payments"
    Estimate ||--|{ EstimateItem : "contains"
    Estimate }|--|| User : "sent to (client)"
    Currency ||--|{ Invoice : "currency used"

    Invoice {
        int id PK
        int project_id FK
        int client_id FK
        string invoice_number
        date issue_date
        date due_date
        float total
        float due_amount
        string status
    }

    InvoiceItems {
        int id PK
        int invoice_id FK
        string item_name
        float quantity
        float unit_price
        float amount
    }

    Payment {
        int id PK
        int invoice_id FK
        int project_id FK
        float amount
        datetime paid_on
        string status
    }
```

## 5. CRM Module

Leads and Deals management.

```mermaid
erDiagram
    ClientDetails ||--|| User : "is user"
    Deal ||--|| User : "assigned to (agent)"
    Deal ||--|| LeadPipeline : "in pipeline"
    Deal ||--|| PipelineStage : "at stage"

    ClientDetails {
        int id PK
        int user_id FK
        string company_name
        string address
        string website
    }

    Deal {
         int id PK
         string client_name
         string deal_name
         float value
         int pipeline_id FK
         int pipeline_stage_id FK
    }
```
