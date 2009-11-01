--
-- Phoebius Framework Autogenerator
-- Generated at 01.11.09 13:15 for PgSql
--

CREATE SEQUENCE "blog_entry_id_sq";

CREATE TABLE "blog_entry"(
	"id" integer DEFAULT nextval ( 'blog_entry_id_sq' ),
	"title" character varying NOT NULL,
	"text" character varying NOT NULL,
	"pub_time" integer NOT NULL,
	"pub_date" date NOT NULL,
	"rest_id" character varying NOT NULL,
	PRIMARY KEY ("id")
);

ALTER SEQUENCE "blog_entry_id_sq" OWNED BY "blog_entry"."id";

CREATE SEQUENCE "blog_entry_tag_id_sq";

CREATE TABLE "blog_entry_tag"(
	"id" integer DEFAULT nextval ( 'blog_entry_tag_id_sq' ),
	"name" character varying NOT NULL,
	"rest_id" character varying NOT NULL,
	PRIMARY KEY ("id"),
	UNIQUE ("rest_id")
);

ALTER SEQUENCE "blog_entry_tag_id_sq" OWNED BY "blog_entry_tag"."id";

CREATE TABLE "configuration_entry"(
	"id" character varying,
	"value" character varying NOT NULL,
	PRIMARY KEY ("id")
);

CREATE TABLE "blog_entry_blog_tag"(
	"___mtm_blog_entry" integer NOT NULL,
	"___mtm_blog_entry_tag" integer NOT NULL,
	FOREIGN KEY ("___mtm_blog_entry") REFERENCES "blog_entry" ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY ("___mtm_blog_entry_tag") REFERENCES "blog_entry_tag" ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE INDEX "constraint_blog_entry_blog_tag_1_idx" ON "blog_entry_blog_tag" ("___mtm_blog_entry");

CREATE INDEX "constraint_blog_entry_blog_tag_2_idx" ON "blog_entry_blog_tag" ("___mtm_blog_entry_tag");