CREATE TABLE posts (
  id int NOT NULL AUTO_INCRIMENT,
  nickname varchar(50) NOT NULL,
  message varchar(140) NOT NULL,
  reply_message varchar(150) NOT NULL,
  created datetime NOT NULL,
  PRIMARY KEY ('id')
)

CREATE TABLE good (
  id int(11) NOT NULL AUTO_INCRIMENT,
  good_id int(11) NOT NULL,
  posts_id int(11) NOT NULL,
  PRIMARY KEY ('id'),
  CONSTRAINT posts_id FOREIGN KEY id ON DELETE CASCADE ON UPDATE CASCADE
)
