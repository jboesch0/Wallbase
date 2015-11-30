CREATE TABLE wallpaper (
    id_wallpaper INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(10),
    description VARCHAR(250),
    extension VARCHAR(5),
    idusers INT UNSIGNED NOT NULL,
    CONSTRAINT fk_idusers_wallpaper
        FOREIGN KEY (idusers)
        REFERENCES users(idusers)
)
ENGINE=InnoDB;


CREATE TABLE users (
    idusers INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    pseudo INT UNSIGNED NOT NULL,
    nom VARCHAR(40),
    prenom SMALLINT DEFAULT 1,
    email VARCHAR(100),
    mdp VARCHAR(20),
    avatar VARCHAR(16)
)
ENGINE=InnoDB;


CREATE TABLE tag (
    id_tag INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(20)
)
ENGINE=InnoDB;


CREATE TABLE is_like (
    id_user INT UNSIGNED NOT NULL,
    id_comment INT UNSIGNED NOT NULL,
    is_like BOOLEAN DEFAULT 0,
    PRIMARY KEY (id_user, id_comment),
    CONSTRAINT fk_idusers_like
        FOREIGN KEY (id_user)
        REFERENCES users(idusers),
    CONSTRAINT fk_id_comment_like
        FOREIGN KEY (id_comment)
        REFERENCES comment(id_comment)
)
ENGINE=InnoDB;


CREATE TABLE comment (
    id_comment INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    comment VARCHAR(1000),
    date_post datetime,
    likes INT UNSIGNED DEFAULT 0,
    id_user INT UNSIGNED NOT NULL,
    id_wallpaper INT UNSIGNED NOT NULL,
    CONSTRAINT fk_idusers_comment
        FOREIGN KEY (id_user)
        REFERENCES users(idusers),
    CONSTRAINT fk_id_wallpaper_comment
        FOREIGN KEY (id_wallpaper)
        REFERENCES wallpaper(id_wallpaper)
)
ENGINE=InnoDB;


CREATE TABLE a_pour (
    id_wallpaper INT UNSIGNED NOT NULL,
    id_tag INT UNSIGNED NOT NULL,
    PRIMARY KEY(id_wallpaper,id_tag),
    CONSTRAINT fk_id_wallpaper_a_pour
        FOREIGN KEY (id_wallpaper)
        REFERENCES wallpaper(id_wallpaper),
    CONSTRAINT fk_id_tag_a_pour
        FOREIGN KEY (id_tag)
        REFERENCES tag(id_tag)
)
ENGINE=InnoDB;


########## FAIRE SESSION ET FOLLOW#################S


