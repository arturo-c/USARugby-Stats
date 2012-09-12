ALTER TABLE users ADD uuid char(36);
ALTER TABLE users ADD UNIQUE (uuid);
ALTER TABLE users ADD token char(40);
ALTER TABLE users ADD secret char(40);
ALTER TABLE games ADD uuid char(36);
ALTER TABLE games ADD UNIQUE (uuid);
ALTER TABLE users DROP password;
ALTER TABLE players CHANGE team_fsi_id team_uuid char(36);
ALTER TABLE players CHANGE fsi_id uuid char(36);
ALTER TABLE teams CHANGE fsi_id uuid char(36);
ALTER TABLE teams ADD UNIQUE (uuid);
ALTER TABLE users CHANGE login login VARCHAR(64)  NOT NULL  DEFAULT '';
