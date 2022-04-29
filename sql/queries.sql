/* CRUD QUERIES */
/* Create one */
INSERT INTO
  todos (
    id,
    title,
    content,
    is_completed
  )
VALUES
  (
    NULL,
    'test',
    'Lorem ipsum...',
    '0'
  );

/* Read all */
SELECT
  *
FROM
  todos;

/* Update one by id */
UPDATE
  todos
SET
  title = 'test updated',
  content = 'content updated',
  is_completed = '1'
WHERE
  id = 1;

/* Delete one by id */
DELETE FROM
  todos
WHERE
  id = 1;