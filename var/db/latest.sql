--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: announcement; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE announcement (
    id integer NOT NULL,
    text character varying NOT NULL,
    date date NOT NULL
);


--
-- Name: announcement_id_sq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE announcement_id_sq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: announcement_id_sq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE announcement_id_sq OWNED BY announcement.id;


--
-- Name: announcement_id_sq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('announcement_id_sq', 3, true);


--
-- Name: configuration_entry; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE configuration_entry (
    id character varying NOT NULL,
    value character varying NOT NULL
);


--
-- Name: phoebius_release; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE phoebius_release (
    id integer NOT NULL,
    date date NOT NULL,
    version character varying NOT NULL,
    description character varying NOT NULL,
    link character varying NOT NULL
);


--
-- Name: phoebius_release_id_sq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE phoebius_release_id_sq
    START WITH 1
    INCREMENT BY 1
    NO MAXVALUE
    NO MINVALUE
    CACHE 1;


--
-- Name: phoebius_release_id_sq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE phoebius_release_id_sq OWNED BY phoebius_release.id;


--
-- Name: phoebius_release_id_sq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('phoebius_release_id_sq', 6, true);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE announcement ALTER COLUMN id SET DEFAULT nextval('announcement_id_sq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE phoebius_release ALTER COLUMN id SET DEFAULT nextval('phoebius_release_id_sq'::regclass);


--
-- Data for Name: announcement; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO announcement (id, text, date) VALUES (1, 'Phoebius framework v1.2.0 released', '2010-05-01');
INSERT INTO announcement (id, text, date) VALUES (2, 'Phoebius framework v1.0.1 released', '2010-02-01');


--
-- Data for Name: configuration_entry; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO configuration_entry (id, value) VALUES ('ae', 'phoebius@scand.com');
INSERT INTO configuration_entry (id, value) VALUES ('ap', '42');


--
-- Data for Name: phoebius_release; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO phoebius_release (id, date, version, description, link) VALUES (1, '2010-05-01', '1.2.0', 'A brand new release with improved code generator, one-to-many and many-to-many relations API and optimized persistent object assembler.', '/download.html');
INSERT INTO phoebius_release (id, date, version, description, link) VALUES (6, '2010-02-01', '1.0.1', 'Maintenance release', '/download.html');


--
-- Name: announcement_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY announcement
    ADD CONSTRAINT announcement_pkey PRIMARY KEY (id);


--
-- Name: configuration_entry_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY configuration_entry
    ADD CONSTRAINT configuration_entry_pkey PRIMARY KEY (id);


--
-- Name: phoebius_release_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY phoebius_release
    ADD CONSTRAINT phoebius_release_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: -
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

