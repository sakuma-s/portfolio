CREATE TABLE posts (
  posts_id int NOT NULL AUTO_INCRIMENT,
  nickname varchar(50) NOT NULL,
  message varchar(140) NOT NULL,
  reply_message varchar(150) NOT NULL,
  good_count INT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  PRIMARY KEY ('id')
)

-- CREATE TABLE good (
--   id int(11) NOT NULL AUTO_INCRIMENT,
--   good_id int(11) NOT NULL,
--   posts_id int(11) NOT NULL,
--   PRIMARY KEY ('id'),
--   CONSTRAINT posts_id FOREIGN KEY posts_id REFERENCES posts posts_id ON DELETE CASCADE ON UPDATE CASCADE
-- )
