-- Select managers and their level in the managerial hierarchy
WITH RECURSIVE
    RecursiveManagerCTE AS (
        SELECT id, name, manager_id, 0 AS level
        FROM employees
        WHERE
            employees.manager_id IS NULL
        UNION ALL
        SELECT employee.id, employee.name, employee.manager_id, manager.level + 1 AS level
        FROM
            employees employee
            INNER JOIN RecursiveManagerCTE AS manager ON employee.manager_id = manager.id
    )
SELECT *
FROM `RecursiveManagerCTE`
ORDER BY level
