--
-- Phoebius Framework v.1.0.0
-- Generated at 18.12.09 09:41 for PgSql
--

CREATE SEQUENCE "blog_entry_id_sq";

CREATE TABLE "blog_entry"(
	"id" int4 NOT NULL DEFAULT nextval ( 'blog_entry_id_sq' ),
	"title" character varying NOT NULL,
	"text" character varying NOT NULL,
	"pub_time" timestamp NOT NULL,
	"pub_date" date NOT NULL,
	"rest_id" character varying NOT NULL,
	PRIMARY KEY ("id")
);

ALTER SEQUENCE "blog_entry_id_sq" OWNED BY "blog_entry"."id";

CREATE SEQUENCE "blog_entry_tag_id_sq";

CREATE TABLE "blog_entry_tag"(
	"id" int4 NOT NULL DEFAULT nextval ( 'blog_entry_tag_id_sq' ),
	"name" character varying NOT NULL,
	"rest_id" character varying NOT NULL,
	PRIMARY KEY ("id"),
	UNIQUE ("rest_id")
);

ALTER SEQUENCE "blog_entry_tag_id_sq" OWNED BY "blog_entry_tag"."id";

CREATE TABLE "configuration_entry"(
	"id" character varying NOT NULL,
	"value" character varying NOT NULL,
	PRIMARY KEY ("id")
);

CREATE TABLE "blog_entry_blog_tag"(
	"blog_entry" int4 NOT NULL,
	"blog_entry_tag" int4 NOT NULL,
	FOREIGN KEY ("blog_entry") REFERENCES "blog_entry" ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY ("blog_entry_tag") REFERENCES "blog_entry_tag" ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE INDEX "constraint_blog_entry_blog_tag_1_idx" ON "blog_entry_blog_tag" ("blog_entry");

CREATE INDEX "constraint_blog_entry_blog_tag_2_idx" ON "blog_entry_blog_tag" ("blog_entry_tag");