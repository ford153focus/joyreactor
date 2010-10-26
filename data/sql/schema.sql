CREATE TABLE favorite_blog (id INT AUTO_INCREMENT, user_id INT NOT NULL, blog_id INT NOT NULL, value TINYINT DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX blog_id_idx (blog_id), INDEX user_id_idx (user_id), INDEX value_idx (value), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE cookie (id INT AUTO_INCREMENT, user_id INT NOT NULL, name VARCHAR(128) NOT NULL, value VARCHAR(128) NOT NULL, expires DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX name_idx (name), INDEX expires_idx (expires), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE message_attachment (id INT AUTO_INCREMENT, message_id INT NOT NULL, type VARCHAR(10) NOT NULL, value TEXT NOT NULL, comment TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX message_id_idx (message_id), INDEX type_idx (type), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE hidden (id INT AUTO_INCREMENT, user_id INT NOT NULL, post_id INT NOT NULL, value TINYINT DEFAULT '1' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX post_id_idx (post_id), INDEX user_id_idx (user_id), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE blog (id INT AUTO_INCREMENT, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, tag VARCHAR(20) DEFAULT 'dev' NOT NULL, rating INT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX name_idx (name), INDEX rating_idx (rating), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE favorite (id INT AUTO_INCREMENT, user_id INT NOT NULL, post_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX post_id_idx (post_id), INDEX user_id_idx (user_id), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE post (id INT AUTO_INCREMENT, user_id INT NOT NULL, text TEXT NOT NULL, header TEXT, rating DOUBLE NOT NULL, comments_count INT DEFAULT 0 NOT NULL, mood DOUBLE, type VARCHAR(255) DEFAULT 'post', isnew TINYINT(1) DEFAULT '1', lj TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX rating_idx (rating), INDEX comments_count_idx (comments_count), INDEX mood_idx (mood), INDEX type_idx (type), INDEX isNew_idx (isnew), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE friend (id INT AUTO_INCREMENT, user_id INT NOT NULL, friend_id INT NOT NULL, isnew TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX friend_id_idx (friend_id), INDEX isNew_idx (isnew), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE post_vote (id INT AUTO_INCREMENT, user_id INT NOT NULL, post_id INT NOT NULL, comment TEXT, power INT DEFAULT 0 NOT NULL, isnew TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX post_id_idx (post_id), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), INDEX isNew_idx (isnew), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE blog_post (id INT AUTO_INCREMENT, blog_id INT NOT NULL, post_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX blog_id_idx (blog_id), INDEX post_id_idx (post_id), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_user_profile (id INT AUTO_INCREMENT, user_id INT NOT NULL, email VARCHAR(80), fullname VARCHAR(80), icq VARCHAR(15), jabber VARCHAR(80), commentstojabber TINYINT(1) DEFAULT '0' NOT NULL, commentstoicq TINYINT(1) DEFAULT '0' NOT NULL, commentstomail TINYINT(1) DEFAULT '1' NOT NULL, collectjabberstatus TINYINT(1) DEFAULT '0' NOT NULL, collecticqstatus TINYINT(1) DEFAULT '0' NOT NULL, usecrossposting TINYINT(1) DEFAULT '0' NOT NULL, notifyfriendline TINYINT(1) DEFAULT '0' NOT NULL, ljlogin VARCHAR(128), ljpassword VARCHAR(128), avatar VARCHAR(128), about TEXT, rating DOUBLE NOT NULL, validate VARCHAR(17), isnew TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX email_idx (email), INDEX fullname_idx (fullname), INDEX icq_idx (icq), INDEX jabber_idx (jabber), INDEX rating_idx (rating), INDEX isNew_idx (isnew), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE message (id INT AUTO_INCREMENT, user_id INT NOT NULL, object_id INT, direction VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, protocol VARCHAR(255) NOT NULL, status VARCHAR(255) DEFAULT 'not sent' NOT NULL, text TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX object_id_idx (object_id), INDEX direction_idx (direction), INDEX type_idx (type), INDEX protocol_idx (protocol), INDEX status_idx (status), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE post_comment (id INT AUTO_INCREMENT, user_id INT NOT NULL, post_id INT NOT NULL, parent_id INT, comment TEXT NOT NULL, power INT DEFAULT 0 NOT NULL, isnew TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), INDEX post_id_idx (post_id), INDEX parent_id_idx (parent_id), INDEX isNew_idx (isnew), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_user_group (user_id INT, group_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_group_permission (group_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_user (id INT AUTO_INCREMENT, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_user_permission (user_id INT, permission_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_remember_key (id INT AUTO_INCREMENT, user_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id, ip_address)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_permission (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE sf_guard_group (id INT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
CREATE TABLE post_attribute (id INT AUTO_INCREMENT, post_id INT NOT NULL, type VARCHAR(10) NOT NULL, value TEXT NOT NULL, origin TEXT NOT NULL, comment TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX post_id_idx (post_id), INDEX type_idx (type), INDEX created_at_idx (created_at), INDEX updated_at_idx (updated_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = MYISAM;
ALTER TABLE favorite_blog ADD CONSTRAINT favorite_blog_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE favorite_blog ADD CONSTRAINT favorite_blog_blog_id_blog_id FOREIGN KEY (blog_id) REFERENCES blog(id) ON DELETE CASCADE;
ALTER TABLE cookie ADD CONSTRAINT cookie_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE message_attachment ADD CONSTRAINT message_attachment_message_id_post_id FOREIGN KEY (message_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE hidden ADD CONSTRAINT hidden_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE hidden ADD CONSTRAINT hidden_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE blog ADD CONSTRAINT blog_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE favorite ADD CONSTRAINT favorite_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE favorite ADD CONSTRAINT favorite_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE post ADD CONSTRAINT post_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE friend ADD CONSTRAINT friend_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE friend ADD CONSTRAINT friend_friend_id_sf_guard_user_id FOREIGN KEY (friend_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE post_vote ADD CONSTRAINT post_vote_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE post_vote ADD CONSTRAINT post_vote_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE blog_post ADD CONSTRAINT blog_post_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE blog_post ADD CONSTRAINT blog_post_blog_id_blog_id FOREIGN KEY (blog_id) REFERENCES blog(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_profile ADD CONSTRAINT sf_guard_user_profile_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE message ADD CONSTRAINT message_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE post_comment ADD CONSTRAINT post_comment_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE post_comment ADD CONSTRAINT post_comment_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE post_comment ADD CONSTRAINT post_comment_parent_id_post_comment_id FOREIGN KEY (parent_id) REFERENCES post_comment(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE post_attribute ADD CONSTRAINT post_attribute_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
