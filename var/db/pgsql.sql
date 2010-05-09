--
-- Phoebius Framework v.1.2.0
-- Generated at 2010/05/09 17:23 for PgSql
--

CREATE TABLE "announcement"(
	"id" int4 NOT NULL,
	"text" character varying NOT NULL,
	"date" date NOT NULL
);

CREATE TABLE "configuration_entry"(
	"id" character varying NOT NULL,
	"value" character varying NOT NULL
);

CREATE TABLE "phoebius_release"(
	"id" int4 NOT NULL,
	"date" date NOT NULL,
	"version" character varying NOT NULL,
	"description" character varying NOT NULL,
	"link" character varying NOT NULL
);

CREATE SEQUENCE "announcement_id_sq";

ALTER SEQUENCE "announcement_id_sq" OWNED BY "announcement"."id";

ALTER TABLE "announcement" ALTER COLUMN "id" SET DEFAULT nextval ( 'announcement_id_sq' );

ALTER TABLE "announcement" ADD PRIMARY KEY ("id");

ALTER TABLE "configuration_entry" ADD PRIMARY KEY ("id");

CREATE SEQUENCE "phoebius_release_id_sq";

ALTER SEQUENCE "phoebius_release_id_sq" OWNED BY "phoebius_release"."id";

ALTER TABLE "phoebius_release" ALTER COLUMN "id" SET DEFAULT nextval ( 'phoebius_release_id_sq' );

ALTER TABLE "phoebius_release" ADD PRIMARY KEY ("id");