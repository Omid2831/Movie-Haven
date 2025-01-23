DROP DATABASE IF EXISTS movieHavenFAQ;

CREATE DATABASE movieHavenFAQ;

USE movieHavenFAQ;

CREATE TABLE UnansweredQuestions(
    Id          TINYINT(3)      UNSIGNED        NOT NULL    AUTO_INCREMENT
    ,Question   VARCHAR(1000)                   NOT NULL
    ,IsActive   BIT                             NOT NULL    DEFAULT 1
    ,Opmerking  VARCHAR(255)                        NULL    DEFAULT NULL
    ,Datum      DATETIME(6)                     NOT NULL
    ,EditDate   DATETIME(6)                     NOT NULL
    ,CONSTRAINT PK_UnansweredQuestions_Id       PRIMARY KEY CLUSTERED(Id)
) ENGINE=InnoDB;

CREATE TABLE AnsweredQuestions(
    Id          TINYINT(3)      UNSIGNED        NOT NULL    AUTO_INCREMENT
    ,Question   VARCHAR(1000)                   NOT NULL
    ,Answer     VARCHAR(1000)                   NOT NULL
    ,IsActive   BIT                             NOT NULL    DEFAULT 1
    ,Opmerking  VARCHAR(255)                        NULL    DEFAULT NULL
    ,Datum      DATETIME(6)                     NOT NULL
    ,EditDate   DATETIME(6)                     NOT NULL
    ,CONSTRAINT PK_AnsweredQuestions_Id       PRIMARY KEY CLUSTERED(Id)
) ENGINE=InnoDB;