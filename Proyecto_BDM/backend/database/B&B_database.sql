CREATE DATABASE BytesAndBits;
USE BytesAndBits;


CREATE TABLE `bytesandbits`.`Rol`(
    `rol_id`    INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `rol_name`  VARCHAR(60) NOT NULL UNIQUE
);

INSERT INTO `bytesandbits`.`Rol` (`rol_name`) VALUES
('seller'),
('buyer'),
('administrator'),
('super administrator');

CREATE TABLE `bytesandbits`.`User`(
    `user_id`           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `user_email`        VARCHAR(60) NOT NULL UNIQUE,
    `user_userName`     VARCHAR(60) NOT NULL UNIQUE,
    `user_password`     VARCHAR(255) NOT NULL,
    `user_name`         VARCHAR(60) NOT NULL,
    `user_lastName`     VARCHAR(60) NOT NULL,
    `user_birthDate`    DATE NOT NULL,
    `user_image`        LONGBLOB NOT NULL,
    `user_gender`       VARCHAR(60) NOT NULL,
    `user_lastDate`     DATETIME NOT NULL DEFAULT NOW(),
    `user_isPublic`     BIT NOT NULL,
    `user_isEnable`     BIT NOT NULL DEFAULT 1,
    `user_rol`          VARCHAR(60) NOT NULL,
    FOREIGN KEY (`user_rol`) REFERENCES `bytesandbits`.`rol`(`rol_name`)
);


CREATE TABLE `bytesandbits`.`Address`(
    `address_id`            INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `address_street`        TEXT NOT NULL,
    `address_city`          VARCHAR(60) NOT NULL,
    `address_state`         VARCHAR(60) NOT NULL,
    `address_postalCode`    VARCHAR(60) NOT NULL,
    `address_country`       VARCHAR(60) NOT NULL,
    `address_isEnable`      BIT NOT NULL DEFAULT 1,
    `address_user`          INT NOT NULL,
    FOREIGN KEY (`address_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Product`(
    `product_id`                INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `product_name`              VARCHAR(60) NOT NULL,
    `product_description`       TEXT NOT NULL,
    `product_isApproved`        BIT NOT NULL,
    `product_quotation`         BIT NOT NULL,
    `product_price`             DECIMAL,
    `product_quantityAvailable` INT,
    `product_isEnable`          BIT NOT NULL DEFAULT 1,
    `product_createdAt`         DATETIME NOT NULL DEFAULT NOW(),
    `product_user`              INT NOT NULL,
    FOREIGN KEY (`product_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Image`(
    `image_id`          INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `image_content`     LONGBLOB NOT NULL,
    `image_isEnable`    BIT NOT NULL DEFAULT 1,
    `image_product`     INT NOT NULL,
    FOREIGN KEY (`image_product`) REFERENCES `bytesandbits`.`Product`(`product_id`)
);

CREATE TABLE `bytesandbits`.`Video`(
    `video_id`          INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `video_content`     LONGBLOB NOT NULL,
    `video_isEnable`    BIT NOT NULL DEFAULT 1,
    `video_product`     INT NOT NULL,
    FOREIGN KEY (`video_product`) REFERENCES `bytesandbits`.`Product`(`product_id`)
);

CREATE TABLE `bytesandbits`.`Quotation`(
    `quotation_id`              INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `quotation_expirationDate`  DATETIME NOT NULL,
    `quotation_specifications`  TEXT NOT NULL,
    `quotation_priceAgreed`     DECIMAL(10, 10) NOT NULL,
    `quotation_isEnable`        BIT NOT NULL DEFAULT 1,
    `quotation_product`         INT NOT NULL,
    `quotation_user`            INT NOT NULL,
    FOREIGN KEY (`quotation_product`) REFERENCES `bytesandbits`.`Product`(`product_id`),
    FOREIGN KEY (`quotation_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`List`(
    `list_id`           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `list_name`         VARCHAR(60) NOT NULL,
    `list_description`  TEXT NOT NULL,
    `list_isPublic`     BIT NOT NULL,
    `list_isEnable`     BIT NOT NULL DEFAULT 1,
    `list_user`         INT NOT NULL,
    FOREIGN KEY (`list_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`imageList`(
    `imageList_id` 			INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `imageList_content` 	LONGBLOB NOT NULL,
    `imageList_isEnable` 	BIT NOT NULL DEFAULT 1,
    `imageList_list` 		INT NOT NULL,
    FOREIGN KEY (`imageList_list`) REFERENCES `bytesandbits`.`List`(`list_id`)
);

CREATE TABLE `bytesandbits`.`List_Product`(
    `listProduct_id`        INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `listProduct_isEnable`  BIT NOT NULL DEFAULT 1,
    `listProduct_list`      INT NOT NULL,
    `listProduct_product`   INT NOT NULL,
    FOREIGN KEY (`listProduct_list`) REFERENCES `bytesandbits`.`List`(`list_id`),
    FOREIGN KEY (`listProduct_product`) REFERENCES `bytesandbits`.`Product`(`product_id`)
);

CREATE TABLE `bytesandbits`.`Category`(
    `category_id`           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `category_name`         VARCHAR(60) NOT NULL,
    `category_description`  TEXT NOT NULL,
    `category_isEnable`     BIT NOT NULL DEFAULT 1,
    `category_user`         INT NOT NULL,
    FOREIGN KEY (`category_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Category_Product`(
    `categoryProduct_id`        INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `categoryProduct_isEnable`  BIT NOT NULL DEFAULT 1,
    `categoryProduct_product`   INT NOT NULL,
    `categoryProduct_category`  INT NOT NULL,
    FOREIGN KEY (`categoryProduct_product`) REFERENCES `bytesandbits`.`Product`(`product_id`),
    FOREIGN KEY (`categoryProduct_category`) REFERENCES `bytesandbits`.`Category`(`category_id`)
);

CREATE TABLE `bytesandbits`.`Rating`(
    `rating_id`         INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `rating_score`      INT NOT NULL,
    `rating_comment`    TEXT,
    `rating_isEnable`   BIT NOT NULL DEFAULT 1,
    `rating_product`    INT NOT NULL,
    `rating_user`       INT NOT NULL,
    FOREIGN KEY (`rating_product`) REFERENCES `bytesandbits`.`Product`(`product_id`),
    FOREIGN KEY (`rating_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Cart`(
    `cart_id`           INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `cart_createdAt`    DATETIME NOT NULL DEFAULT NOW(),
    `cart_isEnable`     BIT NOT NULL DEFAULT 1,
    `cart_user`         INT NOT NULL,
    FOREIGN KEY (`cart_user`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Cart_Item`(
    `cartItem_id`       INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `cartItem_quantity` INT NOT NULL,
    `cartItem_isEnable` BIT NOT NULL DEFAULT 1,
    `cartItem_product`  INT NOT NULL,
    `cartItem_cart`     INT NOT NULL,
    FOREIGN KEY (`cartItem_product`) REFERENCES `bytesandbits`.`Product`(`product_id`),
    FOREIGN KEY (`cartItem_cart`) REFERENCES `bytesandbits`.`Cart`(`cart_id`)
);

CREATE TABLE `bytesandbits`.`Conversation`(
    `conversation_id`       INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `conversation_isEnable` BIT NOT NULL DEFAULT 1,
    `conversation_seller`   INT NOT NULL,
    `conversation_buyer`    INT NOT NULL,
    `conversation_product`  INT NOT NULL,
    FOREIGN KEY (`conversation_seller`) REFERENCES `bytesandbits`.`User`(`user_id`),
    FOREIGN KEY (`conversation_buyer`) REFERENCES `bytesandbits`.`User`(`user_id`),
    FOREIGN KEY (`conversation_product`) REFERENCES `bytesandbits`.`Product`(`product_id`)
);

CREATE TABLE `bytesandbits`.`Message`(
    `message_id`            INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `message_text`          TEXT NOT NULL,
    `message_date`          DATETIME NOT NULL DEFAULT NOW(),
    `message_conversation`  INT NOT NULL,
    `message_sender`        INT NOT NULL,
    FOREIGN KEY (`message_conversation`) REFERENCES `bytesandbits`.`Conversation`(`conversation_id`),
    FOREIGN KEY (`message_sender`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Sale`(
    `sale_id`       INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `sale_date`     DATETIME NOT NULL DEFAULT NOW(),
    `sale_product`  INT NOT NULL,
    `sale_seller`   INT NOT NULL,
    FOREIGN KEY (`sale_product`) REFERENCES `bytesandbits`.`Product`(`product_id`),
    FOREIGN KEY (`sale_seller`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

CREATE TABLE `bytesandbits`.`Purchase`(
    `purchase_id`       INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `purchase_date`     DATETIME NOT NULL DEFAULT NOW(),
    `purchase_product`  INT NOT NULL,
    `purchase_buyer`    INT NOT NULL,
    FOREIGN KEY (`purchase_product`) REFERENCES `bytesandbits`.`Product`(`product_id`),
    FOREIGN KEY (`purchase_buyer`) REFERENCES `bytesandbits`.`User`(`user_id`)
);

/*--------------STORED PROCEDURES USER---------------------*/
DROP PROCEDURE IF EXISTS `insertUser`;
DELIMITER $$
CREATE PROCEDURE `insertUser`(
    IN _email           VARCHAR(60),
    IN _username        VARCHAR(60),
    IN _password        VARCHAR(255),
    IN _name            VARCHAR(60),
    IN _lastName        VARCHAR(60),
    IN _birthdate       DATE,
    IN _image           LONGBLOB,
    IN _gender          VARCHAR(60),
    IN _isPublic        BIT,
    IN _rol             VARCHAR(60)       
)
BEGIN
    INSERT INTO `bytesandbits`.`User`(
        `user_email`,    
        `user_userName`, 
        `user_password`, 
        `user_name`,     
        `user_lastName`, 
        `user_birthDate`,
        `user_image`,    
        `user_gender`,
        `user_isPublic`,
        `user_rol`      
    )VALUES(
        _email,    
        _username, 
        _password, 
        _name,     
        _lastName, 
        _birthdate,
        _image,    
        _gender,   
        _isPublic, 
        _rol      
    );
END $$
DELIMITER ;

/* #CALL insertUser(
#    'nuevo_usuario@example.com',
#    'nuevo_usuario',
#    'clave_nueva',
#    'NombreNuevo',
#    'ApellidoNuevo',
#    '1990-06-15',
#    'imagen_nueva',
#    'Masculino',
#    1, 
#    'seller'
#); */

DROP PROCEDURE IF EXISTS `updateUserByUser`;
DELIMITER $$
CREATE PROCEDURE `updateUserByUser`(
    IN _id				INT,
    IN _password        VARCHAR(255),
    IN _name            VARCHAR(60),
    IN _lastName        VARCHAR(60),
    IN _birthdate       DATE,
    IN _image           LONGBLOB,
    IN _gender          VARCHAR(60),
    IN _isPublic        BIT  
)
BEGIN
     UPDATE `bytesandbits`.`User` SET
        `user_password` = COALESCE(NULLIF(_password, ""), `user_password`),
        `user_name` = COALESCE(NULLIF(_name, ""), `user_name`),
        `user_lastName` = COALESCE(NULLIF(_lastName, ""), `user_lastName`),
        `user_birthDate` = COALESCE(NULLIF(_birthdate, NULL), `user_birthDate`),
        `user_image` = COALESCE(NULLIF(_image, ""), `user_image`),
        `user_gender` = COALESCE(NULLIF(_gender, ""), `user_gender`),
        `user_isPublic` = COALESCE(NULLIF(_isPublic, NULL), `user_isPublic`)
    WHERE `user_id`= _id;
END $$
DELIMITER ;

-- #CALL updateUserByUser(1, 'Contraseniax2','Nombre', 'Apellidox2', NULL, NULL, '', 0);

DROP PROCEDURE IF EXISTS `updateUserByAdmin`;
DELIMITER $$
CREATE PROCEDURE `updateUserByAdmin`(
    IN _id              INT,
    IN _isEnable        BIT     
)
BEGIN
    UPDATE `bytesandbits`.`User`
        SET        
        `user_isEnable` = CASE
            WHEN _isEnable IS NULL OR _isEnable = '' THEN `user_isEnable`
                ELSE _isEnable
            END
    WHERE `user_id`= _id;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS `selectOneUser`;
DELIMITER $$
CREATE PROCEDURE `selectOneUser`(
    IN _identification   VARCHAR(60)
)
BEGIN
    DECLARE _userCount INT;

    SELECT COUNT(*) INTO _userCount
    FROM `bytesandbits`.`User`
    WHERE `user_email` = _identification OR `user_userName` = _identification;

    IF _userCount = 0 THEN
        SELECT 'NOT FOUND' AS response;
    ELSE
        SELECT 
            `user_id`,       
            `user_email`,    
            `user_userName`, 
            `user_password`, 
            `user_name`,     
            `user_lastName`, 
            `user_birthDate`,
            `user_image`,    
            `user_gender`,
            `user_isPublic`, 
            `user_isEnable`, 
            `user_rol`
        FROM  `bytesandbits`.`User`
        WHERE `user_email` = _identification OR `user_userName` = _identification;
    END IF;    
END $$
DELIMITER ;
--#CALL selectOneUser('nuevo_usuario@example.com');

DROP PROCEDURE IF EXISTS `selectAllUser`;
DELIMITER $$
CREATE PROCEDURE `selectAllUser`()
BEGIN
   SELECT 
        `user_id`,       
        `user_email`,    
        `user_userName`, 
        `user_password`, 
        `user_name`,     
        `user_lastName`, 
        `user_birthDate`,
        `user_image`,    
        `user_gender`,
        `user_isPublic`, 
        `user_isEnable`, 
        `user_rol`
    FROM `bytesandbits`.`User`;
END $$
DELIMITER ;

