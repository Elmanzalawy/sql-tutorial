-- Select employees and their respective manager names
SELECT employees.id, employees.name, employees.manager_id, manager.name AS manager_name
FROM
    employees
    INNER JOIN employees AS manager ON employees.manager_id = manager.id
