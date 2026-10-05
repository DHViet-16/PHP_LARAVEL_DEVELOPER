CREATE TABLE
    users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO
    users (name, email)
VALUES
    ('Viet', 'viet@gmail.com'),
    ('An', 'an@gmail.com'),
    ('Minh', 'minh@gmail.com'),
    ('Nam', 'nam@gmail.com'),
    ('Hoa', 'hoa@gmail.com');

INSERT INTO
    users (name, email)
VALUES
    ('John', 'john@gmail.com');

SELECT
    *
FROM
    users;

SELECT
    *
FROM
    users
WHERE
    id = 3;

SELECT
    *
FROM
    users
WHERE
    id > 2;

SELECT
    *
FROM
    users
WHERE
    email = 'viet@gmail.com';

SELECT
    *
FROM
    users
ORDER BY
    id ASC;

SELECT
    *
FROM
    users
ORDER BY
    id DESC;

SELECT
    *
FROM
    users
LIMIT
    2;

SELECT
    *
FROM
    users
ORDER BY
    created_at DESC
LIMIT
    2;

CREATE TABLE
    posts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT fk_posts_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE
    );

ALTER TABLE posts ADD CONSTRAINT fk_posts_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE
    categories (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(100) NOT NULL UNIQUE
    );

CREATE TABLE
    category_post (
        post_id INT NOT NULL,
        category_id INT NOT NULL,
        PRIMARY KEY (post_id, category_id),
        CONSTRAINT fk_cp_posts FOREIGN KEY (post_id) REFERENCES posts (id) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT fk_cp_categories FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE
    );

INSERT INTO
    posts (user_id, title, content)
VALUES
    (
        2,
        'Learn MySQL',
        'MySQL is a relational database management system.'
    ),
    (
        2,
        'Learn MariaDB',
        'MariaDB is an open-source relational database.'
    ),
    (
        3,
        'Learn JavaScript',
        'JavaScript is a programming language for the web.'
    ),
    (
        3,
        'Learn HTML',
        'HTML is used to structure web pages.'
    ),
    (4, 'Learn CSS', 'CSS is used to style web pages.'),
    (
        4,
        'Learn Git',
        'Git is a version control system.'
    ),
    (
        5,
        'Learn Docker',
        'Docker helps developers build and run applications in containers.'
    ),
    (
        5,
        'Learn Linux',
        'Linux is an open-source operating system.'
    );

SELECT
    posts.id,
    posts.title,
    users.name
FROM
    posts
    JOIN users ON users.id = posts.user_id;

SELECT
    p.id,
    p.title,
    u.name
FROM
    posts AS p
    JOIN users AS u ON u.id = p.user_id;

SELECT
    p.id,
    p.title,
    u.name
FROM
    posts AS p
    JOIN users AS u ON u.id = p.user_id
WHERE
    p.user_id = 2;

SELECT
    u.name,
    p.title
FROM
    users AS u
    LEFT JOIN posts AS p ON u.id = p.user_id;