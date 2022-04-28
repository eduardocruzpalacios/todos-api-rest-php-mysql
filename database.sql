/* DATABASE */
CREATE DATABASE IF NOT EXISTS todosdb DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;

/* TABLE TODOS */
CREATE TABLE todos (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  content VARCHAR(255) NOT NULL,
  is_completed BOOLEAN NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB;

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