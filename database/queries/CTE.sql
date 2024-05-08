-- Select each employee and the name of their manager and department
WITH
    ManagerCTE AS (
        SELECT id, name AS manager_name
        FROM employees
    ),
    DepartmentCTE AS (
        SELECT id, name AS department_name
        from departments
    )
SELECT employees.id, employees.name, employees.department_id, employees.manager_id, ManagerCTE.manager_name, DepartmentCTE.department_name
FROM employees
    LEFT JOIN ManagerCTE ON `ManagerCTE`.id = employees.manager_id
    JOIN `DepartmentCTE` on `DepartmentCTE`.id = employees.department_id
